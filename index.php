<?php
session_start(); // Ensure session is started

$hostname = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'statistiche';

// Establish the database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM utenti WHERE username = '$username'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username']; // Set the session variable
        $_SESSION['profile_image'] = $row['profile_image']; // Set the session variable
        $_SESSION['email'] = $row['email']; // Set the session variable
        $_SESSION['bestTime'] = $row['record_reaction'];
    }
}

if (!isset($_SESSION['meeting_key'])) {
    $sql = "SELECT * FROM sessionidata ORDER BY meeting_key DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['meeting_key'] = $row['meeting_key'];
        echo "<script type='text/javascript'>alert('Meeting key set: {$_SESSION['meeting_key']}');</script>";
    }
}


//! Ora controlliamo che il database è aggiornato allultima gara


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// First, select the row with the earliest date
$sql = "SELECT * FROM nextGare ORDER BY Data LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row1 = $result->fetch_assoc();

    $meetingMin = $row1['meeting_key'];
    $meetingMin --;
}

// First, select the row with the earliest date
$sql = "SELECT * FROM nextGare ORDER BY Data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $currentDate = date('Y-m-d');
    $meetingMax = null;

    while ($row1 = $result->fetch_assoc()) {
        $luogo = $row1['Luogo'];
        $meeting = $row1['meeting_key'];
        $data = $row1['Data'];

        // Controlla che la data sia successiva alla data attuale
        if (strtotime($data) > strtotime($currentDate)) {
            $meetingMax = $meeting - 1;
            //echo "Meeting MIN key: $meetingMin - Meeting MAX key: $meetingMax";
            break; // Esci dal ciclo quando trovi una data valida
        }
    }

    if ($meetingMax !== null) {
        //echo "Trovata una data valida: $data";
        // Puoi aggiungere qui il codice per gestire il meetingMax trovato
    } else {
        echo "Nessuna data futura trovata.";
    }
} else {
    echo "Nessuna riga trovata.";
}

