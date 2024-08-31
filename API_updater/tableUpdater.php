<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$url = "https://api.openf1.org/v1/position?session_key=latest"; // API URL

//print_r($url . "\n");

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Get HTTP status code
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    // cURL error
    echo 'cURL error: ' . curl_error($ch);
} else {
    if ($status >= 200 && $status < 300) {
        // Successful response
        $data = json_decode($response, true); // Assuming the API returns a JSON

        $conn = new mysqli('localhost', 'root', '', 'statistiche');
        // Controlla la connessione
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $latest_positions = [];
        foreach ($data as $entry) {
            $driver_number = $entry['driver_number'];
            $date = $entry['date'];
            $position = $entry['position'];

            // If this driver number is not in the latest_positions array yet, or if this entry's date is later than the currently stored date
            if (!isset($latest_positions[$driver_number]) || $date > $latest_positions[$driver_number]['date']) {
                $latest_positions[$driver_number] = [
                    'date' => $date,
                    'position' => $position,
                    'driver' => $driver_number
                ];
            }
        }

        foreach ($latest_positions as $driver_number => $info) {
            // Get the full_name and team_name from the driverdata table
            $stmt = $conn->prepare("SELECT d.full_name, d.team_name FROM driverdata AS d WHERE d.driver_number = ?");
            $stmt->bind_param("i", $driver_number); // "i" indicates the variable type is integer.
            $stmt->execute();
            $result = $stmt->get_result();
            $driverdata = $result->fetch_assoc();
        
            if ($driverdata) {
                $stmt = $conn->prepare("UPDATE ultimaGara SET posizione = ?, nome = ?, scuderia = ?, driver_number = ? WHERE driver_number = ?");
                $stmt->bind_param("issii", $info['position'], $driverdata['full_name'], $driverdata['team_name'], $info['driver'], $driver_number); // "issi" indicates the variable types are integer, string, string, integer.
                $stmt->execute();
            }
        }

    } elseif ($status == 500) {
        echo "The server encountered an internal error. Please try again later.";
    } else {
        echo "An error occurred. HTTP Status Code: " . $status;
    }

    $stmt->close();
    $conn->close();
}