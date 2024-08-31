<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    $conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

            if ($conn->connect_error) {
                die('Errore di connessione (' . $conn->connect_errno . ') ' . $conn->connect_error);
            }

    $sql = "UPDATE utenti SET num_segnalazioni = num_segnalazioni + 1 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    // Reindirizza l'utente alla pagina "segnala utente"
    header('Location: pagina_personale.php');
    exit;

}