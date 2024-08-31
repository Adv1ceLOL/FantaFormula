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
            <h1 class = "big-text">OSCAR PIASTRI</h1>
        </div>
        <video autoplay muted loop id="video">
            <source src="media/piarri_video.mp4" type="video/mp4">

        </video>
    </div>
    <div class="mt-2 scroll">
        <main>
            <ul class="slider">
            <li class="item" style="background-image: url('media/carriera_mclaren.jpg')";>
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Carriera"</h2>
                <p class="description">
                    Oscar Piastri è stato un giovane pilota affermato nel mondo delle corse automobilistiche, 
                    seguendo le orme del suo mentore Mark Webber. Ha trascorso cinque anni gareggiando nelle 
                    categorie junior prima di diventare una presenza fissa nel paddock della Formula 1, inizialmente 
                    come pilota di riserva per Alpine fino alla stagione 2022.
                    <br>
                    Durante la sua carriera, Piastri ha vinto tre titoli junior consecutivi, dimostrando il suo talento 
                    sulle piste. Ha iniziato il suo percorso nel 2016 nella Formula 4 degli Emirati Arabi Uniti, 
                    ottenendo buoni risultati nonostante la sua breve partecipazione. Successivamente ha gareggiato 
                    nella British F4 nel 2017, dove ha lottato per il titolo e ha vinto diverse gare.
                    <br>
                    Nel 2020 ha fatto il grande salto nella FIA Formula 3, vincendo il titolo nonostante una stagione non 
                    così brillante in termini di podi. Ha poi proseguito il suo successo nel 2021 nella Formula 2, diventando 
                    campione in modo dominante con numerose vittorie e podi.
                    <br>
                    Non essendo riuscito a trovare un posto in F1 per la stagione 2022, ha accettato il ruolo di pilota di 
                    riserva per Alpine, continuando a mettere alla prova le sue abilità e ad accumulare esperienza nel paddock 
                    della massima categoria.
                </p>
                </div>
            </li>
            <li
                class="item"
                style="background-image: url('media/stats_piastri.jpg')"
            >
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Statistiche"</h2>
                <p class="description">
                    Per il pilota australiano è solo la sua seconda stagione, ma per quanto difficile
                    competere nella F1 di oggi, ha gia conquistato due podi nella sua prima stagione 
                    nel 2023. Ha per il momento una media di 4 punti per gara e si è dimostrato abile a 
                    tenere la propria posizione sotto attacco, che anche se non combatte constantemente
                    per podi, è assolutamente un buon inizio per un futuro pilota nella F1.
                </p>
              
                </div>
            </li>
            <li class="item" style="background-image: url('media/biografia_piastri.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px;">"Biografia"</h2>
                <p class="description">
                    Oscar Piastri, nato il 6 aprile 2001 a Melbourne, Australia, è stato annunciato come 
                    il 18° pilota australiano a competere nella Formula 1 quando Alpine ha dichiarato che 
                    avrebbe fatto il suo debutto nella stagione 2023. Tuttavia, poche ore dopo l'annuncio 
                    di Alpine, Piastri ha causato un tumulto sui social media annunciando che non era vero. 
                    In seguito è emerso che aveva già firmato un contratto con McLaren.
                    <br><br>
                    Il tribunale di riconoscimento dei contratti della FIA ha organizzato una udienza per 
                    pronunciarsi sulla questione, e all'inizio di settembre ha stabilito che McLaren aveva 
                    un contratto legittimo con Piastri. Alpine aveva perso il controllo su un pilota le cui 
                    performance nelle categorie junior lo avevano segnalato come una stella potenziale ovvia.
                </p>
            </li>

            <li class="item" style=" background-image: url('media/team_mclaren.jpg');">
                <div class="content">
                <h2 class="title" style="font-size: 60px; text-align: center;">"Compagno"</h2>
                <a href="Norris.php"><button>Read More</button></a>
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

    <div class="hero-telefono" style=" background-image: url('media/piastri_phone.jpg');">
        <div class="hero-telefono__content">
            <h1 class = "medium-text"> OSCAR PIASTRI</h1>
        </div>
    </div>
  
    <div class="telefono">
        <h2 class="title">Carriera</h2>
        <p class="description">
            Oscar Piastri è stato un giovane pilota affermato nel mondo delle corse automobilistiche, 
            seguendo le orme del suo mentore Mark Webber. Ha trascorso cinque anni gareggiando nelle 
            categorie junior prima di diventare una presenza fissa nel paddock della Formula 1, inizialmente 
            come pilota di riserva per Alpine fino alla stagione 2022.
            <br>
            Durante la sua carriera, Piastri ha vinto tre titoli junior consecutivi, dimostrando il suo talento 
            sulle piste. Ha iniziato il suo percorso nel 2016 nella Formula 4 degli Emirati Arabi Uniti, 
            ottenendo buoni risultati nonostante la sua breve partecipazione. Successivamente ha gareggiato 
            nella British F4 nel 2017, dove ha lottato per il titolo e ha vinto diverse gare.
            <br>
            Nel 2020 ha fatto il grande salto nella FIA Formula 3, vincendo il titolo nonostante una stagione non 
            così brillante in termini di podi. Ha poi proseguito il suo successo nel 2021 nella Formula 2, diventando 
            campione in modo dominante con numerose vittorie e podi.
            <br>
            Non essendo riuscito a trovare un posto in F1 per la stagione 2022, ha accettato il ruolo di pilota di 
            riserva per Alpine, continuando a mettere alla prova le sue abilità e ad accumulare esperienza nel paddock 
            della massima categoria.
        </p>
        <h2 class="title">Statistiche</h2>
        <p class="description">
            Per il pilota australiano è solo la sua seconda stagione, ma per quanto difficile
            competere nella F1 di oggi, ha gia conquistato due podi nella sua prima stagione 
            nel 2023. Ha per il momento una media di 4 punti per gara e si è dimostrato abile a 
            tenere la propria posizione sotto attacco, che anche se non combatte constantemente
            per podi, è assolutamente un buon inizio per un futuro pilota nella F1. 
</p>

        <h2 class="title">Biografia</h2>
        <p class="description">
            Oscar Piastri, nato il 6 aprile 2001 a Melbourne, Australia, è stato annunciato come 
            il 18° pilota australiano a competere nella Formula 1 quando Alpine ha dichiarato che 
            avrebbe fatto il suo debutto nella stagione 2023. Tuttavia, poche ore dopo l'annuncio 
            di Alpine, Piastri ha causato un tumulto sui social media annunciando che non era vero. 
            In seguito è emerso che aveva già firmato un contratto con McLaren.
            <br><br>
            Il tribunale di riconoscimento dei contratti della FIA ha organizzato una udienza per 
            pronunciarsi sulla questione, e all'inizio di settembre ha stabilito che McLaren aveva 
            un contratto legittimo con Piastri. Alpine aveva perso il controllo su un pilota le cui 
            performance nelle categorie junior lo avevano segnalato come una stella potenziale ovvia.
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