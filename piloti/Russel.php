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
            <h1 class = "big-text">GEORGE RUSSEL </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/russel_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carrire_hamilton1.avif')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Nel 2019, Russell ha fatto il suo debutto ufficiale in Formula Uno con il team Williams, 
                    anche se la monoposto si è rivelata poco competitiva. Tuttavia, ha dimostrato il suo 
                    talento, in particolare nelle qualifiche, e ha attirato l'attenzione della Mercedes.
                    <br>
                    Nel 2020, Russell ha avuto l'opportunità di guidare per la Mercedes come sostituto di 
                    Lewis Hamilton al GP di Sakhir, ottenendo subito un risultato impressionante con una 
                    prestazione di alto livello. Ha continuato a gareggiare per la Williams nel 2021, 
                    ottenendo il suo primo podio in Formula Uno.
                    <br>
                    Nel 2022, Russell è stato promosso a pilota ufficiale della Mercedes, diventando compagno 
                    di squadra di Lewis Hamilton. Ha ottenuto diversi podi e la sua prima vittoria in Formula 
                    Uno, dimostrando di essere una delle stelle emergenti dello sport.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_russel.jpg')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Arrivato nella Formula 1 da solo 6 stagioni, sta dimostrando perche la Mercedes
                    lo ha preso. Anche se ha una media di 4.3 punti per gara, chiunque ha guardato 
                    la F1 dal 2022 deve ammettere che Russell sta sempre combattendo per quei punti 
                    contro  chiunque abbia davanti. Sfortunatamente secondo molti la Mercedes non 
                    da a George le liberta sufficenti per fiorire come potrebbe, significa che dovremo
                    aspettare per il 2025 e vedere chi sostituira Hamilton.
                </p>

                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_russel.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Nato il 15 febbraio 1998 a King's Lynn, in Inghilterra, 
                    George Russell ha iniziato la sua carriera nel mondo del karting all'età di 8 anni.
                    Russell ha rapidamente dimostrato il suo talento, vincendo il campionato britannico 
                    nel 2009 e poi trasferendosi con successo negli Stati Uniti nel 2011, dove ha vinto 
                    anche là. Nel 2012, ha conquistato il titolo europeo KF3 e ha continuato a ottenere 
                    successi nelle categorie minori del motorsport.

                    Dopo aver vinto il campionato inglese di F4 nel 2014, Russell ha ricevuto l'opportunità 
                    di testare con la McLaren nel 2015 e ha continuato a competere con successo nelle serie 
                    junior come la GP3 e la Formula 2, vincendo quest'ultima nel 2018.

                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_mercedes.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                <a href="Hamilton.php"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/mercdes_pit_stop.webp');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <a href="../scuderie/Mercedes.php"><button>Read More</button></a>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>
    
    <div class="hero-telefono" style=" background-image: url('media/russel_phone.jpg');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text"> GEORGE RUSSEL</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Carriera</h2>
        <p class="description">
            Nel 2019, Russell ha fatto il suo debutto ufficiale in Formula Uno con il team Williams, 
            anche se la monoposto si è rivelata poco competitiva. Tuttavia, ha dimostrato il suo 
            talento, in particolare nelle qualifiche, e ha attirato l'attenzione della Mercedes.
            <br>
            Nel 2020, Russell ha avuto l'opportunità di guidare per la Mercedes come sostituto di 
            Lewis Hamilton al GP di Sakhir, ottenendo subito un risultato impressionante con una 
            prestazione di alto livello. Ha continuato a gareggiare per la Williams nel 2021, 
            ottenendo il suo primo podio in Formula Uno.
            <br>
            Nel 2022, Russell è stato promosso a pilota ufficiale della Mercedes, diventando compagno 
            di squadra di Lewis Hamilton. Ha ottenuto diversi podi e la sua prima vittoria in Formula 
            Uno, dimostrando di essere una delle stelle emergenti dello sport.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Arrivato nella Formula 1 da solo 6 stagioni, sta dimostrando perche la Mercedes
            lo ha preso. Anche se ha una media di 4.3 punti per gara, chiunque ha guardato 
            la F1 dal 2022 deve ammettere che Russell sta sempre combattendo per quei punti 
            contro  chiunque abbia davanti. Sfortunatamente secondo molti la Mercedes non 
            da a George le liberta sufficenti per fiorire come potrebbe, significa che dovremo
            aspettare per il 2025 e vedere chi sostituira Hamilton.
        </p>

        <h2 class="title">Biografia</h2>
        <p class="description">
            Nato il 15 febbraio 1998 a King's Lynn, in Inghilterra, 
            George Russell ha iniziato la sua carriera nel mondo del karting all'età di 8 anni.
            Russell ha rapidamente dimostrato il suo talento, vincendo il campionato britannico 
            nel 2009 e poi trasferendosi con successo negli Stati Uniti nel 2011, dove ha vinto 
            anche là. Nel 2012, ha conquistato il titolo europeo KF3 e ha continuato a ottenere 
            successi nelle categorie minori del motorsport.

            Dopo aver vinto il campionato inglese di F4 nel 2014, Russell ha ricevuto l'opportunità 
            di testare con la McLaren nel 2015 e ha continuato a competere con successo nelle serie 
            junior come la GP3 e la Formula 2, vincendo quest'ultima nel 2018.
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