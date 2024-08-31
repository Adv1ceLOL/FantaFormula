<?php
session_start();

$conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

// Controllo connessione

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// First, select the row with the earliest date
$sql = "SELECT * FROM nextGare ORDER BY Data LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the 'Luogo'
    $row = $result->fetch_assoc();
    $luogo = $row['Luogo'];

    // Now, delete the row with the fetched 'Luogo'
    $sql = "DELETE FROM nextGare WHERE Luogo = '$luogo'";
    $conn->query($sql);

    $user = $_SESSION['username'];

    $sql = "SELECT punteggioTotale FROM squadra WHERE utente = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $punteggio = $row["punteggioTotale"];

        $sql = "UPDATE utenti SET punteggioStagionale = punteggioStagionale + $punteggio WHERE username = '$user'";
        $conn->query($sql);

        $sql = "UPDATE squadra SET prevSquadra = 0 WHERE utente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        
    }  else {
        echo "no punteggioTotale found";
    }

}

?>