<?php
session_start(); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bestTime = $_POST['bestTime'];

    // Connessione al database
    $conn = new mysqli('localhost', 'root', '', 'statistiche');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];

   // Prepara la query SQL
    $stmt = $conn->prepare("UPDATE utenti SET record_reaction = ? WHERE username = ?");

    // Collega le variabili alla query SQL
    $stmt->bind_param("ss", $bestTime, $username);

    // Esegui la query SQL
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>