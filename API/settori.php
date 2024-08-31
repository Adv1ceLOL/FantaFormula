
<?php
session_start();
    // Database connection
    $db = new mysqli('localhost', 'root', '', 'statistiche');

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Get data from the database
     $pilota = $db->real_escape_string($_GET['pilota']); // Assicurati che la variabile sia sicura per l'uso in una query SQL
    //$pilota = "Max VERSTAPPEN";

    // if (!isset($_SESSION['meeting_key']) || empty($_SESSION['meeting_key'])) {
    //     die("Meeting key is not set or is empty.");
    // }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    $meeting_key = $_SESSION['meeting_key'];
    echo " METTING : $meeting_key";

    $result = $db->query("SELECT DISTINCT f.driver_number, f.message, d.full_name 
                            FROM flagsdata f 
                            JOIN driverdata d ON f.driver_number = d.driver_number 
                            WHERE d.full_name = '$pilota' 
                            AND f.message NOT LIKE '%BLUE FLAG%'
                            AND f.meeting_key = '$meeting_key'");

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