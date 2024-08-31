<?php
    // Database connection
    $db = new mysqli('localhost', 'root', '', 'statistiche');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $pilota = $_GET['pilota'];

    // Get specific data from the database for each driver_number
    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

    $result = $db->query("
        SELECT
            driverdata.full_name,
            ROUND(AVG(random_lapsdata.duration_sector_1), 2) AS avg_duration_sector_1,
            ROUND(AVG(random_lapsdata.duration_sector_2), 2) AS avg_duration_sector_2,
            ROUND(AVG(random_lapsdata.duration_sector_3), 2) AS avg_duration_sector_3,
            ROUND(AVG(random_lapsdata.lap_duration), 2) AS avg_lap_duration,
            MAX(random_lapsdata.lap_number) AS max_lap_number
        FROM
            (SELECT * FROM lapsdata WHERE duration_sector_1 IS NOT NULL AND duration_sector_2 IS NOT NULL AND duration_sector_3 IS NOT NULL AND lap_duration IS NOT NULL AND lap_number IS NOT NULL ORDER BY RAND()) AS random_lapsdata
        JOIN
            driverdata ON random_lapsdata.driver_number = driverdata.driver_number
        WHERE
            driverdata.full_name = '$pilota'
        GROUP BY
            driverdata.full_name
        ORDER BY 
            avg_lap_duration
    ");

    // Check if the query was successful
    if ($result === false) {
        die("Query failed: " . $db->error);
    }

    // Fetch each row of results into an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Output the data as a JSON string
    header('Content-Type: application/json');
    echo json_encode($data);

    // Close the database connection
    $db->close();
?>