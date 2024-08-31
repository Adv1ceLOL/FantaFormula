<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$meeting_key = $_GET['meeting'];

echo "sessioni_api.php called successfully\n";

$url = "https://api.openf1.org/v1/sessions?meeting_key=$meeting_key"; // JSONPlaceholder API URL

// Using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    // cURL error
    //echo 'cURL error: ' . curl_error($ch);
} else {
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($status >=200 && $status < 300) {
        // Successful response
        $data = json_decode($response, true); // Assuming the API returns a JSON

        // Database connection
        $db = new mysqli('localhost', 'root', '', 'statistiche');

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Prepare data for database
        foreach ($data as $session) {           
            $session_key = $session['session_key'];
            $year = $session['year'];
            $session_name = $session['session_name'];
            $meeting_key = $session['meeting_key'];
        
            // Check if the row already exists
            $check_stmt = $db->prepare("
                SELECT COUNT(*) FROM sessionidata
                WHERE session_key = ? AND year = ? AND session_name = ? AND meeting_key = ?
            ");
            $check_stmt->bind_param("iisi", $session_key, $year, $session_name, $meeting_key);
            $check_stmt->execute();
            $check_stmt->bind_result($count);
            $check_stmt->fetch();
            $check_stmt->close();
        
            // If the row does not exist, insert it
            if ($count == 0) {
                // Prepare an SQL statement
                $stmt = $db->prepare("
                    INSERT INTO sessionidata (session_key, year, session_name, meeting_key)
                    VALUES (?, ?, ?, ?)
                ");
                $stmt->bind_param("iisi", $session_key, $year, $session_name, $meeting_key);
                $stmt->execute();
                $stmt->close();
            }    
        }
        
    }
    // Close the database connection
    $db->close();
}