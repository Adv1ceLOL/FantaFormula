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
            <h1 class = "big-text">KEVIN MAGNUSSEN </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/magnussen_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_haas.jpg')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Il debutto di Kevin Magnussen in Formula 1 è avvenuto nel 2014 con la McLaren. 
                    La sua stagione di esordio è stata positiva, con tre podi, tra cui un secondo 
                    posto al Gran Premio del Canada.
                    <br>
                    Nel 2016, Magnussen ha fatto il suo passaggio alla Renault, ma la stagione si è 
                    rivelata deludente a causa della scarsa competitività della squadra francese. 
                    Dopo essere stato sostituito a metà stagione, Magnussen è tornato in Formula 1 
                    nel 2017 con la Haas.
                    <br>
                    Negli anni successivi, Magnussen ha continuato a gareggiare con la Haas, ma i 
                    risultati non sono stati all'altezza delle aspettative.
                    <br>
                    Oltre alla sua esperienza in Formula 1, nel 2020 Magnussen ha corso nel campionato 
                    WeatherTech SportsCar Championship con la Chip Ganassi Racing, dimostrando ancora 
                    una volta il suo talento e la sua versatilità come pilota.
                    <br>
                    Il futuro di Kevin Magnussen nella Formula 1 sembra promettente, con un contratto 
                    con la Haas fino al 2024 e l'obiettivo di vincere un Gran Premio. Magnussen è noto 
                    per il suo stile di guida aggressivo e diretto, che gli ha permesso di ottenere 
                    risultati significativi nel corso della sua carriera.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_magnussen.webp')"
            >
                <div class="content">
                <h2 class="title" style="font-size:60px;">"Statistiche"</h2>
                <p class="description">
                    Come il suo compagno di squadra le sue statistiche sono sfortunate. Con ben 
                    10 stagioni, Magnussen ha ricavato un solo podio e 1.1 punti per gara. Anche 
                    Magnussen come il compagno, non ha avuto molte chance per competere per podi 
                    e trofei. 
                </p>
                
                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_magnussen.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Kevin Magnussen è nato il 5 ottobre 1992 a Roskilde, in Danimarca, 
                    da Jan Magnussen, ex pilota di Formula 1. Fin da bambino, Kevin è 
                    stato immerso nell'ambiente delle corse automobilistiche grazie alla 
                    passione e all'influenza del padre. Jan Magnussen ha rappresentato un 
                    punto di riferimento fondamentale per Kevin, che ha cercato di seguire 
                    le sue orme nel mondo del motorsport.
                    <br>
                    La carriera di Kevin Magnussen nelle competizioni su monoposto ha avuto 
                    inizio nel 2010, quando ha iniziato a gareggiare nella Formula Renault 2.0. 
                    Successivamente, si è trasferito nella Formula 3 britannica nel 2011, 
                    ottenendo un secondo posto in classifica finale. Nel 2012, ha conquistato 
                    il titolo nella Formula V8 3.5, dimostrando il suo talento e la sua determinazione.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_haas.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                <a href="Hulkenberg.php"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/haas_pitstop.jpg');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <a href="../scuderie/Haas.php"><button>Read More</button></a>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>

    <div class="hero-telefono" style=" background-image: url('media/magnussen_phone.jpg');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text"> KEVIN MAGNUSSEN</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Carriera</h2>
        <p class="description">
            Il debutto di Kevin Magnussen in Formula 1 è avvenuto nel 2014 con la McLaren. 
            La sua stagione di esordio è stata positiva, con tre podi, tra cui un secondo 
            posto al Gran Premio del Canada.
            <br>
            Nel 2016, Magnussen ha fatto il suo passaggio alla Renault, ma la stagione si è 
            rivelata deludente a causa della scarsa competitività della squadra francese. 
            Dopo essere stato sostituito a metà stagione, Magnussen è tornato in Formula 1 
            nel 2017 con la Haas.
            <br>
            Negli anni successivi, Magnussen ha continuato a gareggiare con la Haas, ma i 
            risultati non sono stati all'altezza delle aspettative.
            <br>
            Oltre alla sua esperienza in Formula 1, nel 2020 Magnussen ha corso nel campionato 
            WeatherTech SportsCar Championship con la Chip Ganassi Racing, dimostrando ancora 
            una volta il suo talento e la sua versatilità come pilota.
            <br>
            Il futuro di Kevin Magnussen nella Formula 1 sembra promettente, con un contratto 
            con la Haas fino al 2024 e l'obiettivo di vincere un Gran Premio. Magnussen è noto 
            per il suo stile di guida aggressivo e diretto, che gli ha permesso di ottenere 
            risultati significativi nel corso della sua carriera.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Come il suo compagno di squadra le sue statistiche sono sfortunate. Con ben 
            10 stagioni, Magnussen ha ricavato un solo podio e 1.1 punti per gara. Anche 
            Magnussen come il compagno, non ha avuto molte chance per competere per podi 
            e trofei.
        </p>

        <h2 class="title">Biografia</h2>
        <p class="description">
            Kevin Magnussen è nato il 5 ottobre 1992 a Roskilde, in Danimarca, 
            da Jan Magnussen, ex pilota di Formula 1. Fin da bambino, Kevin è 
            stato immerso nell'ambiente delle corse automobilistiche grazie alla 
            passione e all'influenza del padre. Jan Magnussen ha rappresentato un 
            punto di riferimento fondamentale per Kevin, che ha cercato di seguire 
            le sue orme nel mondo del motorsport.
            <br>
            La carriera di Kevin Magnussen nelle competizioni su monoposto ha avuto 
            inizio nel 2010, quando ha iniziato a gareggiare nella Formula Renault 2.0. 
            Successivamente, si è trasferito nella Formula 3 britannica nel 2011, 
            ottenendo un secondo posto in classifica finale. Nel 2012, ha conquistato 
            il titolo nella Formula V8 3.5, dimostrando il suo talento e la sua determinazione.
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