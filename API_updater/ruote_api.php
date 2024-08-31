<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$meeting_key = $_GET['meeting'];

$url = "https://api.openf1.org/v1/stints?meeting_key=$meeting_key"; // JSONPlaceholder API URL

// Using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    // cURL error
    //echo 'cURL error: ' . curl_error($ch);
} else {
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($status >=200 && $status < 300) {
        // Successful response
        $data = json_decode($response, true); // Assuming the API returns a JSON

        // Database connection
        $db = new mysqli('localhost', 'root', '', 'statistiche');

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Get meeting_key from garedata
        $result = $db->query("SELECT meeting_key FROM garedata");

        if ($result === false) {
            die("Query failed: " . $db->error);
        }

        // Fetch all meeting_key and store them in an array
        $meeting_keys = array();
        while ($row = $result->fetch_assoc()) {
            $meeting_keys[] = $row['meeting_key'];
        }

        // Filter $data to include only items with a meeting_key in $meeting_keys
        $filtered_data = array_filter($data, function($item) use ($meeting_keys) {
            return in_array($item['meeting_key'], $meeting_keys);
        });

        // Print all items with a meeting_key in $meeting_keys
        //echo '<pre>';
        //print_r($filtered_data);
        //echo '</pre>';
    } else {
        // Error occurred
        //echo "Error occurred: $status";
    }
}

// Database connection
$db = new mysqli('localhost', 'root', '', 'statistiche');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Prepare an SQL statement
$stmt = $db->prepare("
    INSERT INTO ruotedata (meeting_key, session_key, stint_number, driver_number, lap_start, lap_end, compound, tyre_age_at_start) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
        lap_start = VALUES(lap_start),
        lap_end = VALUES(lap_end),
        compound = VALUES(compound),
        tyre_age_at_start = VALUES(tyre_age_at_start)
");

// Bind parameters
$stmt->bind_param("iiiisssi", $meeting_key, $session_key, $stint_number, $driver_number, $lap_start, $lap_end, $compound, $tyre_age_at_start);

// Loop through the filtered data and insert each item into the database
foreach ($filtered_data as $item) {
    $meeting_key = $item['meeting_key'];
    $session_key = $item['session_key'];
    $stint_number = $item['stint_number'];
    $driver_number = $item['driver_number'];
    $lap_start = $item['lap_start'];
    $lap_end = $item['lap_end'];
    $compound = $item['compound'];
    $tyre_age_at_start = $item['tyre_age_at_start'];

    // Execute the statement
    if (!$stmt->execute()) {
        //echo "Error: " . $stmt->error;
    }
}

// Close the statement
$stmt->close();

// Close the database connection
$db->close();