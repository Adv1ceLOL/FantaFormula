<?php 
session_start(); // Start the session at the beginning of your file 
?>

<!DOCTYPE html>
<html lang="IT">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FormulaForFun</title>
        <link rel="stylesheet" href="stile_scudeire_gen.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="header">
                <div class="logo">
                <a href="index.php" class="box-link"><img src="media/logo.png" alt=""></a>
                </div>

                <ul class="menu">
                    <?php if(isset($_SESSION['username'])): ?>
                        <li><a href="pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a></li>
                        <label><a href="logout.php" id="logoutButton" class="menu-text">LOGOUT</a></label>
                    <?php else: ?>
                        <label><a href="loginStart.php" id="loginButton" class="menu-text">Login</a></label>
                        <label><a href="register.html" id="registerButton" class="menu-text">Register</a></label>
                    <?php endif; ?>
                    <li><a href="API/statisticheApi.php" class="menu-text">Stats</a></li>
                    <li><a href="piloti.php" class="menu-text">Piloti</a>
                        <ul>
                            <li><a href="piloti/verstappen.php">Max Verstappen</a></li> 
                            <li><a href="piloti/perez.php">Sergio Perez</a></li> 
                            <li><a href="piloti/Hamilton.php">Lewis Hamilton</a></li> 
                            <li><a href="piloti/Russel.php">George Russell</a></li> 
                            <li><a href="piloti/Leclerc.php">Charles Leclerc</a></li>
                            <li><a href="piloti/sainz.php">Carlos Sainz</a></li> 
                            <li><a href="piloti/Norris.php">Lando Norris</a></li>
                            <li><a href="piloti/piastri.php">Oscar Piastri</a></li>
                            <li><a href="piloti/Alonso.php">Fernando Alonso</a></li>
                            <li><a href="piloti/Stroll.php">Lance Stroll</a></li>                     
                            <li><a href="piloti/Gasly.php">Pierre Gasly</a></li>
                            <li><a href="piloti/Ocon.php">Esteban Ocon</a></li>
                            <li><a href="piloti/Albon.php">Alexander Albon</a></li>
                            <li><a href="piloti/Sargeant.php">Logan Sargeant</a></li>
                            <li><a href="piloti/Tsunoda.php">Yuki Tsunoda</a></li>
                            <li><a href="piloti/Ricciardo.php">Daniel Ricciardo</a></li>
                            <li><a href="piloti/bottas.php">Valterri Bottas</a></li>
                            <li><a href="piloti/Zhou.php">Ghuanyu Zhou</a></li>
                            <li><a href="piloti/Hulkenberg.php">Nico Hulkenberg</a></li>
                            <li><a href="piloti/magnussen.php">Kevin Magnussen</a></li>
                        </ul>
                    </li>
                    <li><a href="fanta-formula.php" class="menu-text">Fanta-Formula</a></li>
                </ul>

                <div class="r-l">
                <?php if(isset($_SESSION['username'])): ?>
                            <a href="pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a>
                            <a href="logout.php" id="logoutButton" class="button">LOGOUT</a>
                        <?php else: ?>
                            <a href="login.html" id="loginButton" class="button">LOGIN</a>
                            <p>
                            <a href="register.html" id="registerButton" class="button">REGISTER</a>
                        <?php endif; ?>
                </div>

                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

        <div class="mt-1">

                <div class="poster mt-1">
                    <div class="poster__img_redbull">
                        <div class="poster__content">
                            <img src="media/logorb.png" alt="Image description">
                            <h1 class="alf-big-text">Red Bull </h1>
                            <p class="right-text big-text">1°</p>
                        </div>
                        <a href="scuderie/Redbull.php"><img src="media/redbull-removebg-preview.png" alt=""></a>
                    </div>
                    <div class="poster__img_ferrari">
                        <div class="poster__content">
                            <img src="media/logofr-removebg-preview.png" alt="Image description">
                            <h1 class="alf-big-text">Ferrari </h1>
                            <p class="right-text big-text">2°</p>
                        </div>
                        <a href="scuderie/Ferrari.php"><img src="media/ferrar-removebg-preview.png" alt=""></a>
                    </div>
                    </div>
                </div>

                <div class="poster mt-1">
                    <div class="poster__img_mclaren ">
                        <div class="poster__content">
                            <img src="media/logoml.png" alt="Image description">
                            <h1 class="alf-big-text">McLaren </h1>
                            <p class="right-text big-text">3°</p>
                        </div>
                        <a href="scuderie/McLaren.php"><img src="media/mclaren-removebg-preview.png" alt=""></a>
                    </div>
                    <div class="poster__img_mercedes ">
                        <div class="poster__content">
                            <img src="media/logomr.png" alt="Image description">
                            <h1 class="alf-big-text">Mercedes </h1>
                            <p class="right-text big-text">4°</p>
                        </div>
                        <a href="scuderie/Mercedes.php"><img src="media/mercedes-removebg-preview.png" alt=""></a>
                    </div>
                    </div>
                </div>

                <div class="poster mt-1">
                    <div class="poster__img_aston ">
                        <div class="poster__content">
                            <img src="media/logoam.png" alt="Image description">
                            <h1 class="alf-big-text">Aston Martin </h1>
                            <p class="right-text big-text">5°</p>
                        </div>
                        <a href="scuderie/AstonMartin.php"><img src="media/AstonMartin-removebg-preview.png" alt=""></a>
                    </div>
                    <div class="poster__img_haas ">
                        <div class="poster__content">
                            <img src="media/logohaas.png" alt="Image description">
                            <h1 class="alf-big-text">Hass </h1>
                            <p class="right-text big-text">6°</p>
                        </div>
                        <a href="scuderie/Haas.php"><img src="media/Haas-removebg-preview.png" alt=""></a>
                    </div>
                    </div>
                </div>

                <div class="poster mt-1">
                    <div class="poster__img_williams ">
                        <div class="poster__content">
                            <img src="media/logowill.png" alt="Image description">
                            <h1 class="alf-big-text">Williams</h1>
                            <p class="right-text big-text">7°</p>
                        </div>
                        <a href="scuderie/Williams.php"><img src="media/williams-removebg-preview.png" alt=""></a>
                    </div>
                    <div class="poster__img_sauber ">
                        <div class="poster__content">
                            <img src="media/logosauber.png" alt="Image description">
                            <h1 class="alf-big-text">Kick Sauber</h1>
                            <p class="right-text big-text">8°</p>
                        </div>
                        <a href="scuderie/KickSaubern.php"><img src="media/kik_saubern-removebg-preview.png" alt=""></a>
                    </div>
                    </div>
                </div>

                <div class="poster mt-1">
                    <div class="poster__img_alpha ">
                        <div class="poster__content">
                            <img src="media/logoati.png" alt="Image description">
                            <h1 class="alf-big-text">RB </h1>
                            <p class="right-text big-text">9°</p>
                        </div>
                        <a href="scuderie/AlphaTauri.php"><img src="media/AlphaTauri-removebg-preview.png" alt=""></a>
                    </div>
                    <div class="poster__img_alphine ">
                        <div class="poster__content">
                            <img src="media/logoalp.png" alt="Image description">
                            <h1 class="alf-big-text">Alpine </h1>
                            <p class="right-text big-text">10°</p>
                        </div>
                        <a href="scuderie/Alpine.php"><img src="media/alphine-removebg-preview.png" alt=""></a>
                    </div>
                    </div>
                </div>
                
        </div>

        <div class="poster__telefono mt-1">
            <div class="poster__img">
                <div class="poster__content__telefono">
                    <img src="media/logorb.png" alt="Image description">
                    <h1 class="alf-big-text">Red Bull </h1>
                    <p class="right-text big-text">1°</p>
                </div>
                <a href="scuderie/Redbull.php"><img src="media/redbull-removebg-preview.png" alt=""></a>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img">
                <div class="poster__content__telefono">
                    <img src="media/logofr-removebg-preview.png" alt="Image description">
                    <h1 class="alf-big-text">Ferrari </h1>
                    <p class="right-text big-text">2°</p>
                </div>
                <a href="scuderie/Ferrari.php"><img src="media/ferrar-removebg-preview.png" alt=""></a>
            </div>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logoml.png" alt="Image description">
                    <h1 class="alf-big-text">McLaren </h1>
                    <p class="right-text big-text">3°</p>
                </div>
                <a href="scudeire/McLaren.php"><img src="media/mclaren-removebg-preview.png" alt=""></a>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logomr.png" alt="Image description">
                    <h1 class="alf-big-text">Mercedes </h1>
                    <p class="right-text big-text">4°</p>
                </div>
                <a href="scuderie/Mercedes.php"><img src="media/mercedes-removebg-preview.png" alt=""></a>
            </div>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logoam.png" alt="Image description">
                    <h1 class="alf-big-text">Aston Martin </h1>
                    <p class="right-text big-text">5°</p>
                </div>
                <a href="scuderie/AstonMartin.php"><img src="media/AstonMartin-removebg-preview.png" alt=""></a>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logohaas.png" alt="Image description">
                    <h1 class="alf-big-text">Hass </h1>
                    <p class="right-text big-text">6°</p>
                </div>
                <a href="scuderie/Haas.php"><img src="media/Haas-removebg-preview.png" alt=""></a>
            </div>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logowill.png" alt="Image description">
                    <h1 class="alf-big-text">Williams</h1>
                    <p class="right-text big-text">7°</p>
                </div>
                <a href="scuderie/Williams.php"><img src="media/williams-removebg-preview.png" alt=""></a>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logosauber.png" alt="Image description">
                    <h1 class="alf-big-text">Kick Sauber</h1>
                    <p class="right-text big-text">8°</p>
                </div>
                <a href="scuderie/KickSaubern.php"><img src="media/kik_saubern-removebg-preview.png" alt=""></a>
            </div>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logoati.png" alt="Image description">
                    <h1 class="alf-big-text">RB </h1>
                    <p class="right-text big-text">9°</p>
                </div>
                <a href="scuderie/AlphaTauri.php"><img src="media/AlphaTauri-removebg-preview.png" alt=""></a>
            </div>
        </div>

        <div class="separator"></div>

        <div class="poster__telefono mt-1">
            <div class="poster__img ">
                <div class="poster__content__telefono">
                    <img src="media/logoalp.png" alt="Image description">
                    <h1 class="alf-big-text">Alpine </h1>
                    <p class="right-text big-text">10°</p>
                </div>
                <a href="scuderie/Alpine.php"><img src="media/alphine-removebg-preview.png" alt=""></a>
            </div>
            </div>
        </div>

        <div class="separator"></div>

         <footer class="footer mt-0">        
            <div class="col">
                <h3 class="medium-text">Contatti </h3>
                <p class="normal-text">e-mail: <br/> Fantaformula@gmail.com</p>
                <p class="normal-text">telefono: <br/> +39 3383477124</p>
            </div>
        </footer>
        
        <!-- Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="hamburger.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>

<!-- dobbiamo inserire i link per le paggine appena le abbiamo crete -->
