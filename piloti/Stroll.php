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
            <h1 class = "big-text">LANCE STROLL </h1>
        </div>
        <img id="foto" src="media/stroll_home.jpg" type="IMG">
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_astonmartin.jpg')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Stroll ha iniziato la sua carriera nel karting, ottenendo numerosi 
                    successi giovanili, tra cui quattro titoli nella Florida Winter Tour 
                    e vari campionati canadesi. Nel 2011, ha debuttato nel campionato italiano 
                    di kart e ha continuato a competere con successo nei campionati europei e 
                    mondiali di karting. Nel 2014, si è trasferito alla Formula 4, vincendo il 
                    titolo con la Ferrari Driver Academy. Successivamente, ha gareggiato nella 
                    Formula Toyota e nel Campionato europeo di Formula 3.<br>
                    Nel 2016, Stroll è diventato collaudatore per il team Williams di Formula 1 
                    e ha debuttato come pilota titolare nel 2017. Ha poi corso per la Racing Point 
                    (ex Force India) dal 2019, ottenendo il suo primo podio a Baku nello stesso anno.<br>
                    Nel 2020 ha continuato a ottenere successi, conquistando due terzi posti e una 
                    pole position. All'inizio del 2021, il team Racing Point è stato rinominato 
                    Aston Martin, con Stroll confermato come pilota insieme a Sebastian Vettel.
                    Dal 2023 il suo nuovo compagno è diventato Fernando Alonso.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_stroll.jpg')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Stroll non è il pilota piu amato in F1, ci sono vari motivi per 
                    questa situazione. Prima le statistiche, in 8 stagioni nella competizione
                    ha ottenuto solo 3 podi e 1 pole position, infatti a una media si soli
                    1.7 punti per gara. Che per i fan è ovviamente non abbastanza.
                    Un'altro motivo potrebbe essere che viene da una famiglia molto benestante
                    ed ha una vita molto costosa, senza mostrare la dedicazione che molti altri dimostrano.
                    L'ultimo podio fu conseguito nel 2020.
                </p>
                
                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_stroll.jpeg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Lance Stroll, nato il 29 ottobre 1998 a Montréal, è attualmente pilota 
                    ufficiale della casa britannica Aston Martin in Formula 1. Cresciuto in 
                    una famiglia agiata, con un padre imprenditore e una madre stilista, Stroll 
                    ha mostrato fin da giovane un talento nel mondo delle corse.<br>
                    Sin dai suoi 
                    primi anni di carriera, è stato considerato uno dei piloti più promettenti 
                    della sua generazione, nonostante le critiche riguardo ai vantaggi economici 
                    che ha avuto nel suo percorso.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_astonmartin.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                
                <a href="Alonso.php"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/Astonmartin_pitstop.jpg');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <a href="../scuderie/AstonMartin.php"><button>Read More</button></a>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>

    <div class="hero-telefono" style=" background-image: url('media/stroll_phone.webp');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text"> LANCE STROLL</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Carriera</h2>
        <p class="description">
            Stroll ha iniziato la sua carriera nel karting, ottenendo numerosi 
            successi giovanili, tra cui quattro titoli nella Florida Winter Tour 
            e vari campionati canadesi. Nel 2011, ha debuttato nel campionato italiano 
            di kart e ha continuato a competere con successo nei campionati europei e 
            mondiali di karting. Nel 2014, si è trasferito alla Formula 4, vincendo il 
            titolo con la Ferrari Driver Academy. Successivamente, ha gareggiato nella 
            Formula Toyota e nel Campionato europeo di Formula 3.<br>
            Nel 2016, Stroll è diventato collaudatore per il team Williams di Formula 1 
            e ha debuttato come pilota titolare nel 2017. Ha poi corso per la Racing Point 
            (ex Force India) dal 2019, ottenendo il suo primo podio a Baku nello stesso anno.<br>
            Nel 2020 ha continuato a ottenere successi, conquistando due terzi posti e una 
            pole position. All'inizio del 2021, il team Racing Point è stato rinominato 
            Aston Martin, con Stroll confermato come pilota insieme a Sebastian Vettel.
            Dal 2023 il suo nuovo compagno è diventato Fernando Alonso.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Stroll non è il pilota piu amato in F1, ci sono vari motivi per 
            questa situazione. Prima le statistiche, in 8 stagioni nella competizione
            ha ottenuto solo 3 podi e 1 pole position, infatti a una media si soli
            1.7 punti per gara. Che per i fan è ovviamente non abbastanza.
            Un'altro motivo potrebbe essere che viene da una famiglia molto benestante
            ed ha una vita molto costosa, senza mostrare la dedicazione che molti altri dimostrano.
            L'ultimo podio fu conseguito nel 2020.
        </p>

        <h2 class="title">Biografia</h2>
        <p class="description">
            Lance Stroll, nato il 29 ottobre 1998 a Montréal, è attualmente pilota 
            ufficiale della casa britannica Aston Martin in Formula 1. Cresciuto in 
            una famiglia agiata, con un padre imprenditore e una madre stilista, Stroll 
            ha mostrato fin da giovane un talento nel mondo delle corse.<br>
            Sin dai suoi 
            primi anni di carriera, è stato considerato uno dei piloti più promettenti 
            della sua generazione, nonostante le critiche riguardo ai vantaggi economici 
            che ha avuto nel suo percorso.
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