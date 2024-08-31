<?php
session_start();

//! 3
function flagUpdater($meeting) {
    echo " Meeting for Flag: $meeting \n";
    $url = "http://localhost/login/API_updater/flag_api.php?" . http_build_query(['meeting' => $meeting]);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout di 10 secondi
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch) . "\n";
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 200) {
            echo "Response from flag_api: $response\n";
        } else {
            echo "HTTP error: $http_code\n";
        }
    }

    curl_close($ch);
}

function lapsUpdater($meeting){
    echo "Meeting for Laps: $meeting\n";
    $url = "http://localhost/login/API_updater/laps_api.php?" . http_build_query(['meeting' => $meeting]);

}

function pitUpdater($meeting){
    echo "Meeting for Pit: $meeting\n";
    $url = "http://localhost/login/API_updater/pit_api.php?" . http_build_query(['meeting' => $meeting]);

}

function ruoteUpdater($meeting){
    echo "Meeting for Ruote: $meeting\n";
    $url = "http://localhost/login/API_updater/ruote_api.php?" . http_build_query(['meeting' => $meeting]);
    
}
//! 1
function sessioniUpdater($meeting){
    echo "Meeting for Sessioni: $meeting\n";
    $url = "http://localhost/login/API_updater/sessioni_api.php?" . http_build_query(['meeting' => $meeting]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout di 10 secondi
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch) . "\n";
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 200) {
            echo "Response from sessioni_api: $response\n";
        } else {
            echo "HTTP error: $http_code\n";
        }
    }

    curl_close($ch);
}
//! 2
function radioUpdater($meeting){
    echo "Meeting for Radio: $meeting\n";
    $url = "http://localhost/login/API_updater/team_radio.php?" . http_build_query(['meeting' => $meeting]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout di 10 secondi
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch) . "\n";
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 200) {
            echo "Response from team_radio: $response\n";
        } else {
            echo "HTTP error: $http_code\n";
        }
    }

    curl_close($ch);
}

$conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

// Controllo connessione

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// First, select the row with the earliest date
$sql = "SELECT * FROM nextGare ORDER BY Data LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $meetingMin = $row['meeting_key'];
}

// First, select the row with the earliest date
$sql = "SELECT * FROM nextGare ORDER BY Data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $currentDate = date('Y-m-d');
    $meetingMax = null;

    while ($row = $result->fetch_assoc()) {
        $luogo = $row['Luogo'];
        $meeting = $row['meeting_key'];
        $data = $row['Data'];

        // Controlla che la data sia successiva alla data attuale
        if (strtotime($data) > strtotime($currentDate)) {
            $meetingMax = $meeting - 1;
            //echo "Meeting MIN key: $meetingMin - Meeting MAX key: $meetingMax";
            break; // Esci dal ciclo quando trovi una data valida
        }
    }

    if ($meetingMax !== null) {
        //echo "Trovata una data valida: $data";
        // Puoi aggiungere qui il codice per gestire il meetingMax trovato
    } else {
        echo "Nessuna data futura trovata.";
    }
} else {
    echo "Nessuna riga trovata.";
}

if($meetingMax == $meetingMin){
    //echo "max e min uguali, niente da aggiornare\n";
    header("Location: /login/index.php");
    exit();
}

//! Ora abbiamo il min e max dove fare gli aggiornamenti

for($i = $meetingMin; $i <= $meetingMax; $i++){
    sessioniUpdater($i);
    flagUpdater($i);
    lapsUpdater($i);
    pitUpdater($i);
    ruoteUpdater($i);
    radioUpdater($i);
    echo "\n Updated meeting: $i";
}

$conn->close();

header("Location: /login/index.php");
exit();

?>