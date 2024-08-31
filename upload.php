<?php
session_start();

// Connessione al database
$db = new mysqli('localhost', 'root', '', 'statistiche');

if ($db->connect_error) {
    die("Connessione fallita: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] == 0) {
        $uploadedFile = $_FILES['profilePicture'];

        // Controlla se il file è un'immagine
        $check = getimagesize($uploadedFile['tmp_name']);
        if ($check !== false) {
            // Il file è un'immagine

            // Specifica il percorso in cui desideri salvare l'immagine
            $targetDirectory = "uploads/";
            
            // Crea la directory se non esiste
            if (!file_exists($targetDirectory)) {
                mkdir($targetDirectory, 0777, true);
            }

            $targetFile = $targetDirectory . basename($uploadedFile["name"]);

            // Sposta il file caricato nella directory desiderata
            if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
                echo "L'immagine ". basename($uploadedFile["name"]). " è stata caricata.";

                // Aggiorna il database con il percorso dell'immagine
                $username = $_SESSION['username'];
                $stmt = $db->prepare("UPDATE utenti SET profile_image = ? WHERE username = ?");
                $stmt->bind_param('ss', $targetFile, $username);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "Il percorso dell'immagine è stato aggiornato nel database.";
                    // Aggiorna l'immagine del profilo nella sessione
                    $_SESSION['profile_image'] = $targetFile;
                } else {
                    echo "Non è stato possibile aggiornare il percorso dell'immagine nel database.";
                }

                $stmt->close();
            } else {
                echo "Si è verificato un errore durante il caricamento del file.";
            }
        } else {
            echo "Il file caricato non è un'immagine.";
        }
    } else {
        echo "Nessun file caricato.";
    }
}

$db->close();
// Reindirizza l'utente a pagina_personale.php
header('Location: pagina_personale.php');
?>