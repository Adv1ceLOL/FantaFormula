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
        echo "<th style='padding: 10px;'>Full Name / Stint Number</th>";
        for ($i = 1; $i <= max(array_map('count', $data)); $i++) {
            echo "<th style='padding: 10px;'>" . $i . "</th>";
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
    </table>
</body>
</html>