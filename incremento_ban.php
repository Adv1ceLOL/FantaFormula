<?php
if (php_sapi_name() !== 'cli') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];

        $conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

        if ($conn->connect_error) {
            die('Errore di connessione (' . $conn->connect_errno . ') ' . $conn->connect_error);
        }

        $user = new User();
        $user->toggleBan($username, $conn);
        header('Location: pagina_personale.php'); 
    }
}

class User {
    public function toggleBan($username, $conn) {
        $sql = "SELECT ban FROM utenti WHERE username = ?";
        $stmt1 = $conn->prepare($sql);
        $stmt1->bind_param('s', $username);
        $stmt1->execute();
        $result = $stmt1->get_result();
        $row = $result->fetch_assoc();
    
        if ($row['ban'] == 0) {
            $sql = "UPDATE utenti SET ban = 1 WHERE username = ?";
            $newBanStatus = 1; // New ban status if the user was not banned before
        } else {
            $sql = "UPDATE utenti SET ban = 0 WHERE username = ?";
            $newBanStatus = 0; // New ban status if the user was banned before 
        }
    
        $stmt2 = $conn->prepare($sql);
        $stmt2->bind_param('s', $username);
        $success = $stmt2->execute();
      
    
        // Check for SQL errors
        if ($result === false) {
            error_log('SQL Error: ' . $conn->error);
            return ['success' => false, 'newBanStatus' => null]; // Return failure and null ban status on SQL error
        }
    
        // Return the success status and the new ban status
        return ['success' => $success, 'newBanStatus' => $newBanStatus];
        
    }
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];

//     $conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

//             if ($conn->connect_error) {
//                 die('Errore di connessione (' . $conn->connect_errno . ') ' . $conn->connect_error);
//             }

//             $sql = "SELECT ban FROM utenti WHERE username = ?";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param('s', $username);
//             $stmt->execute();
//             $result = $stmt->get_result();
//             $row = $result->fetch_assoc();
            
//     if($row['ban'] == 0){
//     $sql = "UPDATE utenti SET ban = 1 WHERE username = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('s', $username);
//     $stmt->execute();
//     // Reindirizza l'utente alla pagina "segnala utente"
//     header('Location: pagina_personale.php');
//     }
//     else{
//         $sql = "UPDATE utenti SET ban = 0 WHERE username = ?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('s', $username);
//         $stmt->execute();
//         // Reindirizza l'utente alla pagina "segnala utente"
//         header('Location: pagina_personale.php'); 
//     }
//     exit;

// }
?>