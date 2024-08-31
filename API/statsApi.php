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

        // Get data from the database
        $result = $db->query("
        SELECT 
            t.full_name, 
            ROUND(AVG(t.pit_duration), 2) as average_pit_duration,
            t.number_of_stops,
            g.meeting_name
        FROM (
            SELECT 
                DriverData.full_name, 
                COUNT(carData.pit_duration) as number_of_stops,
                AVG(carData.pit_duration) as pit_duration,
                carData.meeting_key
            FROM 
                DriverData 
            JOIN 
                carData 
            ON 
                DriverData.driver_number = carData.driver_number 
            WHERE 
                carData.meeting_key = (SELECT MAX(meeting_key) FROM carData)
                AND carData.pit_duration IS NOT NULL
            GROUP BY 
                DriverData.full_name,
                carData.meeting_key
        ) t
        JOIN 
            garedata g
        ON
            t.meeting_key = g.meeting_key
        WHERE
            t.pit_duration IS NOT NULL
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