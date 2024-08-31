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
        <link rel="stylesheet" href="Style_Scuderie.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">  
    </head>

    
<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php" class="box-link"><img src="media/logo.png" alt=""></a>
        </div>

        <ul class="menu">
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="../pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a></li>
                <label><a href="../logout.php" id="logoutButton" class="menu-text">LOGOUT</a></label>
            <?php else: ?>
                <label><a href="../loginStart.php" id="loginButton" class="menu-text">LOGIN</a></label>
                <label><a href="../register.html" id="registerButton" class="menu-text">REGISTER</a></label>
            <?php endif; ?>
            <li><a href="../stats.php" class="menu-text">Stats</a></li>
            <li><a href="../piloti.php" class="menu-text">Piloti</a>
                <ul>
                    <li><a href="../piloti/verstappen.php">Max Verstappen</a></li> 
                    <li><a href="../piloti/perez.php">Sergio Perez</a></li> 
                    <li><a href="../piloti/Hamilton.php">Lewis Hamilton</a></li> 
                    <li><a href="../piloti/Russel.php">George Russell</a></li> 
                    <li><a href="../piloti/Leclerc.php">Charles Leclerc</a></li>
                    <li><a href="../piloti/sainz.php">Carlos Sainz</a></li> 
                    <li><a href="../piloti/Norris.php">Lando Norris</a></li>
                    <li><a href="../piloti/piastri.php">Oscar Piastri</a></li>
                    <li><a href="../piloti/Alonso.php">Fernando Alonso</a></li>
                    <li><a href="../piloti/Stroll.php">Lance Stroll</a></li>                     
                    <li><a href="../piloti/Gasly.php">Pierre Gasly</a></li>
                    <li><a href="../piloti/Ocon.php">Esteban Ocon</a></li>
                    <li><a href="../piloti/Albon.php">Alexander Albon</a></li>
                    <li><a href="../piloti/Sargeant.php">Logan Sargeant</a></li>
                    <li><a href="../piloti/Tsunoda.php">Yuki Tsunoda</a></li>
                    <li><a href="../piloti/Ricciardo.php">Daniel Ricciardo</a></li>
                    <li><a href="../piloti/bottas.php">Valterri Bottas</a></li>
                    <li><a href="../piloti/Zhou.php">Ghuanyu Zhou</a></li>
                    <li><a href="../piloti/Hulkenberg.php">Nico Hulkenberg</a></li>
                    <li><a href="../piloti/magnussen.php">Kevin Magnussen</a></li>
                </ul>
            </li>
            <li><a href="../scuderie.php" class="menu-text">Scuderie</a>
                <ul>
                    <span><a href="RedBull.php" >Red Bull</a></span>
                    <span><a href="Mercedes.php" >Mercedes</a></span>
                    <span><a href="Ferrari.php" >Ferrari</a></span>
                    <span><a href="McLaren.php" >McLaren</a></span>
                    <span><a href="AstonMartin.php" >Aston Martin</a></span>
                    <span><a href="Alpine.php" >Alpine</a></span>
                    <span><a href="Williams.php" >Williams</a></span>                       
                    <span><a href="AlphaTauri.php" >Alpha Tauri</a></span>
                    <span><a href="KickSaubern.php" >kick Saubern</a></span>
                    <span><a href="Haas.php" >Haas</a></span>
                </ul>
            </li>
            <li><a href="../fanta-formula.php" class="menu-text">Fanta-Formula</a></li> 
            
        </ul>

        <div class="r-l">
        <?php if(isset($_SESSION['username'])): ?>
                    <a href="../pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a>
                    <a href="../logout.php" id="logoutButton" class="button">LOGOUT</a>
                <?php else: ?>
                    <a href="../loginStart.php" id="loginButton" class="button">LOGIN</a>
                    <p>
                    <a href="../register.html" id="registerButton" class="button">REGISTER</a>
                <?php endif; ?>
        </div>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


    <div class="mt-3_5">
        <div class="grid-container">
            <div class="border">
                <div class="info">
                    <div class="logo">
                        <img src="media/logoar.png" alt="">
                    </div>
                    <div class="title">KickSaubern</div>
                    <div class="grid-container-2">
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/bottas.avif">
                                </div>
                                <div class="content">
                                    <h2>Bottas</h2>
                                </div>
                            </div>
                        </div>
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/zhou.avif">
                                </div>
                                <div class="content">
                                    <h2>Zhou</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image-box">
                    <img src="media/kickSauber_car.avif">
                </div>
                <div class="content">
                    <!-- <h2>Ford Mustang 1969</h2> -->
                    <p>
                        Quella del 2023 è stata l'ultima stagione della Sauber con il nome Alfa Romeo. Lo scorso anno il team è sceso al nono posto nella classifica costruttori. Quest’anno, lo sponsor principale del team, la piattaforma di live streaming Kick.com, ha acquisito i diritti di denominazione del telaio per il 2024 e per il 2025. 
                        Questa nuova denominazione rappresenta l’inizio del periodo di transizione che traghetterà la squadra verso il 2026, stagione in cui la nuova proprietà Audi uscirà allo scoperto con la denominazione ufficiale del team.
                        Il gruppo elvetico ha subito una recente riorganizzazione con Andreas Seidl, che è il nuovo ceo, e il nuovo Team Principal Alessandro Alunni Bravi, che sostituisce Fred Vasseur, passato in Ferrari. Le prestazioni del team negli 
                        ultimi anni sono progressivamente migliorate, passando dai 13 punti del 2021 ai 55 punti della scorsa stagione, quando ha conquistato il sesto posto tra i costruttori. Nel 2022 sono entrati nel team Valtteri Bottas e Zhou Guanyu, entrambi sono confermati anche per il 2023. Con la nuova C44, l’Alfa Romeo F1 Team Stake 
                        cercherà di migliorare il deludente piazzamento della passata stagione, quando ha chiuso al nono posto nella classifica costruttori.
                    </p>
                </div>
            </div>
        
        </div>  
        
        <div class="poster__telefono mt-1">
            
            <div class="poster__content__telefono">
                <img src="media/logosauber.png" alt="Image description">
                <h1 class="alf-big-text">KickSaubern </h1>
            </div>
            <div class="grid_tel">
                <div class="column">
                    <img src="media/bottas.avif" alt="">
                </div>
                <div class="column">
                    <img src="media/zhou.avif" alt="">
                </div>
            </div>
     
        </div>

        <div class="poster__telefono_2 mt-1">
           
                <img src="media/kickSauber_car.avif" alt="">
                <p class="description">
                        Quella del 2023 è stata l'ultima stagione della Sauber con il nome Alfa Romeo. Lo scorso anno il team è sceso al nono posto nella classifica costruttori. Quest’anno, lo sponsor principale del team, la piattaforma di live streaming Kick.com, ha acquisito i diritti di denominazione del telaio per il 2024 e per il 2025. 
                        Questa nuova denominazione rappresenta l’inizio del periodo di transizione che traghetterà la squadra verso il 2026, stagione in cui la nuova proprietà Audi uscirà allo scoperto con la denominazione ufficiale del team.
                        Il gruppo elvetico ha subito una recente riorganizzazione con Andreas Seidl, che è il nuovo ceo, e il nuovo Team Principal Alessandro Alunni Bravi, che sostituisce Fred Vasseur, passato in Ferrari. Le prestazioni del team negli 
                        ultimi anni sono progressivamente migliorate, passando dai 13 punti del 2021 ai 55 punti della scorsa stagione, quando ha conquistato il sesto posto tra i costruttori. Nel 2022 sono entrati nel team Valtteri Bottas e Zhou Guanyu, entrambi sono confermati anche per il 2023. Con la nuova C44, l’Alfa Romeo F1 Team Stake 
                        cercherà di migliorare il deludente piazzamento della passata stagione, quando ha chiuso al nono posto nella classifica costruttori.
                </p>
         
            
        </div>
        

    </div>
    </div>
    <footer class="footer">        
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