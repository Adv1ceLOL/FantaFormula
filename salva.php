
<?php
    header('Content-Type: application/json');
    session_start();
    // Stabilisci la connessione al database
    $conn = new mysqli('localhost', 'root', '', 'statistiche');

    // Controlla se la connessione è riuscita
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
        
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $scuderia = $_POST['scuderia'];
        $pilota1 = $_POST['pilota1'];
        $pilota2 = $_POST['pilota2'];

        $utente = $_SESSION['username'];

        //Punteggi
        $puntiPilota1Gara = "0";
        $puntiPilota2Gara = "0";
        $moltiplicatoreScuderiaGara = "1";

        $sql = "SELECT posizione, nome, scuderia, fastLap FROM ultimagara ORDER BY posizione";
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) {    
            $puntixposizione = array(25, 18, 15, 12, 10, 8, 6, 4, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            $moltiplicatoreScuderia = array(4 , 3, 2, 1.75, 1.35, 1.30, 1.25, 1.20, 1.15, 1.10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
            // Stampa i dati di ogni riga
            
            $found = false;
            while($row = $result->fetch_assoc()){
                // Assegna i dati alle variabili
                $posizione = $row["posizione"];
                $nome = $row["nome"];
                $scuderiaPilota = $row["scuderia"];
                $fastLap = $row["fastLap"];
                
                if($nome == $pilota1 || $nome == $pilota2){
                    if($nome == $pilota1){
                        $puntiPilota1Gara += $puntixposizione[$posizione-1];
                        if($fastLap)$puntiPilota1Gara += 3;
                    }else if($nome == $pilota2){
                        $puntiPilota2Gara += $puntixposizione[$posizione-1];
                        if($fastLap)$puntiPilota2Gara += 3;
                    }
                }
                if(!$found && $scuderiaPilota == $scuderia){
                    $moltiplicatoreScuderiaGara = $moltiplicatoreScuderia[$posizione-1];
                    $found = true;
                } 
            } 

            $puntiPilota1Gara *= $moltiplicatoreScuderiaGara;
            $puntiPilota2Gara *= $moltiplicatoreScuderiaGara;

            $punteggioTotale = $puntiPilota1Gara + $puntiPilota2Gara;
            try {
                // Controlla se l'utente esiste già
                $checkSql = "SELECT * FROM squadra WHERE utente = ?";
                $checkStmt = $conn->prepare($checkSql);
                $checkStmt->bind_param("s", $utente);
                $checkStmt->execute();
                $checkResult = $checkStmt->get_result();

                if ($checkResult->num_rows > 0) {
                    // La squadra esiste già, invia una risposta appropriata
                    $prevSquadra = 1;
                    $sql = "UPDATE squadra SET scuderia = ?, pilota1 = ?, pilota2 = ?, punteggioTotale = ?, prevSquadra = ? WHERE utente = ?";   
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssiis", $scuderia, $pilota1, $pilota2, $punteggioTotale, $prevSquadra, $utente);
                
                    if($stmt->execute()) {
                        echo json_encode(["success" => "Squadra salvata con successo."]);
                    } else {
                        echo json_encode(["error" => "Errore: " . $stmt->error]);
                    }

                } else {
                    // La squadra non esiste, inserisci i dati
                    $prevSquadra = 1;
                    $sql = "INSERT INTO squadra (utente,scuderia, pilota1, pilota2, punteggioTotale, prevSquadra) VALUES (? ,?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssii", $utente, $scuderia, $pilota1, $pilota2, $punteggioTotale, $prevSquadra);
                
                    if($stmt->execute()) {
                        echo json_encode(["success" => "Squadra salvata con successo."]);
                    } else {
                        echo json_encode(["error" => "Errore: " . $stmt->error]);
                    }
                    
                }
            }catch (Exception $e) {
                echo json_encode(["error" => "Errore inaspettato: " . $e->getMessage()]);
                exit();
            }
              
        } else {
            echo json_encode(["error" => "No POST data received."]);
        }

    }

?>
