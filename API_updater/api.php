<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$url = "https://api.openf1.org/v1/race_control?meeting_key=latest"; // JSONPlaceholder API URL

print_r($url . "\n");
// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Get HTTP status code
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    // cURL error
    echo 'cURL error: ' . curl_error($ch);
} else {
    if ($status >= 200 && $status < 300) {
        // Successful response
        $data = json_decode($response, true); // Assuming the API returns a JSON

        // Print the data
        echo "Decoded Data: <br>";
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    } elseif ($status == 500) {
        echo "The server encountered an internal error. Please try again later.";
    } else {
        echo "An error occurred. HTTP Status Code: " . $status;
    }
}

// Crea connessione al database
$conn = new mysqli('localhost', 'root', '', 'statistiche');

// Controlla la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepara la query SQL
$stmt = $conn->prepare("INSERT INTO flagsData (category, date, driver_number, flag, lap_number, meeting_key, message, scope, sector, session_key) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Itera attraverso ogni elemento nell'array dei dati
foreach ($data as $row) {
    $driver_number = $row['driver_number'];
    $message = $row['message'];

    // Se driver_number è nullo, cerca di estrarre il numero del driver dal messaggio
    if ($driver_number === null) {
        if (preg_match('/CAR (\d+)/', $message, $matches)) {
            $driver_number = $matches[1];
        } else {
            continue;
        }
    }

    
    $date = $row['date'];
    $lap_number = $row['lap_number'];
    $meeting_key = $row['meeting_key'];
    $session_key = $row['session_key'];
    $category = $row['category'];
    $flag = $row['flag'];
    $scope = $row['scope'];
    $sector = $row['sector'];

    // Prima di inserire, controlla se la session_key corrisponde a una sessione con nome 'Race'
    $checkSql = "SELECT * FROM sessioniData WHERE session_key = $session_key AND session_name = 'Race'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Se la session_key corrisponde a una sessione 'Race', inserisci i dati nel database
        $stmt->bind_param("ssisissisi", $category, $date, $driver_number, $flag, $lap_number, $meeting_key, $message, $scope, $sector, $session_key);
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

$stmt->close();
// Chiudi la connessione
$conn->close();