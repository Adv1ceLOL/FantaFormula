<?php
// Connessione al database
$conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

// Controllo connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Esegui la query per ottenere la prossima gara
$sql = "SELECT Data, Luogo FROM nextGare ORDER BY Data LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output della prima riga come JSON
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["Data" => "Nessuna gara trovata", "Luogo" => ""]);
}

$conn->close();
?>