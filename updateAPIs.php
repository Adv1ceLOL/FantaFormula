<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli('localhost', 'root', '', 'statistiche');
// Controlla la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Funzione di logging
function logMessage($message) {
    $logFile = 'debug.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

$sql = "SELECT meeting_key FROM nextGare ORDER BY meeting_key LIMIT 1";
$result = $conn->query($sql);

$meeting_key = "latest"; // Default value
logMessage("Default meeting_key set to 'latest'");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $meeting_key = $row['meeting_key'];
    logMessage("Fetched meeting_key from database: $meeting_key");
} else {
    logMessage("No meeting_key found in database, using default");
}

// Define the scripts to run
$scripts = [
    'API_updater/flag_api.php',
    'API_updater/gare_api.php',
    'API_updater/laps_api.php',
    'API_updater/pit_api.php',
    'API_updater/ruote_api.php',
    'API_updater/sessioni_api.php',
    'API_updater/team_radio.php'
];

foreach ($scripts as $script) {
    $command = "php $script $meeting_key";
    logMessage("Executing command: $command");
    exec($command, $output, $return_var);
    if ($return_var !== 0) {
        logMessage("Error executing $script: " . implode("\n", $output));
    } else {
        logMessage("Successfully executed $script");
    }
}


$url = "https://api.openf1.org/v1/position?meeting_key=$meeting_key"; // API URL

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

        $conn = new mysqli('localhost', 'root', '', 'statistiche');
        // Controlla la connessione
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $latest_positions = [];
        foreach ($data as $entry) {
            $driver_number = $entry['driver_number'];
            $date = $entry['date'];
            $position = $entry['position'];

            // If this driver number is not in the latest_positions array yet, or if this entry's date is later than the currently stored date
            if (!isset($latest_positions[$driver_number]) || $date > $latest_positions[$driver_number]['date']) {
                $latest_positions[$driver_number] = [
                    'date' => $date,
                    'position' => $position,
                    'driver' => $driver_number
                ];
            }
        }

        foreach ($latest_positions as $driver_number => $info) {
            // Get the full_name and team_name from the driverdata table
            $stmt = $conn->prepare("SELECT d.full_name, d.team_name FROM driverdata AS d WHERE d.driver_number = ?");
            $stmt->bind_param("i", $driver_number); // "i" indicates the variable type is integer.
            $stmt->execute();
            $result = $stmt->get_result();
            $driverdata = $result->fetch_assoc();
        
            if ($driverdata) {
                // Aggiorna la tabella fanta
                $stmt = $conn->prepare("UPDATE fanta SET gare = gare + 1 WHERE driver_number = ?");
                $stmt->bind_param("i", $driver_number);
                $stmt->execute();

                if ($info['position'] == 1) {
                    $stmt = $conn->prepare("UPDATE fanta SET vittorie = vittorie + 1 WHERE driver_number = ?");
                    $stmt->bind_param("i", $driver_number);
                    $stmt->execute();
                } elseif ($info['position'] == 2 || $info['position'] == 3) {
                    $stmt = $conn->prepare("UPDATE fanta SET podi = podi + 1 WHERE driver_number = ?");
                    $stmt->bind_param("i", $driver_number);
                    $stmt->execute();
                }
                
            }
        }

    } elseif ($status == 500) {
        echo "The server encountered an internal error. Please try again later.";
    } else {
        echo "An error occurred. HTTP Status Code: " . $status;
    }

    $stmt->close();
    $conn->close();
}