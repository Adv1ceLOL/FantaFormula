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
        <link rel="stylesheet" href="Style_Pilota.css">
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
            <li><a href="../API/statisticheApi.php" class="menu-text">Stats</a></li>
            <li><a href="../piloti.php" class="menu-text">Piloti</a>
                <ul>
                    <li><a href="verstappen.php">Max Verstappen</a></li> 
                    <li><a href="perez.php">Sergio Perez</a></li> 
                    <li><a href="Hamilton.php">Lewis Hamilton</a></li> 
                    <li><a href="Russel.php">George Russell</a></li> 
                    <li><a href="Leclerc.php">Charles Leclerc</a></li>
                    <li><a href="sainz.php">Carlos Sainz</a></li> 
                    <li><a href="Norris.php">Lando Norris</a></li>
                    <li><a href="piastri.php">Oscar Piastri</a></li>
                    <li><a href="Alonso.php">Fernando Alonso</a></li>
                    <li><a href="Stroll.php">Lance Stroll</a></li>                     
                    <li><a href="Gasly.php">Pierre Gasly</a></li>
                    <li><a href="Ocon.php">Esteban Ocon</a></li>
                    <li><a href="Albon.php">Alexander Albon</a></li>
                    <li><a href="Sargeant.php">Logan Sargeant</a></li>
                    <li><a href="Tsunoda.php">Yuki Tsunoda</a></li>
                    <li><a href="Ricciardo.php">Daniel Ricciardo</a></li>
                    <li><a href="bottas.php">Valterri Bottas</a></li>
                    <li><a href="Zhou.php">Ghuanyu Zhou</a></li>
                    <li><a href="Hulkenberg.php">Nico Hulkenberg</a></li>
                    <li><a href="magnussen.php">Kevin Magnussen</a></li>
                </ul>
            </li>
            <li><a href="../scuderie.php" class="menu-text">Scuderie</a>
                <ul>
                    <span><a href="../scuderie/RedBull.php" >Red Bull</a></span>
                    <span><a href="../scuderie/Mercedes.php" >Mercedes</a></span>
                    <span><a href="../scuderie/Ferrari.php" >Ferrari</a></span>
                    <span><a href="../scuderie/McLaren.php" >McLaren</a></span>
                    <span><a href="../scuderie/AstonMartin.php" >Aston Martin</a></span>
                    <span><a href="../scuderie/Alpine.php" >Alpine</a></span>
                    <span><a href="../scuderie/Williams.php" >Williams</a></span>                       
                    <span><a href="../scuderie/AlphaTauri.php" >Alpha Tauri</a></span>
                    <span><a href="../scuderie/KickSaubern.php" >Kick Saubern</a></span>
                    <span><a href="../scuderie/Haas.php" >Haas</a></span>
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
    <div class="hero">
        <div class="hero__content ">
            <h1 class = "big-text">LANDO NORRIS </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/norris_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_mclaren.jpg')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Dopo l'esperienza sui kart, Norris esordisce nelle monoposto, gareggiando nel 
                    campionato Ginetta Junior Championship e nella MSA Formula Series. Nel 2016 
                    vince i campionati di Eurocup Formula Renault 2.0 e Formula Renault 2.0 NEC. 
                    Nel 2017, trionfa nel campionato di Formula 3 Europea e debutta in Formula 2. 
                    Nel 2018, conquista la sua prima vittoria in F2 e contribuisce alla vittoria 
                    del titolo a squadre con il team Carlin.
                    <br><br>
                    Nel 2018, diventa terzo pilota ufficiale del 
                    team e debutta in gara nel Gran Premio del Belgio. Nel 2019, inizia la sua prima 
                    stagione completa in F1 con la McLaren, ottenendo 11 piazzamenti a punti e un 
                    miglior piazzamento di sesto. Nel 2020, continua con la McLaren e ottiene il suo 
                    primo podio in Austria. Nel 2021, si conferma come uno dei talenti emergenti della 
                    Formula 1, ottenendo diversi podi e terminando sesto in classifica generale. La sua 
                    carriera prosegue nel 2022, confermandosi con la McLaren e continuando a competere 
                    tra i primi 10, ottenendo un podio a Imola e terminando la stagione al settimo posto in classifica piloti.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_norris.jpg')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Norris è un pilota pieno di talento con una macchina buona, ma non abbastanza per vincere.
                    Non ostante ciò, il suo talento lo ha portato a 14 podi (con il piu recente a Melbourne quest'anno)
                    e una pole position. Infatti Lando ha una media di 5.5 punti per gara, uno in piu a Russell.
                    Se continua in questa direzione, Lando Norris sarà una leggenda della F1.
                </p>
                
                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_norris.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Lando Norris nasce a Bristol il 13 novembre 1999, da Adam, un uomo facoltoso, 
                    che gli trasmise la passione per l’automobilismo portandolo al kartodromo nel 
                    giorno di una gara del campionato nazionale. La sua carriera sui kart inizia 
                    nel 2008. Nel 2013, a soli 15 anni, vince il titolo mondiale nel World Karting 
                    Championship, diventando il campione del mondo più giovane di sempre.<br>
                    Nel 2017, viene annunciato il suo ingresso nel programma per giovani piloti del 
                    team McLaren di Formula 1.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_mclaren.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>  
                <a href="piastri.php"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/mclare_pitstop.webp');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <a href="../scuderie/McLaren.php"><button>Read More</button></a>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>
  
    <div class="hero-telefono" style=" background-image: url('media/norris_phone.webp');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text"> LANDO NORRIS</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Carriera</h2>
        <p class="description">
            Dopo l'esperienza sui kart, Norris esordisce nelle monoposto, gareggiando nel 
            campionato Ginetta Junior Championship e nella MSA Formula Series. Nel 2016 
            vince i campionati di Eurocup Formula Renault 2.0 e Formula Renault 2.0 NEC. 
            Nel 2017, trionfa nel campionato di Formula 3 Europea e debutta in Formula 2. 
            Nel 2018, conquista la sua prima vittoria in F2 e contribuisce alla vittoria 
            del titolo a squadre con il team Carlin.
            <br><br>
            Nel 2018, diventa terzo pilota ufficiale del 
            team e debutta in gara nel Gran Premio del Belgio. Nel 2019, inizia la sua prima 
            stagione completa in F1 con la McLaren, ottenendo 11 piazzamenti a punti e un 
            miglior piazzamento di sesto. Nel 2020, continua con la McLaren e ottiene il suo 
            primo podio in Austria. Nel 2021, si conferma come uno dei talenti emergenti della 
            Formula 1, ottenendo diversi podi e terminando sesto in classifica generale. La sua 
            carriera prosegue nel 2022, confermandosi con la McLaren e continuando a competere 
            tra i primi 10, ottenendo un podio a Imola e terminando la stagione al settimo posto in classifica piloti.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Norris è un pilota pieno di talento con una macchina buona, ma non abbastanza per vincere.
            Non ostante ciò, il suo talento lo ha portato a 14 podi (con il piu recente a Melbourne quest'anno)
            e una pole position. Infatti Lando ha una media di 5.5 punti per gara, uno in piu a Russell.
            Se continua in questa direzione, Lando Norris sarà una leggenda della F1.
        </p>

        <h2 class="title">Biografia</h2>
        <p class="description">
            Lando Norris nasce a Bristol il 13 novembre 1999, da Adam, un uomo facoltoso, 
            che gli trasmise la passione per l’automobilismo portandolo al kartodromo nel 
            giorno di una gara del campionato nazionale. La sua carriera sui kart inizia 
            nel 2008. Nel 2013, a soli 15 anni, vince il titolo mondiale nel World Karting 
            Championship, diventando il campione del mondo più giovane di sempre.<br>
            Nel 2017, viene annunciato il suo ingresso nel programma per giovani piloti del 
            team McLaren di Formula 1.
        </p>
    </div>

    <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="verstappen.js"></script>

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