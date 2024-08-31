<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$meeting_key = $_GET['meeting'];

echo "team_radio.php called successfully\n";

$url = "https://api.openf1.org/v1/team_radio?meeting_key=$meeting_key"; // JSONPlaceholder API URL

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
    
        // Get the item with the highest meeting_key
        $maxMeetingKey = max(array_column($data, 'meeting_key'));
    
        // Find the item with the highest meeting_key
        $latestItems = array_filter($data, function($item) use ($maxMeetingKey) {
            return $item['meeting_key'] == $maxMeetingKey;
        });
    
        // Since array_filter preserves array keys, reset the keys
        $latestItems = array_values($latestItems);
    
        // Print all items with the highest meeting_key
        //echo '<pre>';
        //print_r($latestItems);
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

 

// Insert data into table
foreach ($latestItems as $item) {
    $session_key = $db->real_escape_string($item['session_key']);
    $meeting_key = $db->real_escape_string($item['meeting_key']);
    $driver_number = $db->real_escape_string($item['driver_number']);
    $date = $db->real_escape_string($item['date']);
    $recording_url = $db->real_escape_string($item['recording_url']);

    $query = "INSERT INTO teamRadio (session_key, meeting_key, driver_number, date, recording_url) 
              VALUES ('$session_key', '$meeting_key', '$driver_number', '$date', '$recording_url')
              ON DUPLICATE KEY UPDATE
                  session_key = VALUES(session_key),
                  meeting_key = VALUES(meeting_key),
                  driver_number = VALUES(driver_number),
                  date = VALUES(date)";

    if ($db->query($query) === TRUE) {
        //echo "New record created successfully";
    } else {
        //echo "Error: " . $query . "<br>" . $db->error;
    }
}

$db->close();
curl_close($ch);
?>