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
        <th>Driver Number</th>
        <th>Category</th>
        </tr>
        <?php
        // Database connection
        $db = new mysqli('localhost', 'root', '', 'statistiche');

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $result = $db->query("SELECT driver_number, message FROM flagsdata");

        // Fetch all rows and print them in the table
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['driver_number'] . "</td><td>" . $row['message'] . "</td></tr>";
        }
        // Close the database connection
        $db->close();
        ?>
    </table>
</body>
</html>