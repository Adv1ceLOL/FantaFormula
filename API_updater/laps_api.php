<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//$meeting_key = $_GET['meeting'];

$url = "https://api.openf1.org/v1/laps?meeting_key=1242"; // JSONPlaceholder API URL

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
    //echo 'cURL error: ' . curl_error($ch);
} else {
    if ($status >= 200 && $status < 300) {
        // Successful response
        $data = json_decode($response, true); // Assuming the API returns a JSON

        // Print the data
        //echo "Decoded Data: <br>";
        //echo '<pre>';
        //print_r($data);
        //echo '</pre>';
    } elseif ($status == 500) {
        //echo "The server encountered an internal error. Please try again later.";
    } else {
        //echo "An error occurred. HTTP Status Code: " . $status;
    }
}

// Crea connessione al database
$conn = new mysqli('localhost', 'root', '', 'statistiche');

// Controlla la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Itera attraverso ogni elemento nell'array dei dati
foreach ($data as $row) {
    // Controlla se lap_duration è nullo
    if (is_null($row['lap_duration'])) {
        continue; // Salta questa iterazione se lap_duration è nullo
    }

    $meeting_key = $row['meeting_key'];
    $session_key = $row['session_key'];
    $driver_number = $row['driver_number'];
    $st_speed = $row['st_speed'];
    $lap_duration = $row['lap_duration'];
    $duration_sector_1 = $row['duration_sector_1'];
    $duration_sector_2 = $row['duration_sector_2'];
    $duration_sector_3 = $row['duration_sector_3'];
    $lap_number = $row['lap_number'];
    $is_pit_out_lap = $row['is_pit_out_lap'];

    // Verifica se il record esiste già
    $checkSql = "SELECT * FROM lapsdata WHERE meeting_key = '$meeting_key' AND session_key = '$session_key' AND driver_number = '$driver_number'";
    $result = $conn->query($checkSql);

    $sql = "INSERT INTO lapsdata (meeting_key, session_key, driver_number, st_speed, lap_duration, duration_sector_1, duration_sector_2, duration_sector_3, lap_number, is_pit_out_lap) 
        VALUES ('$meeting_key', '$session_key', '$driver_number', '$st_speed', '$lap_duration', '$duration_sector_1', '$duration_sector_2', '$duration_sector_3', '$lap_number', '$is_pit_out_lap')
        ON DUPLICATE KEY UPDATE
        st_speed = VALUES(st_speed),
        lap_duration = VALUES(lap_duration),
        duration_sector_1 = VALUES(duration_sector_1),
        duration_sector_2 = VALUES(duration_sector_2),
        duration_sector_3 = VALUES(duration_sector_3),
        lap_number = VALUES(lap_number),
        is_pit_out_lap = VALUES(is_pit_out_lap)";

    // Esegui la query
    if ($conn->query($sql) === TRUE) {
        //echo "Operation performed successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Chiudi la connessione
$conn->close();