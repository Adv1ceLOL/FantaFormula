<?php
// Database connection
$db = new mysqli('localhost', 'root', '', 'statistiche');

// Check connection
if ($db->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $db->connect_error]));
}

// Check if 'pilota' parameter is set
if (!isset($_GET['pilota'])) {
    die(json_encode(['error' => "Missing 'pilota' parameter"]));
}

// Get data from the database
$pilota = $db->real_escape_string($_GET['pilota']); // Assicurati che la variabile sia sicura per l'uso in una query SQL

$result = $db->query("
    SELECT
        t2.full_name,
        t1.stint_number,
        t1.lap_start,
        t1.lap_end,
        t1.compound,
        t3.session_name,
        t1.session_key
    FROM
        ruotedata AS t1
    JOIN
        driverdata AS t2
    ON
        t1.driver_number = t2.driver_number
    JOIN
        sessionidata AS t3
    ON
        t1.session_key = t3.session_key
    WHERE
        t3.session_name = 'Race'
        AND t2.full_name = '$pilota'
        AND t3.meeting_key = (
            SELECT MAX(meeting_key) FROM sessionidata
        )
    ORDER BY
        t2.full_name,
        t1.stint_number
");

// Check if the query was successful
if ($result === false) {
    die(json_encode(['error' => "Query failed: " . $db->error]));
}

// Fetch the results into an associative array
$data = [];
while($row = $result->fetch_assoc()) {
    $data[$row['full_name']][$row['stint_number']] = [
        'laps' => $row['lap_start'] . ' - ' . $row['lap_end'],
        'compound' => $row['compound'],
        'session_key' => $row['session_key'],
        'session_name' => $row['session_name']
    ];
}

// Close the database connection
$db->close();

// Check if data is empty
if (empty($data)) {
    die(json_encode(['error' => "No data found for pilota: $pilota"]));
}

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>