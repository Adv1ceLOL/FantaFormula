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
<?php
    // Database connection
    $db = new mysqli('localhost', 'root', '', 'statistiche');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Get specific data from the database for each driver_number
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