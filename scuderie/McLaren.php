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
        <link rel="stylesheet" href="Style_Scuderie.css">
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
            <li><a href="../stats.php" class="menu-text">Stats</a></li>
            <li><a href="../piloti.php" class="menu-text">Piloti</a>
                <ul>
                    <li><a href="../piloti/verstappen.php">Max Verstappen</a></li> 
                    <li><a href="../piloti/perez.php">Sergio Perez</a></li> 
                    <li><a href="../piloti/Hamilton.php">Lewis Hamilton</a></li> 
                    <li><a href="../piloti/Russel.php">George Russell</a></li> 
                    <li><a href="../piloti/Leclerc.php">Charles Leclerc</a></li>
                    <li><a href="../piloti/sainz.php">Carlos Sainz</a></li> 
                    <li><a href="../piloti/Norris.php">Lando Norris</a></li>
                    <li><a href="../piloti/piastri.php">Oscar Piastri</a></li>
                    <li><a href="../piloti/Alonso.php">Fernando Alonso</a></li>
                    <li><a href="../piloti/Stroll.php">Lance Stroll</a></li>                     
                    <li><a href="../piloti/Gasly.php">Pierre Gasly</a></li>
                    <li><a href="../piloti/Ocon.php">Esteban Ocon</a></li>
                    <li><a href="../piloti/Albon.php">Alexander Albon</a></li>
                    <li><a href="../piloti/Sargeant.php">Logan Sargeant</a></li>
                    <li><a href="../piloti/Tsunoda.php">Yuki Tsunoda</a></li>
                    <li><a href="../piloti/Ricciardo.php">Daniel Ricciardo</a></li>
                    <li><a href="../piloti/bottas.php">Valterri Bottas</a></li>
                    <li><a href="../piloti/Zhou.php">Ghuanyu Zhou</a></li>
                    <li><a href="../piloti/Hulkenberg.php">Nico Hulkenberg</a></li>
                    <li><a href="../piloti/magnussen.php">Kevin Magnussen</a></li>
                </ul>
            </li>
            <li><a href="../scuderie.php" class="menu-text">Scuderie</a>
                <ul>
                    <span><a href="RedBull.php" >Red Bull</a></span>
                    <span><a href="Mercedes.php" >Mercedes</a></span>
                    <span><a href="Ferrari.php" >Ferrari</a></span>
                    <span><a href="McLaren.php" >McLaren</a></span>
                    <span><a href="AstonMartin.php" >Aston Martin</a></span>
                    <span><a href="Alpine.php" >Alpine</a></span>
                    <span><a href="Williams.php" >Williams</a></span>                       
                    <span><a href="AlphaTauri.php" >Alpha Tauri</a></span>
                    <span><a href="KickSaubern.php" >kick Saubern</a></span>
                    <span><a href="Haas.php" >Haas</a></span>
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


    <div class="mt-3_5">
        <div class="grid-container">
            <div class="border">
                <div class="info">
                    <div class="logo">
                        <img src="media/logoml.png" alt="">
                    </div>
                    <div class="title">McLaren</div>
                    <div class="grid-container-2">
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/Norris.avif">
                                </div>
                                <div class="content">
                                    <h2>Norris</h2>
                                </div>
                            </div>
                        </div>
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/Piastri.avif">
                                </div>
                                <div class="content">
                                    <h2>Piastri</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image-box">
                    <img src="media/mclaren_car.jpg">
                </div>
                <div class="content">
                    <!-- <h2>Ford Mustang 1969</h2> -->
                    <p>
                    La gloriosa scuderia inglese si era persa nelle retrovie dello schieramento, finendo al nono posto le stagioni 2015 e 2017. Poi la risalita: sesta nel 2018 e quarta nel 2019, il miglior risultato dal terzo posto del 2013. Conclude il 2020 al terzo posto del campionato costruttori, grazie ai podi dei due piloti Sainz e Norris. Nel 2021 il motore viene fornito dalla Mercedes e Sainz, passato alla Ferrari, viene sostituito da Daniel Ricciardo. Il 2021 è segnato dalla lotta con la Ferrari per il terzo posto nel campionato costruttori, dove l'ha spuntata il Cavallino, ma la McLaren ha fatto doppietta ai primi due posti nel GP d'Italia a Monza. La stagione del 2022 è stata tutt’altro che brillante, poiché la McLaren scende al quinto posto in classifica dietro ad Alpine, con Lando Norris che ottiene l'unico podio a Imola e 122 dei suoi 159 punti. Daniel Ricciardo non riesce a familiarizzare con la MCL36 motorizzata Mercedes e lascia la squadra a fine stagione. A sostituirlo nel 2023 c’è l’australiano Oscar Piastri, che si è aggiudicato il titolo di Formula 3 nel 2020 e di Formula 2 nel 2021. 
                    Lo scorso anno la squadra ha disputato una buona stagione, riuscendo, in alcuni GP, a tenere il passo dell’indiavolata Red Bull. Risultato: quarto posto in classifica dietro alla Ferra, con 302 punti. La monoposto si è dimostrata molto performante soprattutto nel passo gara. Entrambi i piloti hanno chiuso nella top 10, con Oscar Piastri al nono posto con 97 punti, e Lando Norris sesto con 205 punti. 
                    La nuova MCL38 è una vettura di continuità con quella del precedente anno. Guidata dal team principal italiano, Andrea Stella, la monoposto del team inglese, propone una livrea dove il color papaya si amalgama alla perfezione con il nero antracite. Presenta diverse innovazioni, ma non tutte le aree sono state completate al lancio. Ciò significa che verranno introdotte delle novità durante la stagione. La coppia di piloti è composta da Lando Norris e Oscar Piastri, che lo scorso anno ha fatto registrare delle ottime performance, dando del filo da torcere a scuderie ben più quotate. La power unit è fornita dalla Mercedes.
                    L’obiettivo del 2024 è quello di migliorare il quarto posto ottenuto lo scorso anno.
                    </p>
                </div>
            </div>
        
        </div>   
        
        <div class="poster__telefono mt-1">
            
            <div class="poster__content__telefono">
                <img src="media/logoml.png" alt="Image description">
                <h1 class="alf-big-text">McLaren </h1>
            </div>
            <div class="grid_tel">
                <div class="column">
                    <img src="media/Norris.avif" alt="">
                </div>
                <div class="column">
                    <img src="media/Piastri.avif" alt="">
                </div>
            </div>
     
        </div>

        <div class="poster__telefono_2 mt-1">
           
                <img src="media/mclaren_car.jpg" alt="">
                <p class="description">
                    La gloriosa scuderia inglese si era persa nelle retrovie dello schieramento, finendo al nono posto le stagioni 2015 e 2017. Poi la risalita: sesta nel 2018 e quarta nel 2019, il miglior risultato dal terzo posto del 2013. Conclude il 2020 al terzo posto del campionato costruttori, grazie ai podi dei due piloti Sainz e Norris. Nel 2021 il motore viene fornito dalla Mercedes e Sainz, passato alla Ferrari, viene sostituito da Daniel Ricciardo. Il 2021 è segnato dalla lotta con la Ferrari per il terzo posto nel campionato costruttori, dove l'ha spuntata il Cavallino, ma la McLaren ha fatto doppietta ai primi due posti nel GP d'Italia a Monza. La stagione del 2022 è stata tutt’altro che brillante, poiché la McLaren scende al quinto posto in classifica dietro ad Alpine, con Lando Norris che ottiene l'unico podio a Imola e 122 dei suoi 159 punti. Daniel Ricciardo non riesce a familiarizzare con la MCL36 motorizzata Mercedes e lascia la squadra a fine stagione. A sostituirlo nel 2023 c’è l’australiano Oscar Piastri, che si è aggiudicato il titolo di Formula 3 nel 2020 e di Formula 2 nel 2021. 
                    Lo scorso anno la squadra ha disputato una buona stagione, riuscendo, in alcuni GP, a tenere il passo dell’indiavolata Red Bull. Risultato: quarto posto in classifica dietro alla Ferra, con 302 punti. La monoposto si è dimostrata molto performante soprattutto nel passo gara. Entrambi i piloti hanno chiuso nella top 10, con Oscar Piastri al nono posto con 97 punti, e Lando Norris sesto con 205 punti. 
                    La nuova MCL38 è una vettura di continuità con quella del precedente anno. Guidata dal team principal italiano, Andrea Stella, la monoposto del team inglese, propone una livrea dove il color papaya si amalgama alla perfezione con il nero antracite. Presenta diverse innovazioni, ma non tutte le aree sono state completate al lancio. Ciò significa che verranno introdotte delle novità durante la stagione. La coppia di piloti è composta da Lando Norris e Oscar Piastri, che lo scorso anno ha fatto registrare delle ottime performance, dando del filo da torcere a scuderie ben più quotate. La power unit è fornita dalla Mercedes.
                    L’obiettivo del 2024 è quello di migliorare il quarto posto ottenuto lo scorso anno.
                </p>
  
            
        </div>
        

    </div>
    </div>
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