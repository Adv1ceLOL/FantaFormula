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
                        <img src="media/logomr.png" alt="">
                    </div>
                    <div class="title">Mercedes</div>
                    <div class="grid-container-2">
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/hamilton.avif">
                                </div>
                                <div class="content">
                                    <h2>Hamilton</h2>
                                </div>
                            </div>
                        </div>
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/russel.avif">
                                </div>
                                <div class="content">
                                    <h2>Russell</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image-box">
                    <img src="media/mercedes_car.jpg">
                </div>
                <div class="content">
                    <p>
                    La Mercedes è l’unica scuderia ad aver vinto 8 titoli costruttori consecutivi (dal 2014 al 2022). Nel 2020, grazie a una rodata coppia di piloti, Lewis Hamilton, alla ricerca del settimo titolo in carriera, e Valtteri Bottas, prezioso e affidabile secondo pilota, conquista il settimo titolo. Hamilton vince 11 gare e infrange record a bizzeffe. Nel 2021 la Mercedes riesce a conquistare uno storico traguardo, l'ottavo titolo costruttori consecutivo. Ma le radicali modifiche al regolamento imposte dalla federazione nel 2022, estromettono la Mercedes dalla lotta per la conquista del titolo piloti e costruttori. La scuderia si deve accontentare della terza posizione, finendo dietro all’irraggiungibile Red Bull e a una sorprendente Ferrari. L'esordiente George Russell conquista l'unica vittoria superando Lewis Hamilton, che, per la prima volta nella sua carriera di F1, rimane senza vittorie. 
                    Nel 2023 la scuderia ha chiuso al secondo posto nella classifica del mondiale costruttori conquistando 409 punti. Hamilton ha concluso al terzo posto con 234 punti: ottimo risultato considerando lo strapotere Red Bull. Russell, dopo alcune buone prestazioni, ha perso un po’ di slancio e non è andato oltre il nono posto nel mondiale piloti con 175 punti conquistati.
                    Tanti i cambiamenti apportati alla W15, tra cui un nuovo telaio e un inedito alloggiamento del cambio. Dal punto di vista aerodinamico, gli ingegneri hanno lavorato per rendere la monoposto il più efficiente possibile, cercando di ricavare più deportanza con meno resistenza. Focus sul miglioramento dell'assale posteriore, difetto che lo scorso anno rendeva la monoposto imprevedibile. Inoltre, è stato ottimizzato il powertrain. In occasione della stagione 2024 che coincide con il 90° anniversario della squadra, la Mercedes ha deciso di cambiare anche la livrea, con l'argento che ritorna per affiancare l'iconico nero delle ultime stagioni. 
                    Per il 2024 confermati i due piloti: Lewis Hamilton e George Russell. L’obiettivo è quello di dare del filo da torcere alla Red Bull e confermarsi vice campione del mondo.
                    </p>
                </div>
            </div>        
        </div>    
        
        <div class="poster__telefono mt-1">
            
            <div class="poster__content__telefono">
                <img src="media/logomr.png" alt="Image description">
                <h1 class="alf-big-text">Mercedes </h1>
            </div>
            <div class="grid_tel">
                <div class="column">
                    <img src="media/hamilton.avif" alt="">
                </div>
                <div class="column">
                    <img src="media/hamilton.avif" alt="">
                </div>
            </div>
     
        </div>

        <div class="poster__telefono_2 mt-1">
            
                <img src="media/mercedes_car.jpg" alt="">
                <p class="description">
                    La Mercedes è l’unica scuderia ad aver vinto 8 titoli costruttori consecutivi (dal 2014 al 2022). Nel 2020, grazie a una rodata coppia di piloti, Lewis Hamilton, alla ricerca del settimo titolo in carriera, e Valtteri Bottas, prezioso e affidabile secondo pilota, conquista il settimo titolo. Hamilton vince 11 gare e infrange record a bizzeffe. Nel 2021 la Mercedes riesce a conquistare uno storico traguardo, l'ottavo titolo costruttori consecutivo. Ma le radicali modifiche al regolamento imposte dalla federazione nel 2022, estromettono la Mercedes dalla lotta per la conquista del titolo piloti e costruttori. La scuderia si deve accontentare della terza posizione, finendo dietro all’irraggiungibile Red Bull e a una sorprendente Ferrari. L'esordiente George Russell conquista l'unica vittoria superando Lewis Hamilton, che, per la prima volta nella sua carriera di F1, rimane senza vittorie. 
                    Nel 2023 la scuderia ha chiuso al secondo posto nella classifica del mondiale costruttori conquistando 409 punti. Hamilton ha concluso al terzo posto con 234 punti: ottimo risultato considerando lo strapotere Red Bull. Russell, dopo alcune buone prestazioni, ha perso un po’ di slancio e non è andato oltre il nono posto nel mondiale piloti con 175 punti conquistati.
                    Tanti i cambiamenti apportati alla W15, tra cui un nuovo telaio e un inedito alloggiamento del cambio. Dal punto di vista aerodinamico, gli ingegneri hanno lavorato per rendere la monoposto il più efficiente possibile, cercando di ricavare più deportanza con meno resistenza. Focus sul miglioramento dell'assale posteriore, difetto che lo scorso anno rendeva la monoposto imprevedibile. Inoltre, è stato ottimizzato il powertrain. In occasione della stagione 2024 che coincide con il 90° anniversario della squadra, la Mercedes ha deciso di cambiare anche la livrea, con l'argento che ritorna per affiancare l'iconico nero delle ultime stagioni. 
                    Per il 2024 confermati i due piloti: Lewis Hamilton e George Russell. L’obiettivo è quello di dare del filo da torcere alla Red Bull e confermarsi vice campione del mondo.
                    
                </p>
            
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