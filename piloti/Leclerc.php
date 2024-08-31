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
                <label><a href="../loginStart.html" id="loginButton" class="menu-text">LOGIN</a></label>
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
            <h1 class = "big-text">CHARLES LECLERC </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/leclerc_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_leclerc.avif')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                Ha iniziato la sua carriera nei kart nel 2005 e vinse il campionato PACA francese nello stesso anno, nel 2006 e nel 2008.
                Nel 2014, Leclerc passa alle monoposto, correndo nella Formula Renault 2.0 Alps per la squadra britannica Fortec Motorsports. 
                Nel 2015 partecipa alla Formula 3 europea alla guida di una vettura della squadra olandese Van Amersfoort. 
                Nel marzo 2016, Ferrari annuncia che Leclerc sarebbe stato uno dei due nuovi piloti inseriti nel Ferrari Driver Academy
                Passando alla F1 nel 2018, Leclerc ha mostrato lampi di velocità balistica il sabato e brillantezza in gara 
                la domenica, trascinando la sua Sauber oltre i suoi limiti - e guadagnandosi un sedile di guida che non si può 
                comprare alla Ferrari per il 2019, entrando nelle scarpe dell'ultimo campione del mondo della Scuderia, Kimi Raikkonen.

                Una vittoria F1 al debutto a Spa è stata seguita da un'altra una settimana dopo sul sacro suolo di Monza per la Ferrari.
                Le stagioni 2020 e '21 hanno portato pochi frutti per la Ferrari, ma Leclerc ha mantenuto la sua determinazione 
                per emergere come vero contendente al titolo nel 2022. 

                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_leclerc.webp')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Il belloccio di Monaco non è in F1 da molto, sole 7 stagioni
                    giocate, e che stagioni. Avendo 8 punti per gara come media, 
                    Charles ha ottenuto 32 podi, ma sfortunatamente 23 pole position
                    con sole 5 vittorie. Non ostante non riuscire a prendere quel 1 posto 
                    a causa della dominazione di Verstappen, Leclerc ha dimostrato che quando
                    la macchina non lo abbandona, è la gemma e il futuro della Ferrari.

                </p>
                
                </div>
            </li>
            <li class="item" style="background-image: url('media/BIOGRAFIA_LECLERC.avif');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Charles Leclerc (nato il 16 ottobre 1997) è 
                    un pilota monegasco, attualmente alla guida della Ferrari. <br>
                    Membro della Ferrari Driver Academy, 
                    ha vinto il campionato GP3 Series nel 2016 e il campionato FIA Formula 2 nel 2017.
                    Diventato il nuovo eroe per la Ferrari dopo superare in punti la leggenda di Sebastian Vettel (primo pilota della Ferrari)
                    sotto la stessa scuderia. Giovane e affamato per vittorie era esattamente quello che cercava la Ferrari, trasformando 
                    Leclerc nel pilota preferito dei fan Ferrari.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_ferrari.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                
                <a href="sainz.html"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/ferrari_pit_stop.png');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <a href="../scuderie/Ferrari.php"><button>Read More</button></a>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>
  
    <div class="hero-telefono" style=" background-image: url('media/leclerc_phone.webp');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text">CHARLES LECLERC</h1>
        </div>
    </div>
  
    <div class="telefono">

        <h2 class="title">Biografia</h2>
        <p class="description">
            Charles Leclerc (nato il 16 ottobre 1997) è 
            un pilota monegasco, attualmente alla guida della Ferrari. <br>
            Membro della Ferrari Driver Academy, 
            ha vinto il campionato GP3 Series nel 2016 e il campionato FIA Formula 2 nel 2017.
            Diventato il nuovo eroe per la Ferrari dopo superare in punti la leggenda di Sebastian Vettel (primo pilota della Ferrari)
            sotto la stessa scuderia. Giovane e affamato per vittorie era esattamente quello che cercava la Ferrari, trasformando 
            Leclerc nel pilota preferito dei fan Ferrari.
        </p>
        <h2 class="title">Carriera</h2>
        <p class="description">
            Ha iniziato la sua carriera nei kart nel 2005 e vinse il campionato PACA francese nello stesso anno, nel 2006 e nel 2008.
            Nel 2014, Leclerc passa alle monoposto, correndo nella Formula Renault 2.0 Alps per la squadra britannica Fortec Motorsports. 
            Nel 2015 partecipa alla Formula 3 europea alla guida di una vettura della squadra olandese Van Amersfoort. 
            Nel marzo 2016, Ferrari annuncia che Leclerc sarebbe stato uno dei due nuovi piloti inseriti nel Ferrari Driver Academy
            Passando alla F1 nel 2018, Leclerc ha mostrato lampi di velocità balistica il sabato e brillantezza in gara 
            la domenica, trascinando la sua Sauber oltre i suoi limiti - e guadagnandosi un sedile di guida che non si può 
            comprare alla Ferrari per il 2019, entrando nelle scarpe dell'ultimo campione del mondo della Scuderia, Kimi Raikkonen.

            Una vittoria F1 al debutto a Spa è stata seguita da un'altra una settimana dopo sul sacro suolo di Monza per la Ferrari.
            Le stagioni 2020 e '21 hanno portato pochi frutti per la Ferrari, ma Leclerc ha mantenuto la sua determinazione 
            per emergere come vero contendente al titolo nel 2022. 
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Il belloccio di Monaco non è in F1 da molto, sole 7 stagioni
            giocate, e che stagioni. Avendo 8 punti per gara come media, 
            Charles ha ottenuto 32 podi, ma sfortunatamente 23 pole position
            con sole 5 vittorie. Non ostante non riuscire a prendere quel 1 posto 
            a causa della dominazione di Verstappen, Leclerc ha dimostrato che quando
            la macchina non lo abbandona, è la gemma e il futuro della Ferrari.
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