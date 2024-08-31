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
            <h1 class = "big-text">LEWIS HAMILTON </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/hamilton_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carrire_hamilton1.avif')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Il debutto di Hamilton in Formula Uno è stato eccezionale, con nove podi 
                    e diverse vittorie. Il culmine è arrivato nel 2008, quando ha vinto il suo 
                    primo campionato mondiale in una stagione piena di emozioni e colpi di scena. 
                    Dopo alcuni anni altalenanti con la McLaren, Hamilton ha fatto il grande passo 
                    nel 2013, unendosi alla Mercedes. Qui ha trovato il successo, vincendo altri 
                    sei titoli mondiali tra il 2014 e il 2020, eguagliando e superando i record di 
                    altri grandi campioni come Juan Manuel Fangio e Michael Schumacher. Tuttavia, 
                    nel 2021, ha affrontato una dura competizione con il giovane Max Verstappen della 
                    Red Bull, perdendo il titolo mondiale per la prima volta in molti anni.

                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_hamilton.jpg')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Hamilton è stato la faccia della F1 per anni, e non ostante per 
                    molti era noioso, le statistiche non mentono. Di 336 partenze, 
                    l'inglese ha ottenuto ben 198 podi, di cui 104 pole positions e 
                    103 vittorie. Se vediamo gli anni dove Hamilton ha vinto (2008, 2014, 
                    2015, 2017, 2018, 2019, 2020), possiamo notare che non ostante fare miracoli con la McLaren,
                    il talento in Formula 1 non basta, serve anche una macchina, che con il giusto pilota,
                    diventa una macchina dominante come Mercedes fino al 2020 e la RebBull ora e molte altre
                    prima.
                </p>
                <a href="Russel.html"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style="background-image: url('media/carrire_hamilton.avif');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Nato il 7 gennaio 1985 a Stevenage, Gran Bretagna, Lewis Hamilton 
                    è uno dei piloti moderni più talentuosi e vincenti della storia della 
                    Formula Uno. Cresciuto con un'innata predisposizione per la guida, 
                    ha iniziato a vincere campionati di kart fin da bambino, attirando 
                    l'attenzione della McLaren che lo ha messo sotto contratto all'età di 
                    12 anni. Da lì in poi, Hamilton ha brillato nelle serie di corse minori, 
                    guadagnandosi un posto in Formula Uno con la McLaren nel 2007.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_mercedes.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                
                <a href="Russel.html"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/mercdes_pit_stop.webp');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <button>Read More</button>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>
  
    <div class="hero-telefono" style=" background-image: url('media/hamilton_phone.jpg');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text">LEWIS HAMILTON</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Biografia</h2>
        <p class="description">
            Nato il 7 gennaio 1985 a Stevenage, Gran Bretagna, Lewis Hamilton 
            è uno dei piloti moderni più talentuosi e vincenti della storia della 
            Formula Uno. Cresciuto con un'innata predisposizione per la guida, 
            ha iniziato a vincere campionati di kart fin da bambino, attirando 
            l'attenzione della McLaren che lo ha messo sotto contratto all'età di 
            12 anni. Da lì in poi, Hamilton ha brillato nelle serie di corse minori, 
            guadagnandosi un posto in Formula Uno con la McLaren nel 2007.
        </p>
        <h2 class="title">Carriera</h2>
        <p class="description">
            Il debutto di Hamilton in Formula Uno è stato eccezionale, con nove podi 
            e diverse vittorie. Il culmine è arrivato nel 2008, quando ha vinto il suo 
            primo campionato mondiale in una stagione piena di emozioni e colpi di scena. 
            Dopo alcuni anni altalenanti con la McLaren, Hamilton ha fatto il grande passo 
            nel 2013, unendosi alla Mercedes. Qui ha trovato il successo, vincendo altri 
            sei titoli mondiali tra il 2014 e il 2020, eguagliando e superando i record di 
            altri grandi campioni come Juan Manuel Fangio e Michael Schumacher. Tuttavia, 
            nel 2021, ha affrontato una dura competizione con il giovane Max Verstappen della 
            Red Bull, perdendo il titolo mondiale per la prima volta in molti anni.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Hamilton è stato la faccia della F1 per anni, e non ostante per 
            molti era noioso, le statistiche non mentono. Di 336 partenze, 
            l'inglese ha ottenuto ben 198 podi, di cui 104 pole positions e 
            103 vittorie. Se vediamo gli anni dove Hamilton ha vinto (2008, 2014, 
            2015, 2017, 2018, 2019, 2020), possiamo notare che non ostante fare miracoli con la McLaren,
            il talento in Formula 1 non basta, serve anche una macchina, che con il giusto pilota,
            diventa una macchina dominante come Mercedes fino al 2020 e la RebBull ora e molte altre
            prima.
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
    <script src="hamburger.js"></script>

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