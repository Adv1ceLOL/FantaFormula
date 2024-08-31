<?php
    // Database connection
    $db = new mysqli('localhost', 'root', '', 'statistiche');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

     // Verifica se il parametro 'pilota' è presente
     if (!isset($_GET['pilota'])) {
        die("Parameter 'pilota' is missing");
    }
    
    // Assegna il parametro 'pilota' a una variabile
    $pilota = $_GET['pilota'];

    // Get data from the database
    $result = $db->query("
        SELECT DISTINCT
            t1.driver_number,
            t1.recording_url,
            t2.full_name
        FROM
            teamRadio AS t1
        JOIN
            driverdata AS t2
        ON
            t1.driver_number = t2.driver_number
        WHERE
            t2.full_name = '$pilota'
        AND
            t1.meeting_key = (
                SELECT 
                    meeting_key
                FROM 
                    sessioniData
                ORDER BY 
                    meeting_key DESC
                LIMIT 1
            )
        AND 
            t1.session_key = (
                SELECT 
                    session_key
                FROM 
                    sessioniData
                WHERE 
                    session_name = 'Race' AND meeting_key = t1.meeting_key
                ORDER BY 
                    session_key ASC
                LIMIT 1
            )
            LIMIT 8
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

