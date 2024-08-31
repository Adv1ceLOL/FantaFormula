    
<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Dotenv\Dotenv;

include './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client_id = $_ENV['GITHUB_CLIENT_ID'];
$scopes = 'user:email';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>login.formula1forfun</title>
        <link rel="stylesheet" href="styleLogin.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin with GitHub</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        
        <div class="sfondo"></div>
            <div class = "box">
                <a href="index.php">
                    <img src="media/logo.png" alt="logo">
                </a>
                <form method="post">
                    <label for="login">Please login:</label><br>
                    
                    <input class="testo" type="text" id="username" name="username" placeholder="Enter username" title="Enter username" required><br>
                    <input class="testo" type="password" id="password" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="Password must contain at least one digit, one uppercase letter, and be at least 8 characters long." required><br>  
                    <button class="button-login" name="login">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                width="24"
                                height="24"
                            >
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                fill="currentColor"
                                d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                                ></path>
                            </svg>
                            </div>
                        </div>
                        <span>Login</span>
                    </button>
                    <!--<button class="button-login" name="login">Login</button>-->
                    <a href="register.html" class="register" >Non hai un account?</a>
                </form>
                <div class="d-flex ">
                <?php
                echo '<a href="https://github.com/login/oauth/authorize?client_id=' . $client_id . '&scope=user:email" class="btn btn-success btn-lg">';
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    Signin With GitHub</a>
                </div>
            </div>
            <div id="popup">
                <img src="media/logo.png" alt="logo" class="logo2">
                <p id="popup-text"></p>
                <button id="popup-close">Chiudi</button>
            </div>
            
            <script>
                            
                // Seleziona il popup e il suo testo
                var popup = document.getElementById('popup');
                var popupText = document.getElementById('popup-text');

                // Seleziona il bottone per chiudere il popup
                var popupClose = document.getElementById('popup-close');

                $('.button-login').on('click', function(e) {
                    e.preventDefault();


                    // Recupera i valori di username e password
                    var username = $('#username').val();
                    var password = $('#password').val();

                    // Invia i dati al server utilizzando AJAX
                    $.ajax({
                        type: 'POST',
                        url: 'login.php',
                        data: {
                            username: username,
                            password: password
                        },
                        dataType: "json", 
                        success: function(response) {
                            if (response.error) {
                                popupText.textContent = response.error;
                                popup.style.display = 'block';
                                
                            } else {
                                // Handle success case here
                                window.location.href = "success.html";
                            }
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                });

                $('#popup-close').on('click', function() {
                    popup.style.display = 'none';
                });

            </script>
    </body>
</html><!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{7,}"-->
