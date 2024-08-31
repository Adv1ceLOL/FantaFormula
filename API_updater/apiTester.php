<?php

// Database connection
$db = new mysqli('localhost', 'root', '', 'statistiche');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$meeting = $_GET['meeting'];

echo "\n Meeting tester: $meeting";