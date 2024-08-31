<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


$url = "https://api.openf1.org/v1/meetings"; // JSONPlaceholder API URL

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

        // Filter the data for the year 2024
        $data = array_filter($data, function($item) {
            return date('Y', strtotime($item['date_start'])) == '2024';
        });

        // Print all items with the highest meeting_key
        //echo '<pre>';
        //print_r($data);
        //echo '</pre>';
    } else {
        // Error occurred
        //echo "Error occurred: $status";
    }
}

// Database connection
$db = new mysqli('localhost', 'root', '', 'statistiche');

if ($db->connect_error) {
    //die("Connection failed: " . $db->connect_error);
}

// Insert data into table
foreach ($data as $item) {
    $circuit_key = $db->real_escape_string($item['circuit_key']);
    $circuit_short_name = $db->real_escape_string($item['circuit_short_name']);
    $meeting_key = $db->real_escape_string($item['meeting_key']);
    $meeting_code = $db->real_escape_string($item['meeting_code']);
    $location = $db->real_escape_string($item['location']);
    $country_key = $db->real_escape_string($item['country_key']);
    $country_code = $db->real_escape_string($item['country_code']);
    $country_name = $db->real_escape_string($item['country_name']);
    $meeting_name = $db->real_escape_string($item['meeting_name']);
    $gmt_offset = $db->real_escape_string($item['gmt_offset']);
    $date_start = $db->real_escape_string($item['date_start']);
    $year = $db->real_escape_string($item['year']);

    $query = "INSERT INTO garedata (circuit_key, circuit_short_name, meeting_key, meeting_code, location, country_key, country_code, country_name, meeting_name, gmt_offset, date_start, year) 
              VALUES ('$circuit_key', '$circuit_short_name', '$meeting_key', '$meeting_code', '$location', '$country_key', '$country_code', '$country_name', '$meeting_name', '$gmt_offset', '$date_start', '$year')
              ON DUPLICATE KEY UPDATE
              circuit_key = VALUES(circuit_key),
              circuit_short_name = VALUES(circuit_short_name),
              meeting_code = VALUES(meeting_code),
              location = VALUES(location),
              country_key = VALUES(country_key),
              country_code = VALUES(country_code),
              country_name = VALUES(country_name),
              meeting_name = VALUES(meeting_name),
              gmt_offset = VALUES(gmt_offset),
              date_start = VALUES(date_start),
              year = VALUES(year)";

    if ($db->query($query) === TRUE) {
        //echo "New record created or updated successfully";
    } else {
        //echo "Error: " . $query . "<br>" . $db->error;
    }
}

$db->close();

curl_close($ch);