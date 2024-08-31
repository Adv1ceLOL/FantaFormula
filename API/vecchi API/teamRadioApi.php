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
            <th>Pit Duration</th>
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
            t1.driver_number,
            SUBSTRING_INDEX(GROUP_CONCAT(t1.recording_url ORDER BY RAND()), ',', 1) AS recording_url,
            t2.full_name
        FROM
            teamRadio AS t1
        JOIN
            driverdata AS t2
        ON
            t1.driver_number = t2.driver_number
        GROUP BY
            t1.driver_number,
            t2.full_name
        ");

        
        // Check if the query was successful
        if ($result === false) {
            die("Query failed: " . $db->error);
        }

        // Fetch and print each row of results
        while ($row = $result->fetch_assoc()) {
            $driver_number = $row['driver_number'];
            $recording_url = $row['recording_url'];
            $full_name = $row['full_name']; // Add this line

            // Print the values
            echo "Driver Number: $driver_number<br>";
            echo'<audio controls>
                <source src="'. $recording_url . '" type="audio/mpeg">
            </audio>';
            echo "Recording URL: $recording_url<br>";
            echo "Full Name: $full_name<br><br>"; // Add this line
        }
        // Close the database connection
        $db->close();
        ?>
    </table>
</body>
</html>