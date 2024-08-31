<?php
// Connessione al database
$conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

// Controllo connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prendi l'utente da rimuovere
$friend_user = $_POST['utente'];

// Query SQL per rimuovere l'amico
$sql = "DELETE FROM amici WHERE amico = ?";

// Preparazione ed esecuzione della query
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $friend_user);
$stmt->execute();

// Chiudi la connessione
$stmt->close();
$conn->close();

// Reindirizza l'utente alla pagina "pagina_personale"
header('Location: pagina_personale.php');
?>