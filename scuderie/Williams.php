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
                        <img src="media/logowill.png" alt="">
                    </div>
                    <div class="title">Williams</div>
                    <div class="grid-container-2">
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/albon.avif">
                                </div>
                                <div class="content">
                                    <h2>Albon</h2>
                                </div>
                            </div>
                        </div>
                        <div class="pilota">
                            <div class="card">
                                <div class="image-box">
                                    <img src="media/sargent.avif">
                                </div>
                                <div class="content">
                                    <h2>sargeant</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image-box">
                    <img src="media/williams_car.jpg">
                </div>
                <div class="content">
                    <!-- <h2>Ford Mustang 1969</h2> -->
                    <p>
                        Per la Williams sono ormai lontani i fasti degli Anni ‘90, quando era stabilmente fra le migliori scuderie in Formula 1 e arriva a giocarsi (e vincere) i campionati. Nel 2018 e 2019, invece, la Williams è stata il team ad aver ottenuto meno punti: 7 nel 2018, soltanto 1 nel 2019.  Nel 2020 la scuderia si presenta al via con 2 piloti poco esperti: il talentuoso George Russell, al secondo campionato nel circus, e il debuttante Nicholas Latifi, l’unico volto nuovo in Formula 1 nel 2020. Stagione che per la prima volta si chiude senza punti. Il 2021 è un anno di svolta, con nuovi proprietari e accordi più stretti con la Mercedes che fornisce il motore. e da cui proviene anche il pilota George Russell. La stagione si chiude con l’ottavo posto in classifica. Nel 2022 la coppia di piloti è formata dal confermato Latifi e da Alexander Albon, con Russell che torna alla Mercedes al posto di Valterri Bottas. Nonostante la FW44 mostri a tratti un ritmo promettente, in particolare nelle mani di Alex Albon, che si qualifica nono a Spa, ottiene solo otto punti in tutta la stagione, lasciando la squadra al decimo e ultimo posto nella classifica finale. Nel 2023 la coppia di piloti è composta da Alexander Albon e dal rookie Logan Sargeant. La vettura è la FW45 e l'obiettivo del team è quello di andare oltre la decima posizione con cui è stato chiuso il 2022. 
                        Nel 2023 la Williams è stata “salvata” dalle ottime prestazioni di Albon, che le hanno consentito di racimolare 28 punti complessivi, e di chiudere al settimo posto. Sargeant, all’esordio e in difficoltà, ha conquistato un misero punto. Mentre Albon è stato in grado di portarsi a casa 27 punti, chiudendo il campionato piloti al 13esimo posto. Davvero niente male considerando la scarsa competitività della monoposto.
                        La nuova FW46 è frutto del lavoro congiunto tra piloti e team di ingegneri. La livrea è completamente inedita, con il blue navy e il nero, con una striscia bianca e rossa ad avvolgere tutto il muso. Quest’ultima scelta cromatica rappresenta un omaggio alle livree bianche degli esordi e quelle rosse risalenti alla fine degli anni ’90. La power unit è fornita dalla Mercedes. L’obiettivo è quello di migliorare il piazzamento della passata stagione.
                    </p>
                </div>
            </div>
        
        </div>  
        
        <div class="poster__telefono mt-1">
            
            <div class="poster__content__telefono">
                <img src="media/logowill.png" alt="Image description">
                <h1 class="alf-big-text">RedBull </h1>
            </div>
            <div class="grid_tel">
                <div class="column">
                    <img src="media/albon.avif" alt="">
                </div>
                <div class="column">
                    <img src="media/sargent.avif" alt="">
                </div>
            </div>
     
        </div>

        <div class="poster__telefono_2 mt-1">
            
                <img src="media/williams_car.jpg" alt="">
                <p class="description">
                    Per la Williams sono ormai lontani i fasti degli Anni ‘90, quando era stabilmente fra le migliori scuderie in Formula 1 e arriva a giocarsi (e vincere) i campionati. Nel 2018 e 2019, invece, la Williams è stata il team ad aver ottenuto meno punti: 7 nel 2018, soltanto 1 nel 2019.  Nel 2020 la scuderia si presenta al via con 2 piloti poco esperti: il talentuoso George Russell, al secondo campionato nel circus, e il debuttante Nicholas Latifi, l’unico volto nuovo in Formula 1 nel 2020. Stagione che per la prima volta si chiude senza punti. Il 2021 è un anno di svolta, con nuovi proprietari e accordi più stretti con la Mercedes che fornisce il motore. e da cui proviene anche il pilota George Russell. La stagione si chiude con l’ottavo posto in classifica. Nel 2022 la coppia di piloti è formata dal confermato Latifi e da Alexander Albon, con Russell che torna alla Mercedes al posto di Valterri Bottas. Nonostante la FW44 mostri a tratti un ritmo promettente, in particolare nelle mani di Alex Albon, che si qualifica nono a Spa, ottiene solo otto punti in tutta la stagione, lasciando la squadra al decimo e ultimo posto nella classifica finale. Nel 2023 la coppia di piloti è composta da Alexander Albon e dal rookie Logan Sargeant. La vettura è la FW45 e l'obiettivo del team è quello di andare oltre la decima posizione con cui è stato chiuso il 2022. 
                    Nel 2023 la Williams è stata “salvata” dalle ottime prestazioni di Albon, che le hanno consentito di racimolare 28 punti complessivi, e di chiudere al settimo posto. Sargeant, all’esordio e in difficoltà, ha conquistato un misero punto. Mentre Albon è stato in grado di portarsi a casa 27 punti, chiudendo il campionato piloti al 13esimo posto. Davvero niente male considerando la scarsa competitività della monoposto.
                    La nuova FW46 è frutto del lavoro congiunto tra piloti e team di ingegneri. La livrea è completamente inedita, con il blue navy e il nero, con una striscia bianca e rossa ad avvolgere tutto il muso. Quest’ultima scelta cromatica rappresenta un omaggio alle livree bianche degli esordi e quelle rosse risalenti alla fine degli anni ’90. La power unit è fornita dalla Mercedes. L’obiettivo è quello di migliorare il piazzamento della passata stagione.
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