<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="statisticheApiStyle.css">
</head>
<body>
    <div class="container">
        <div class="image-box">
            <img src="../media/versatppen.avif" alt="Driver Image">
        </div>
        <?php $pilota = "Max VERSTAPPEN" ?>
        <div class="data-box">
            <div class="data-item">
                Laps: 
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

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

                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Pilota</th>";
                    echo "<th>Duration Sector 1</th>";
                    echo "<th>Duration Sector 2</th>";
                    echo "<th>Duration Sector 3</th>";
                    echo "<th>Lap Duration</th>";
                    echo "<th>Lap Number</th>";
                    echo "</tr>";

                    // Fetch each row of results into an array
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                        echo "<tr>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['avg_duration_sector_1'] . "</td>";
                        echo "<td>" . $row['avg_duration_sector_2'] . "</td>";
                        echo "<td>" . $row['avg_duration_sector_3'] . "</td>";
                        echo "<td>" . $row['avg_lap_duration'] . "</td>";
                        echo "<td>" . $row['max_lap_number'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";

                    // Close the database connection
                    $db->close();
                ?>
            </div>
            <div class="data-item">
                Ruote: 
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    // Get data from the database
                    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

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
                    die("Query failed: " . $db->error);
                    }

                    // Fetch the results into an associative array
                    $data = [];
                    while($row = $result->fetch_assoc()) {
                        $data[$row['full_name']][$row['stint_number']] = [
                            'laps' => $row['lap_start'] . ' - ' . $row['lap_end']. ' (Type: ' . $row['compound'] . ')',
                            'session_key' => $row['session_key'],
                            'session_name' => $row['session_name']
                        ];
                    }

                    // Print the table header
                    echo "<table style='border-spacing: 10px;'>";
                    echo "<tr>";
                    echo "<th style='padding: 10px;'></th>";
                    for ($i = 1; $i <= max(array_map('count', $data)); $i++) {
                        echo "<th style='padding: 10px;'></th>";
                    }
                    echo "</tr>";

                    // Print each row of the table
                    foreach ($data as $fullName => $stints) {
                        echo "<tr>";
                        echo "<td style='padding: 10px;'>" . $fullName . "</td>";
                        foreach ($stints as $stintNumber => $stintData) {
                            $laps = str_replace($stintData['session_name'], $stintData['session_key'], $stintData['laps']);
                            echo "<td style='padding: 10px;'>" . $laps . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";

                    // Close the database connection
                    $db->close();
                ?>
            </div>
            <div class="data-item">
                Pit: 
                <table>
                <tr>
                    <th>Media Pit Duration</th>
                    <th>Numero PIT</th>
                    <th>Location</th>
                </tr>
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }
                    
                    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

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
                                (SELECT COUNT(*) FROM pitData p WHERE p.driver_number = DriverData.driver_number AND p.meeting_key = (SELECT MAX(meeting_key) FROM pitData) AND p.pit_duration IS NOT NULL) as number_of_stops,
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
                    
                    // Fetch all rows and print them in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['average_pit_duration'] . "</td><td>" . $row['number_of_stops'] . "</td><td>" . $row['meeting_name'] . "</td></tr>";
                    }
                    // Close the database connection
                    $db->close();
                ?>
                </table>
            </div>
            <div class="data-item">
                Radio: 
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

                    // Get data from the database
                    $result = $db->query("
                        SELECT
                            filtered.driver_number,
                            GROUP_CONCAT(DISTINCT filtered.recording_url) AS recording_urls,
                            t2.full_name
                        FROM
                            (
                                SELECT 
                                    t1.driver_number,
                                    t1.recording_url
                                FROM
                                    teamRadio AS t1
                                JOIN
                                    sessioniData AS t3
                                ON
                                    t1.session_key = t3.session_key
                                WHERE
                                    t3.session_name = 'Race'
                            ) AS filtered
                        JOIN
                            driverdata AS t2
                        ON
                            filtered.driver_number = t2.driver_number
                        WHERE
                            t2.full_name = '$pilota'
                        GROUP BY
                            filtered.driver_number,
                            t2.full_name
                    ");

                    
                    // Check if the query was successful
                    if ($result === false) {
                        die("Query failed: " . $db->error);
                    }

                    
                    // Fetch and print each row of results
                    while ($row = $result->fetch_assoc()) {
                        $driver_number = $row['driver_number'];
                        $full_name = $row['full_name'];

                        // Check if the key 'recording_urls' exists in the array
                        if (array_key_exists('recording_urls', $row)) {
                            $recording_urls = explode(',', $row['recording_urls']);

                            // Print the values
                            foreach ($recording_urls as $recording_url) {
                                echo'<audio controls>
                                    <source src="'. $recording_url . '" type="audio/mpeg">
                                </audio>';
                            }
                        } else {
                            echo "No recording URLs found for driver: $full_name";
                        }
                    }
                    
                    
                    // Close the database connection
                    $db->close();
                ?>
            </div>
            <div class="data-item">
                Infrazioni: 
                <?php   
                // Database connection
                $db = new mysqli('localhost', 'root', '', 'statistiche');

                // Check connection
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

                $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

                $result = $db->query("SELECT DISTINCT f.driver_number, f.message, d.full_name 
                                    FROM flagsdata f 
                                    JOIN driverdata d ON f.driver_number = d.driver_number 
                                    WHERE d.full_name = '$pilota'");

                // Check if the query returned any results
                if ($result->num_rows > 0) {
                    // Fetch all rows and store messages in an array
                    $messages = [];
                    while ($row = $result->fetch_assoc()) {
                        $messages[] = $row['message'];
                    }

                // Print all messages, separated by a comma
                echo implode(', ', $messages);

                } else {
                    echo "Il pilota non ha commesso infrazioni";
                }
                // Close the database connection
                $db->close();
                
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="image-box">
            <img src="../media/leclerc.avif" alt="Driver Image">
        </div>
        <?php $pilota = "Charles LECLERC" ?>
        <div class="data-box">
            <div class="data-item">
                Laps: 
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

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

                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<th>Pilota</th>";
                    echo "<th>Duration Sector 1</th>";
                    echo "<th>Duration Sector 2</th>";
                    echo "<th>Duration Sector 3</th>";
                    echo "<th>Lap Duration</th>";
                    echo "<th>Lap Number</th>";
                    echo "</tr>";

                    // Fetch each row of results into an array
                    $data = array();
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                        echo "<tr>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['avg_duration_sector_1'] . "</td>";
                        echo "<td>" . $row['avg_duration_sector_2'] . "</td>";
                        echo "<td>" . $row['avg_duration_sector_3'] . "</td>";
                        echo "<td>" . $row['avg_lap_duration'] . "</td>";
                        echo "<td>" . $row['max_lap_number'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";

                    // Close the database connection
                    $db->close();
                ?>
            </div>
            <div class="data-item">
                Ruote: 
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    // Get data from the database
                    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

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
                    die("Query failed: " . $db->error);
                    }

                    // Fetch the results into an associative array
                    $data = [];
                    while($row = $result->fetch_assoc()) {
                        $data[$row['full_name']][$row['stint_number']] = [
                            'laps' => $row['lap_start'] . ' - ' . $row['lap_end']. ' (Type: ' . $row['compound'] . ')',
                            'session_key' => $row['session_key'],
                            'session_name' => $row['session_name']
                        ];
                    }

                    // Print the table header
                    echo "<table style='border-spacing: 10px;'>";
                    echo "<tr>";
                    echo "<th style='padding: 10px;'></th>";
                    for ($i = 1; $i <= max(array_map('count', $data)); $i++) {
                        echo "<th style='padding: 10px;'></th>";
                    }
                    echo "</tr>";

                    // Print each row of the table
                    foreach ($data as $fullName => $stints) {
                        echo "<tr>";
                        echo "<td style='padding: 10px;'>" . $fullName . "</td>";
                        foreach ($stints as $stintNumber => $stintData) {
                            $laps = str_replace($stintData['session_name'], $stintData['session_key'], $stintData['laps']);
                            echo "<td style='padding: 10px;'>" . $laps . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";

                    // Close the database connection
                    $db->close();
                ?>
            </div>
            <div class="data-item">
                Pit: 
                <table>
                <tr>
                    <th>Media Pit Duration</th>
                    <th>Numero PIT</th>
                    <th>Location</th>
                </tr>
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }
                    
                    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

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
                                (SELECT COUNT(*) FROM pitData p WHERE p.driver_number = DriverData.driver_number AND p.meeting_key = (SELECT MAX(meeting_key) FROM pitData) AND p.pit_duration IS NOT NULL) as number_of_stops,
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
                    
                    // Fetch all rows and print them in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['average_pit_duration'] . "</td><td>" . $row['number_of_stops'] . "</td><td>" . $row['meeting_name'] . "</td></tr>";
                    }
                    // Close the database connection
                    $db->close();
                ?>
                </table>
            </div>
            <div class="data-item">
                Radio: 
                <?php
                    // Database connection
                    $db = new mysqli('localhost', 'root', '', 'statistiche');

                    // Check connection
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

                    // Get data from the database
                    $result = $db->query("
                        SELECT
                            filtered.driver_number,
                            GROUP_CONCAT(DISTINCT filtered.recording_url) AS recording_urls,
                            t2.full_name
                        FROM
                            (
                                SELECT 
                                    t1.driver_number,
                                    t1.recording_url
                                FROM
                                    teamRadio AS t1
                                JOIN
                                    sessioniData AS t3
                                ON
                                    t1.session_key = t3.session_key
                                WHERE
                                    t3.session_name = 'Race'
                            ) AS filtered
                        JOIN
                            driverdata AS t2
                        ON
                            filtered.driver_number = t2.driver_number
                        WHERE
                            t2.full_name = '$pilota'
                        GROUP BY
                            filtered.driver_number,
                            t2.full_name
                    ");

                    
                    // Check if the query was successful
                    if ($result === false) {
                        die("Query failed: " . $db->error);
                    }

                    
                    // Fetch and print each row of results
                    while ($row = $result->fetch_assoc()) {
                        $driver_number = $row['driver_number'];
                        $full_name = $row['full_name'];

                        // Check if the key 'recording_urls' exists in the array
                        if (array_key_exists('recording_urls', $row)) {
                            $recording_urls = explode(',', $row['recording_urls']);

                            // Print the values
                            foreach ($recording_urls as $recording_url) {
                                echo'<audio controls>
                                    <source src="'. $recording_url . '" type="audio/mpeg">
                                </audio>';
                            }
                        } else {
                            echo "No recording URLs found for driver: $full_name";
                        }
                    }
                    
                    
                    // Close the database connection
                    $db->close();
                ?>
            </div>
            <div class="data-item">
                Infrazioni: 
                <?php   
                // Database connection
                $db = new mysqli('localhost', 'root', '', 'statistiche');

                // Check connection
                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

                $pilota = $db->real_escape_string($pilota); // Assicurati che la variabile sia sicura per l'uso in una query SQL

                $result = $db->query("SELECT DISTINCT f.driver_number, f.message, d.full_name 
                                    FROM flagsdata f 
                                    JOIN driverdata d ON f.driver_number = d.driver_number 
                                    WHERE d.full_name = '$pilota'");

                // Check if the query returned any results
                if ($result->num_rows > 0) {
                    // Fetch all rows and store messages in an array
                    $messages = [];
                    while ($row = $result->fetch_assoc()) {
                        $messages[] = $row['message'];
                    }

                // Print all messages, separated by a comma
                echo implode(', ', $messages);

                } else {
                    echo "Il pilota non ha commesso infrazioni";
                }
                // Close the database connection
                $db->close();
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>