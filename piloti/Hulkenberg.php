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
            <h1 class = "big-text">NICO HULKENBERG </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/hulkenberg_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_haas.jpg')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Il debutto di Hulkenberg in Formula 1 è avvenuto nel 2010 con la Williams, 
                    dopo due stagioni come collaudatore. Sebbene abbia ottenuto alcuni risultati 
                    promettenti, tra cui una pole position nel Gran Premio del Brasile, la sua 
                    permanenza in Williams è stata breve a causa della concorrenza e delle scelte di squadra.
                    <br>
                    Negli anni successivi, Hulkenberg ha corso per diverse squadre, tra cui Force India, 
                    Sauber e Renault, ottenendo alcuni risultati significativi ma spesso limitato dalla 
                    competitività della vettura. Nonostante le prestazioni impressionanti e il rispetto dei 
                    colleghi nel paddock, Hulkenberg non è mai riuscito a garantirsi un posto in un top-team 
                    come la Ferrari o la Mercedes.
                    <br>
                    Negli ultimi anni, Hulkenberg ha continuato a essere coinvolto nel mondo della Formula 1 come 
                    pilota di riserva e collaudatore per team come Racing Point (ora Aston Martin) e Mercedes,          
                    dimostrando la sua dedizione e competenza nel motorsport nonostante le sfide incontrate lungo il percorso.
                    <br>
                    La sua carriera in Formula 1 è stata contraddistinta da momenti di brillantezza e delusione, 
                    ma Hulkenberg resta uno dei piloti più rispettati e sottovalutati nel circus della Formula 1.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_hullkenberg.avif')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Le statistiche di Hulkenberg sono incredibilimente sfortunate, la miglior posizione che 
                    è mai riuscito a ottenere in 13 stagioni è 4th posizione. Ha una media di 2.5 punti 
                    per gara e una sola pole position il 07-11-2010 in Brasile. Sfortunatamente non 
                    possono essere tutti vincitori.
                </p>
                <a href=""><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_hulkenberg.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Nico Hulkenberg è nato il 19 agosto 1987 a Emmerich am Rhein, in Germania. 
                    Fin dalla giovane età di 10 anni, Hulkenberg ha dimostrato una passione per 
                    il motorsport iniziando a correre con i kart. I suoi successi precoci lo hanno 
                    portato a diventare campione tedesco junior nel 2002 e campione nazionale assoluto nel 2003.
                    <br>
                    Il passaggio alle monoposto è stato altrettanto promettente per Hulkenberg, che nel 
                    2005 ha vinto il campionato tedesco di Formula BMW, segnalandosi subito come un pilota 
                    con un grande potenziale. Il suo talento è stato ulteriormente confermato nel 2006 
                    quando ha gareggiato nella Formula 3 europea e nel campionato A1 Grand Prix, portando 
                    la sua squadra alla vittoria finale.
                    <br>
                    Nel 2007, Hulkenberg ha fatto il salto nella Formula 3 europea con il team ASM, ottenendo 
                    notevoli successi e confermandosi come uno dei migliori talenti emergenti nel mondo delle 
                    corse. Le sue vittorie e i suoi piazzamenti sul podio lo hanno portato alla vittoria del 
                    campionato nel 2008, dimostrando la sua abilità e determinazione.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_haas.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                <a href="magnussen.html"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/haas_pitstop.jpg');">
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

    <div class="hero-telefono" style=" background-image: url('media/hulkenberg_phone.jpg');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text">NICO HULKENBERG</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Biografia</h2>
        <p class="description">
            Nico Hulkenberg è nato il 19 agosto 1987 a Emmerich am Rhein, in Germania. 
            Fin dalla giovane età di 10 anni, Hulkenberg ha dimostrato una passione per 
            il motorsport iniziando a correre con i kart. I suoi successi precoci lo hanno 
            portato a diventare campione tedesco junior nel 2002 e campione nazionale assoluto nel 2003.
            <br>
            Il passaggio alle monoposto è stato altrettanto promettente per Hulkenberg, che nel 
            2005 ha vinto il campionato tedesco di Formula BMW, segnalandosi subito come un pilota 
            con un grande potenziale. Il suo talento è stato ulteriormente confermato nel 2006 
            quando ha gareggiato nella Formula 3 europea e nel campionato A1 Grand Prix, portando 
            la sua squadra alla vittoria finale.
            <br>
            Nel 2007, Hulkenberg ha fatto il salto nella Formula 3 europea con il team ASM, ottenendo 
            notevoli successi e confermandosi come uno dei migliori talenti emergenti nel mondo delle 
            corse. Le sue vittorie e i suoi piazzamenti sul podio lo hanno portato alla vittoria del 
            campionato nel 2008, dimostrando la sua abilità e determinazione.
        </p>
        <h2 class="title">Carriera</h2>
        <p class="description">
            Il debutto di Hulkenberg in Formula 1 è avvenuto nel 2010 con la Williams, 
            dopo due stagioni come collaudatore. Sebbene abbia ottenuto alcuni risultati 
            promettenti, tra cui una pole position nel Gran Premio del Brasile, la sua 
            permanenza in Williams è stata breve a causa della concorrenza e delle scelte di squadra.
            <br>
            Negli anni successivi, Hulkenberg ha corso per diverse squadre, tra cui Force India, 
            Sauber e Renault, ottenendo alcuni risultati significativi ma spesso limitato dalla 
            competitività della vettura. Nonostante le prestazioni impressionanti e il rispetto dei 
            colleghi nel paddock, Hulkenberg non è mai riuscito a garantirsi un posto in un top-team 
            come la Ferrari o la Mercedes.
            <br>
            Negli ultimi anni, Hulkenberg ha continuato a essere coinvolto nel mondo della Formula 1 come 
            pilota di riserva e collaudatore per team come Racing Point (ora Aston Martin) e Mercedes,          
            dimostrando la sua dedizione e competenza nel motorsport nonostante le sfide incontrate lungo il percorso.
            <br>
            La sua carriera in Formula 1 è stata contraddistinta da momenti di brillantezza e delusione, 
            ma Hulkenberg resta uno dei piloti più rispettati e sottovalutati nel circus della Formula 1.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Le statistiche di Hulkenberg sono incredibilimente sfortunate, la miglior posizione che 
            è mai riuscito a ottenere in 13 stagioni è 4th posizione. Ha una media di 2.5 punti 
            per gara e una sola pole position il 07-11-2010 in Brasile. Sfortunatamente non 
            possono essere tutti vincitori.
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