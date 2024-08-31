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
            <h1 class = "big-text">DANIEL RICCIARDO </h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/ricciardo_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_alphatauri.jpg')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    La carriera di Daniel Ricciardo in Formula 1 è stata caratterizzata da 
                    successi e alti e bassi. Ha ottenuto la sua prima vittoria iridata in 
                    Canada nel 2014 e ha continuato a impressionare con prestazioni di alto 
                    livello. Tuttavia, non è stata una convivenza facile con il suo compagno 
                    di squadra Sebastian Vettel, che ha portato a una rivalità interna.
                    <br>
                    Dopo aver trascorso diversi anni con la Red Bull Racing, Ricciardo ha deciso 
                    di passare al team Renault nel 2019. Anche se ha incontrato alcune difficoltà 
                    iniziali, ha ottenuto alcuni risultati positivi, inclusi podi e punti.
                    <br>
                    Nel 2020 ha firmato un contratto con il team McLaren, ma ha lottato per 
                    adattarsi alla nuova monoposto. Nonostante abbia annunciato il divorzio 
                    con il team alla fine della stagione 2022, Ricciardo è tornato alla Red Bull 
                    Racing come terzo pilota per la stagione successiva.
                    <br>    
                    Nonostante alcuni alti e bassi nella sua carriera, Daniel Ricciardo rimane 
                    uno dei piloti più talentuosi e rispettati in Formula 1, con il potenziale 
                    per ottenere ulteriori successi e risultati significativi.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_ricciardo.jpg')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Ricciardo è uno dei piloti piu sorridenti della F1, non ostante il fatto che 
                    con ottime statistiche non è mai arrivato vicino a vincere nessun Campionato.
                    Con 8 vittorie, 32 podi, 3 pole position e una media di 5.2 punti per gara 
                    il miglior risultato che è riuscito a ottenere in un campionato è 3rd. 
                </p>
                
                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_ricciard.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Daniel Ricciardo è nato il 1 luglio 1989 a Perth, in Australia. Di discendenza 
                    italo-australiana, ha mostrato fin da giovane un grande talento nel mondo delle 
                    corse automobilistiche. Ha iniziato la sua carriera nei kart e ha rapidamente 
                    attirato l'attenzione con il suo stile di guida audace e i sorpassi spettacolari.
                    <br>
                    Dopo aver fatto il suo esordio in Formula 1 con la Red Bull Racing nel 2009, 
                    Ricciardo ha dimostrato il suo potenziale durante i test per giovani piloti a 
                    Jerez, segnando tempi impressionanti. Ha poi svolto il ruolo di pilota collaudatore 
                    per Toro Rosso e Red Bull, prima di ottenere il posto di pilota titolare per la 
                    Scuderia Toro Rosso nel 2012 e 2013.
                    <br>
                    Il suo passaggio alla Red Bull Racing nel 2014 ha segnato un momento significativo 
                    nella sua carriera, durante il quale ha ottenuto diverse vittorie e podi, dimostrandosi 
                    un pilota di talento e competitivo.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_Alphatauri.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                <a href="Tsunoda.php"><button>Read More</button></a>
                </div>
            </li>
            <li class="item" style=" background-image: url('media/alphatauri_ptistop.webp');">
                <div class="content">
                <h2 class="title"style="font-size: 60px;">"Scuderia"</h2>
                <a href="../scuderie/AlphaTauri.php"><button>Read More</button></a>
                </div>
            </li>
            </ul>
            <nav class="nav">
            <ion-icon class="btn prev" name="arrow-back-outline"></ion-icon>
            <ion-icon class="btn next" name="arrow-forward-outline"></ion-icon>
            </nav>
        </main>
    </div>

    <div class="hero-telefono" style=" background-image: url('media/ricciardo_phone.jpg');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text"> DANIEL RICCIARDO</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Carriera</h2>
        <p class="description">
            La carriera di Daniel Ricciardo in Formula 1 è stata caratterizzata da 
            successi e alti e bassi. Ha ottenuto la sua prima vittoria iridata in 
            Canada nel 2014 e ha continuato a impressionare con prestazioni di alto 
            livello. Tuttavia, non è stata una convivenza facile con il suo compagno 
            di squadra Sebastian Vettel, che ha portato a una rivalità interna.
            <br>
            Dopo aver trascorso diversi anni con la Red Bull Racing, Ricciardo ha deciso 
            di passare al team Renault nel 2019. Anche se ha incontrato alcune difficoltà 
            iniziali, ha ottenuto alcuni risultati positivi, inclusi podi e punti.
            <br>
            Nel 2020 ha firmato un contratto con il team McLaren, ma ha lottato per 
            adattarsi alla nuova monoposto. Nonostante abbia annunciato il divorzio 
            con il team alla fine della stagione 2022, Ricciardo è tornato alla Red Bull 
            Racing come terzo pilota per la stagione successiva.
            <br>    
            Nonostante alcuni alti e bassi nella sua carriera, Daniel Ricciardo rimane 
            uno dei piloti più talentuosi e rispettati in Formula 1, con il potenziale 
            per ottenere ulteriori successi e risultati significativi.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Ricciardo è uno dei piloti piu sorridenti della F1, non ostante il fatto che 
            con ottime statistiche non è mai arrivato vicino a vincere nessun Campionato.
            Con 8 vittorie, 32 podi, 3 pole position e una media di 5.2 punti per gara 
            il miglior risultato che è riuscito a ottenere in un campionato è 3rd.
        </p>

        <h2 class="title">Biografia</h2>
        <p class="description">
            Daniel Ricciardo è nato il 1 luglio 1989 a Perth, in Australia. Di discendenza 
            italo-australiana, ha mostrato fin da giovane un grande talento nel mondo delle 
            corse automobilistiche. Ha iniziato la sua carriera nei kart e ha rapidamente 
            attirato l'attenzione con il suo stile di guida audace e i sorpassi spettacolari.
            <br>
            Dopo aver fatto il suo esordio in Formula 1 con la Red Bull Racing nel 2009, 
            Ricciardo ha dimostrato il suo potenziale durante i test per giovani piloti a 
            Jerez, segnando tempi impressionanti. Ha poi svolto il ruolo di pilota collaudatore 
            per Toro Rosso e Red Bull, prima di ottenere il posto di pilota titolare per la 
            Scuderia Toro Rosso nel 2012 e 2013.
            <br>
            Il suo passaggio alla Red Bull Racing nel 2014 ha segnato un momento significativo 
            nella sua carriera, durante il quale ha ottenuto diverse vittorie e podi, dimostrandosi 
            un pilota di talento e competitivo.
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