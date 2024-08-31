<?php
session_start(); // Ensure the session is started

$pilota = 'some_value'; // Replace with actual value
$url = "http://localhost/login/API/settori.php?" . http_build_query(['pilota' => $pilota, 'PHPSESSID' => session_id()]);

// Debugging: Log the URL and session ID
file_put_contents('debug_log.txt', "URL: " . $url . "\n", FILE_APPEND);
file_put_contents('debug_log.txt', "Session ID: " . session_id() . "\n", FILE_APPEND);

// Make the HTTP request (e.g., using file_get_contents or cURL)
$response = file_get_contents($url);

// Debugging: Log the response
file_put_contents('debug_log.txt', "Response: " . $response . "\n", FILE_APPEND);
?>