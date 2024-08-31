<?php
session_start();
if (isset($_SESSION['username'])) {

    // Connessione al database
    $conn = new mysqli('localhost', 'root', '', 'statistiche');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];

    if (empty($_POST)) {
        // Fai qualcosa se il POST è vuoto

        $sql = "SELECT record_reaction FROM utenti WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo json_encode(['bestTime' => $row['record_reaction']]);
            }
        } else {
            echo "0 results";
        }
    } else {
        $bestTime = $_POST['bestTime'];

        // Aggiorna il record_reaction con bestTime
        $sql = "UPDATE utenti SET record_reaction = '$bestTime' WHERE username = '$username'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    
    $conn->close();

}
?>