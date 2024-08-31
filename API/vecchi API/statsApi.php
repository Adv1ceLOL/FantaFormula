<!DOCTYPE html>
<html>
<head>
    <title>Database Data</title>
</head>
<body>
    <a href="ruoteApi.php" class="button">Ruote</a>
    <a href="statsApi.php" class="button">Stats</a>
    <a href="teamRadioApi.php" class="button">Radio</a>
    <a href="lapsApi.php" class="button">Laps</a>
    <a href="flagApi.php" class="button">Flags</a>
    <table>
        <tr>
            <th>Full Name</th>
            <th>Somma Pit Duration</th>
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
            echo "<tr><td>" . $row['full_name'] . "</td><td>" . $row['average_pit_duration'] . "</td><td>" . $row['number_of_stops'] . "</td><td>" . $row['meeting_name'] . "</td></tr>";
        }
        // Close the database connection
        $db->close();
        ?>
    </table>
</body>
</html>