if($meetingMax == $meetingMin){
    //echo "max e min uguali, niente da aggiornare\n";
}
else{
    include 'API_updater/clientUpdater.php';
}   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FormulaForFun</title>
        <link rel="stylesheet" href="style_index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="header">
            <div class="logo">
                <img src="media/logo.png" alt="">
            </div>

            <ul class="menu">

                <li><a href="API/statisticheApi.php" class="menu-text">Stats</a></li>
                <li><a href="piloti.php" class="menu-text">Piloti</a>
                    <ul>
                        <li><a href="piloti/verstappen.php">Max Verstappen</a></li> 
                        <li><a href="piloti/perez.php">Sergio Perez</a></li> 
                        <li><a href="piloti/Hamilton.php">Lewis Hamilton</a></li> 
                        <li><a href="piloti/Russel.php">George Russell</a></li> 
                        <li><a href="piloti/Leclerc.php">Charles Leclerc</a></li>
                        <li><a href="piloti/sainz.php">Carlos Sainz</a></li> 
                        <li><a href="piloti/Norris.php">Lando Norris</a></li>
                        <li><a href="piloti/piastri.php">Oscar Piastri</a></li>
                        <li><a href="piloti/Alonso.php">Fernando Alonso</a></li>
                        <li><a href="piloti/Stroll.php">Lance Stroll</a></li>                     
                        <li><a href="piloti/Gasly.php">Pierre Gasly</a></li>
                        <li><a href="piloti/Ocon.php">Esteban Ocon</a></li>
                        <li><a href="piloti/Albon.php">Alexander Albon</a></li>
                        <li><a href="piloti/Sargeant.php">Logan Sargeant</a></li>
                        <li><a href="piloti/Tsunoda.php">Yuki Tsunoda</a></li>
                        <li><a href="piloti/Ricciardo.php">Daniel Ricciardo</a></li>
                        <li><a href="piloti/bottas.php">Valterri Bottas</a></li>
                        <li><a href="piloti/Zhou.php">Ghuanyu Zhou</a></li>
                        <li><a href="piloti/Hulkenberg.php">Nico Hulkenberg</a></li>
                        <li><a href="piloti/magnussen.php">Kevin Magnussen</a></li>
                    </ul>
                </li>
                <li><a href="scuderie.php" class="menu-text">Scuderie</a>
                    <ul>
                        <span><a href="scuderie/RedBull.php" >Red Bull</a></span>
                        <span><a href="scuderie/Mercedes.php" >Mercedes</a></span>
                        <span><a href="scuderie/Ferrari.php" >Ferrari</a></span>
                        <span><a href="scuderie/McLaren.php" >McLaren</a></span>
                        <span><a href="scuderie/AstonMartin.php" >Aston Martin</a></span>
                        <span><a href="scuderie/Alpine.php" >Alpine</a></span>
                        <span><a href="scuderie/Williams.php" >Williams</a></span>                       
                        <span><a href="scuderie/AlphaTauri.php" >Alpha Tauri</a></span>
                        <span><a href="scuderie/KickSaubern.php" >kick Saubern</a></span>
                        <span><a href="scuderie/Haas.php" >Haas</a></span>
                    </ul>
                </li>
                <li><a href="fanta-formula.php" class="menu-text">Fanta-Formula</a></li>
            </ul>

            <div class="r-l">
                <?php if(isset($_SESSION['username'])): ?>
                    <a href="pagina_personale.php" id="userImage"><img src="<?php echo $row['profile_image']; ?>" alt="image"></a>
                    <a href="logout.php" id="logoutButton" class="button">LOGOUT</a>
                <?php else: ?>
                    <a href="loginStart.php" id="loginButton" class="button">LOGIN</a>
                    <p>
                    <a href="register.html" id="registerButton" class="button">REGISTER</a>
                <?php endif; ?>
            </div>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class= "container">

            <div class="hero">
                <div class="content">
                    <div class ="content__container">
                        <h1 class = "content__container__text">Formula 1 For </h1>
                        <ul class="content__container__list">
                            <li class="content__container__list__item">Fun</li>
                            <li class="content__container__list__item">Everybody</li>
                            <li class="content__container__list__item">Friends</li>
                            <li class="content__container__list__item">You &lt;3</li>
                        </ul>
                    </div>
                </div>
                <video autoplay muted loop id="video">
                    <source src="media/home_video.mp4" type="video/mp4">
                </video>
            </div>

            <div class="hero-telefono">
                <div class="hero-telefono__content">
                    <h1 class = "big-text"> Formula 1 For Fun </h1>
                </div>
            </div>
            
            <div  class="intro_content">
                <img src="media/logoBianco.png" style="width:25%" alt="">
                <h1 class="big-text" style="color:#FFFFFF; margin-left:30px">I nostri servizi</h1>
            </div>


            <div class="poster">
                <div class="poster__content">
                    <h1>Statistiche piloti</h1>
                    <p>In questa pagina potra vedere tutto il necessario per fare la giusta decisione per la propria squadra per la prossima gara!
                        <br> Ricorda che se i tuoi piloti entrano nella top-10 faranno punti che poi verranno moltiplicati dalla scuderia da te scelta,
                        e allo largo della stagione quei punti possono fare la differenza tra battere i tuoi amici o rimanere indietro.
                    </p>
                    <a href="API/statisticheApi.php" class="button">Leggi di più</a>
                </div> 

                <div class="poster__img">
                    <img src="media/gridIndex.jpeg">
                </div>
            </div>
            <div class="poster2 mt-3">
                <div class="poster2__img">
                    <img src="media/scuderie.jpg" alt="">
                </div>
                <div class="poster2__content">
                    <h1>Scuderie</h1>
                    <p>Qui potrai sapere tutto quello che ti serve sulle scuderie che supportano i tuoi piloti!
                        <br>Ricorda che una scuderia non da punti, ma moltiplica i punti dei tuoi piloti, quindi
                        è la colonna portante della tua squadra.
                    </p>
                    <a href="scuderie.php" class="button">Leggi di più</a>
                </div>
                
            </div>

            <div class="poster__telefono mt-3">
                
                <div class="poster__telefono__content">

                    <h1>Scuderie</h1>
                    <p>Qui potrai sapere tutto quello che ti serve sulle scuderie che supportano i tuoi piloti!
                        <br>Ricorda che una scuderia non da punti, ma moltiplica i punti dei tuoi piloti, quindi
                        è la colonna portante della tua squadra.
                    </p>
                    <a href="scuderie.php" class="button">Leggi di più</a>
                </div>

                <div class="poster__telefono__img">
                    <img src="media/scuderie.jpg" alt="">
                </div>
                
            </div>
            
        
            <div class="grid mt-2">
                <div class="col">

                    <h3 class="big-text" style="color:#FFFFFF"><b> Piloti </b> </h3>

                </div>
            </div>

            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/versatppen.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Max Verstappen</h1>
                        <a href="piloti/verstappen.php" class="button1">Leggi di più</a>
                    </div>
                </div>  
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/perez.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Sergio Perez</h1>
                        <a href="piloti/perez.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/hamilton.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Lewis Hemilton</h1>
                        <a href="piloti/Hamilton.php" class="button1">Leggi di più</a>
                    </div>
                </div>

                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/russel.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">George Russell</h1>
                        <a href="piloti/Russel.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/leclerc.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Charles Leclerc</h1>
                        <a href="piloti/Leclerc.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/sainz.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Carlos Sainz</h1>
                        <a href="piloti/sainz.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/Norris.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Lando Norris</h1>
                        <a href="piloti/Norris.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/Piastri.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Oscar Piastri</h1>
                        <a href="piloti/piastri.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/alonso.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Fernando Alonso</h1>
                        <a href="piloti/Alonso.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/stroll.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text"> Lance Stroll</h1>
                        <a href="piloti/Stroll.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/gasly.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Pierre Gasly</h1>
                        <a href="piloti/Gasly.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/ocon.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Esteban Ocon</h1>
                        <a href="piloti/Ocon.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/albon.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Alexander Albon</h1>
                        <a href="piloti/Albon.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/sargent.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Logan Sargeant</h1>
                        <a href="piloti/Sargeant.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/tunoda.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Yuki Tsunoda</h1>
                        <a href="piloti/Tsunoda.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/riccardo.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Daniel Ricciardo</h1>
                        <a href="piloti/Ricciardo.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/bottas.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Valterri Bottas</h1>
                        <a href="piloti/bottas.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/zhou.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Ghuanyu Zhou</h1>
                        <a href="piloti/Zhou.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/hulkenberg.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Nico Hulkenberg</h1>
                        <a href="piloti/Hulkenberg.php" class="button1">Leggi di più</a>
                    </div>
                </div>
                
                <div class="carousel-cell"> 
                    <div class="cell__immagine">
                        <img src="media/magnussen.avif" alt="">
                    </div>
                    <div class="cell__titolo">
                        <h1 class="alf-big-text">Kevin Magnussen</h1>
                        <a href="piloti/magnussen.php" class="button1">Leggi di più</a>
                    </div>
                </div>   
            </div>
            <div class="bg-cover mt-3">
                <div class="bg-cover__title">
                    <h1 class="big-text">Fanta-Formula</h1>        
                    <a href="fanta-formula.php"class="button1">Leggi di più</a>
                </div>
            </div>

            <div class="grid mt-3">
                <div class="col">
                    <h3 class="big-text" style="color:#FFFFFF"><b> Gioco Interattivo: </b> </h3>
                </div>
            </div>
        

            <div class="bg-cover_2 mt-2">

                <div class="bg-cover_2__title">
                    <h1 class="big-text">Reaction Test</h1>        
                    <a href="reaction_time.php"class="button1">PROVA ORA!</a>
                </div>
            </div>

            <div class="grid mt-3">
                <div class="col">
                    <h3 class="big-text" style="color:#FFFFFF"><b> Extra Content: </b> </h3>
                </div>
            </div>

            <div class="poster mt-0">
                <div class="poster__content" ">
                    <h1>Leclerc vs Verstappen</h1>
                    <p>Una rivalita che va avanti dagli anni del karting, dove i due si odiavano secondo Leclerc. <br>
                    Dalle polemiche dopo il GP d’Austria del 2019 alle sfide della prima parte del 2022, Charles e Max hanno avuto modo di sfidarsi più e più volte dimostrando sempre molta lealtà.
                    </p>
                </div> 

                <div class="poster__img">
                    <video controls>
                        <source src="media/LeclercVSVerstappen.mp4" type="video/mp4">
                    </video>                
                </div>
            </div>

            <div class="poster mt-0">
                <div class="poster__content" ">
                    <h1>Leclerc e suo padre</h1>
                    <p>Leclerc perse il padre il 20 giugno 2017, stroncato a 54 anni da una lunga malattia. 
                       Appena quattro giorni dopo, il diciannovenne monegasco dominava la gara di Formula 2 con una prestazione maiuscola. 
                       Charles rivela di non aver mai scartato l'idea di correre in quel fine settimana: “Mio padre era il mio fan numero uno”.</p>
                </div> 

                <div class="poster__img">
                    <video height="700" style="margin-top: 40px;" controls>
                        <source src="media/LeclerPadreMonaco.mp4" type="video/mp4">
                    </video>
                    </video>                
                </div>
            </div>

            <div class="poster mt-2">
                <div class="poster__content" >
                    <h1>Schumacher incotra un piccolo Max Verstappen</h1>
                    <p>Una storica foto del 7 volte campione del mondo con un babino che oggi conosciamo come Max Verstappen, 3 volte campione del mondo
                        e pronto ad aumentare il suo record.
                    </p>
                </div> 

                <div class="poster__img" >
                    <img src="media/BabyMaxSchumacher.png">                
                </div>
            </div>
            <div class="poster mt-2">
                <div class="poster__content">
                    <h1>Monaco</h1>
                    <p> Il circuito di Monaco è il meno sicuro su cui correre, 
                        ma per i piloti ne vale la pena rischiare una volta l’anno. Una vittoria qui fa storia. «È un 
                        circuito molto sfidante dal punto di vista personale perché mette in mostra le qualità 
                        di coraggio e guida del pilota. A Monte Carlo ogni minimo errore si paga, perché i muri 
                        sono molto vicini e la pista è estremamente tecnica. Credo piaccia molto ai piloti, 
                        perché si confrontano con i propri limiti» disse Schumacher.
                    </p>
                </div> 

                <div class="poster__img" >

                    <video autoplay muted loop height="700">
                        <source src="media/celebrationMonaco.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <div class="poster mt-2">
                <div class="poster__content" >

                    <h1>Mad Max</h1>
                    <p> 
                        Prima che Max Verstappen dominasse la Formula 1, Max era famoso per attacchi pericolosi 
                        e difese che mettevano in pericolo le macchine e piloti avversari. Trovandosi spesso 
                        in mezzo a numerose polemiche con altri membri dello sport, che siano piloti o direttori esecutivi
                        di altre squadre. Dal 2022 questa narrativa non si è realmente ripetuta, ma questo può dipendere 
                        dal fatto che Verstappen non viene realmente sfidato come prima.
                    </p>
                </div> 

                <div class="poster__img" >

                    <video height="700" controls>
                        <source src="media/madMax.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="clearfix"></div>
        
            <footer class="footer mt-0">        
                <div class="col">
                    <h3 class="medium-text">Contatti </h3>
                    <p class="normal-text">e-mail: <br/> Fantaformula@gmail.com</p>
                    <p class="normal-text">telefono: <br/> +39 3383477124</p>
                </div>
            </footer>
            
        </div> 
        <!-- Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="hamburger.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>



