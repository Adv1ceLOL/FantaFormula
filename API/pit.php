<?php
    // Database connection
    $db = new mysqli('localhost', 'root', '', 'statistiche');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Get data from the database
    $pilota = $db->real_escape_string($_GET['pilota']); // Assicurati che la variabile sia sicura per l'uso in una query SQL

    $result = $db->query("
        SELECT 
            t.full_name, 
            ROUND(AVG(t.pit_duration), 2) as average_pit_duration,
            t.number_of_stops,
            g.meeting_name
        FROM (
            SELECT 
                DriverData.full_name, 
                pitData.pit_duration,
                (SELECT DISTINCT COUNT(*) FROM pitData p WHERE p.driver_number = DriverData.driver_number AND p.meeting_key = (SELECT MAX(meeting_key) FROM pitData) AND p.pit_duration IS NOT NULL) as number_of_stops,
                pitData.meeting_key
            FROM 
                DriverData 
            JOIN 
                pitData 
            ON 
                DriverData.driver_number = pitData.driver_number 
            JOIN
                sessioniData
            ON
                pitData.session_key = sessioniData.session_key
            WHERE
                pitData.meeting_key = (SELECT MAX(meeting_key) FROM pitData)
                AND DriverData.full_name = '$pilota'
                AND pitData.pit_duration IS NOT NULL
                AND sessioniData.session_name = 'Race'
            GROUP BY 
                DriverData.full_name,
                pitData.meeting_key
        ) t
        JOIN 
            garedata g
        ON
            t.meeting_key = g.meeting_key
        GROUP BY 
            t.full_name,
            g.meeting_name
    ");
    
    // Check if the query was successful
    if ($result === false) {
        die("Query failed: " . $db->error);
    }

    // Fetch the results into an associative array
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close the database connection
    $db->close();

    // Output the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
?>
