<?php

/**
 * Here, we want to send another request
 * to fetch the user's profile details
 * name, avatar image
 */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Dotenv\Dotenv;

include './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();

// get the user's details


function getEmail(){
    if(empty($_COOKIE['cr_github_access_token'])) {
        return false;
    }
    $client = new Client();
    $userEmail = '';
    // Get user email
    $apiUrl = "https://api.github.com/user/emails";
    try {
        $response = $client->get($apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $_COOKIE['cr_github_access_token'],
                'Accept' => 'application/json',
            ]
        ]);

        if($response->getStatusCode() == 200) {
            $emails = json_decode($response->getBody()->getContents());
            foreach ($emails as $email) {
                if ($email->primary && $email->verified) {
                    // Save the user's email in a variable
                    $userEmail = $email->email;
                    break;
                }
            }
            // Print the response to debug
            //var_dump($emails);
            $email = $emails[0]->email;

            //var_dump($email);
            return $email;
        } else {
            return false;
        }
        
    }
    catch(RequestException $e) {
        return false;
    }
}

function getUser() {
    if(empty($_COOKIE['cr_github_access_token'])) {
        return false;
    }

    $client = new Client();

    // Get user details
    $apiUrl = "https://api.github.com/user";
    try {
        $response = $client->get($apiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $_COOKIE['cr_github_access_token'],
                'Accept' => 'application/json',
            ]
        ]);

        if($response->getStatusCode() == 200) {
            $user = json_decode($response->getBody()->getContents());

            // Save the user's profile image, name, and email in the session
            $_SESSION['user'] = [
                'avatar_url' => $user->avatar_url,
                'name' => $user->name,
                'login' => $user->login, // GitHub username
            ];
            return $user;
        }
        return false;
    }
    catch(RequestException $e) {
        return false;
    }
}

$user = false;

$user = getUser();
$email = getEmail();

//print "EMAIL: [" . $email ."]\n";

$connessione = new mysqli('127.0.0.1', 'root', '', 'statistiche');

if (isset($user)) {
    $username = "$user->login";
    $query = "SELECT* FROM utenti WHERE username= '$username'";

    $result = mysqli_query ($connessione, $query);

    if (mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username']; // Set the session variable
        $_SESSION['profile_image'] = $row['profile_image']; // Set the session variable
        $_SESSION['bestTime'] = $row['record_reaction'];

        // Only set the email session variable if the email is not empty in the database
        if (!empty($row['email'])) {
            $_SESSION['email'] = $row['email']; // Set the session variable
        }
    }else{
        $defaultImage = $user->avatar_url;
        //print "EMAIL: [" . $email ."]\n";
        $sql = "INSERT INTO utenti (username, email, password,profile_image) VALUES ('$user->login', '$email', '','$defaultImage')";
        $connessione->query($sql);
        $query = "SELECT* FROM utenti WHERE username= '$user->login'";

        $result = mysqli_query ($connessione, $query);
        if (mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username']; // Set the session variable
            $_SESSION['profile_image'] = $row['profile_image']; // Set the session variable
            $_SESSION['email'] = $row['email']; // Set the session variable
            $_SESSION['bestTime'] = $row['record_reaction'];
            
        }else{
            echo 'UTENTE NON TROVATO DOPO LA REGISTRAZIONE';
        }
    }
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center min-vh-100">
        <?php if(!empty($user)) : ?>
            <img src="<?= htmlspecialchars($user->avatar_url) ?>" alt="" class="rounded-circle">
            <h1 class="alert alert-success mt-4">Welcome, <?= htmlspecialchars($user->name); ?></h1>
        <?php else : ?>
            <div class="alert alert-danger">Authentication Required</div>
            <a href="signin.php" class="btn btn-primary btn-lg">Please Signin</a>
        <?php endif; ?>
    </div>
</body>
<script>
    setTimeout(function(){
        window.location.href = 'success.html';
    }, 1200);
</script>
</html>