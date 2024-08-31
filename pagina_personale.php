<?php 
session_start(); // Start the session at the beginning of your file 
require 'API_updater/tableUpdater.php';
?>

<!DOCTYPE php>
<php lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FormulaForFun</title>
        <link rel="stylesheet" href="Style_pagina_personale.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <a href="index.php"><img src="media/logo.png" alt=""></a>
            </div>

            <ul class="menu">
                <?php if(isset($_SESSION['username'])): ?>
                    <li><a href="pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a></li>
                    <label><a href="logout.php" id="logoutButton" class="menu-text">LOGOUT</a></label>
                <?php else: ?>
                    <li><a href="login.html" id="loginButton" class="menu-text">LOGIN</a></li>
                    <li><a href="register.html" id="registerButton" class="menu-text">REGISTER</a></li>
                <?php endif; ?>
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
                <li><a href="fanta-formula.php" class="menu-text">Fanta-Formula</a></li>
            </ul>

            <div class="r-l">
                <?php if(isset($_SESSION['username'])): ?>
                    <a href="logout.php" id="logoutButton" class="button">LOGOUT</a>
                <?php endif; ?>    
            </div>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div id="popup">
                <img src="media/logo.png" alt="logo" class="logo2">
                <p id="popup-text"></p>
                <button id="popup-close">Chiudi</button>
            </div>
        </div>

        <?php
        $user = $_SESSION['username'];
        
        $conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

        // Controlla la connessione
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Esegui una query SQL per ottenere i dati della squadra
        $sql = "SELECT scuderia, pilota1, pilota2 FROM squadra WHERE utente = '$user'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Stampa i dati di ogni riga
            $row = $result->fetch_assoc();
            
            // Assegna i dati alle variabili
            $scuderia = $row["scuderia"];
            $pilota1 = $row["pilota1"];
            $pilota2 = $row["pilota2"];
         
            $immaginePilota1 = '';
            $immaginePilota1 = '';
            $immagineScuderia = '';

            //Immagine Primo Pilota
            if($pilota1 == "Max Verstappen")$immaginePilota1 = 'versatppen.avif';
            if($pilota1 == "Sergio Perez")$immaginePilota1 = 'perez.avif';
            if($pilota1 == "Lewis Hamilton")$immaginePilota1 = 'hamilton.avif';
            if($pilota1 == "George Russell")$immaginePilota1 = 'russel.avif';
            if($pilota1 == "Charles Leclerc")$immaginePilota1 = 'leclerc.avif';
            if($pilota1 == "Carlos Sainz")$immaginePilota1 = 'sainz.avif';
            if($pilota1 == "Lando Norris")$immaginePilota1 = 'Norris.avif';
            if($pilota1 == "Oscar Piastri")$immaginePilota1 = 'Piastri.avif';
            if($pilota1 == "Fernando Alonso")$immaginePilota1 = 'alonso.avif';
            if($pilota1 == "Lance Stroll")$immaginePilota1 = 'stroll.avif';
            if($pilota1 == "Pierre Gasly")$immaginePilota1 = 'gasly.avif';
            if($pilota1 == "Esteban Ocon")$immaginePilota1 = 'ocon.avif';
            if($pilota1 == "Alexander Albon")$immaginePilota1 = 'albon.avif';
            if($pilota1 == "Logan Sargeant")$immaginePilota1 = 'sargent.avif';
            if($pilota1 == "Yuki Tsunoda")$immaginePilota1 = 'tunoda.avif';
            if($pilota1 == "Daniel Ricciardo")$immaginePilota1 = 'ricciardo.avif';
            if($pilota1 == "Valterri Bottas")$immaginePilota1 = 'bottas.avif';
            if($pilota1 == "Ghuanyu Zhou")$immaginePilota1 = 'zhou.avif';
            if($pilota1 == "Nico Hulkenberg")$immaginePilota1 = 'hulkenberg.avif';
            if($pilota1 == "Kevin Magnussen")$immaginePilota1 = 'magnussen.avif';
            if($pilota1 == "Max Verstappen")$immaginePilota1 = 'versatppen.avif';

            //Immagine Secondo Pilota     
            if($pilota2 == "Max Verstappen")$immaginePilota2 = 'versatppen.avif';       
            if($pilota2 == "Sergio Perez")$immaginePilota2 = 'perez.avif';
            if($pilota2 == "Lewis Hamilton")$immaginePilota2 = 'hamilton.avif';
            if($pilota2 == "George Russell")$immaginePilota2 = 'russel.avif';
            if($pilota2 == "Charles Leclerc")$immaginePilota2 = 'leclerc.avif';
            if($pilota2 == "Carlos Sainz")$immaginePilota2 = 'sainz.avif';
            if($pilota2 == "Lando Norris")$immaginePilota2 = 'Norris.avif';
            if($pilota2 == "Oscar Piastri")$immaginePilota2 = 'Piastri.avif';
            if($pilota2 == "Fernando Alonso")$immaginePilota2 = 'alonso.avif';
            if($pilota2 == "Lance Stroll")$immaginePilota2 = 'stroll.avif';
            if($pilota2 == "Pierre Gasly")$immaginePilota2 = 'gasly.avif';
            if($pilota2 == "Esteban Ocon")$immaginePilota2 = 'ocon.avif';
            if($pilota2 == "Alexander Albon")$immaginePilota2 = 'albon.avif';
            if($pilota2 == "Logan Sargeant")$immaginePilota2 = 'sargent.avif';
            if($pilota2 == "Yuki Tsunoda")$immaginePilota2 = 'tunoda.avif';
            if($pilota2 == "Daniel Ricciardo")$immaginePilota2 = 'riccardo.avif';
            if($pilota2 == "Valterri Bottas")$immaginePilota2 = 'bottas.avif';
            if($pilota2 == "Ghuanyu Zhou")$immaginePilota2 = 'zhou.avif';
            if($pilota2 == "Nico Hulkenberg")$immaginePilota2 = 'hulkenberg.avif';
            if($pilota2 == "Kevin Magnussen")$immaginePilota2 = 'magnussen.avif';
            
            //Immagine Scuderia
            if($scuderia == "RedBull")$immagineScuderia = 'redbull-removebg-preview.png';
            if($scuderia == "Mercedes")$immagineScuderia = 'mercedes-removebg-preview.png';
            if($scuderia == "Ferrari")$immagineScuderia = 'ferrar-removebg-preview.png';
            if($scuderia == "McLaren")$immagineScuderia = 'mclaren-removebg-preview.png';
            if($scuderia == "Aston Martin")$immagineScuderia = 'astonmartin-removebg-preview.png';
            if($scuderia == "Alpine")$immagineScuderia = 'alphine-removebg-preview.png';
            if($scuderia == "Williams")$immagineScuderia = 'williams-removebg-preview.png';
            if($scuderia == "Alpha Tauri")$immagineScuderia = 'alphatauri-removebg-preview.png';
            if($scuderia == "Kick Saubern")$immagineScuderia = 'kicksaubern-removebg-preview.png';
            if($scuderia == "Haas")$immagineScuderia = 'haas-removebg-preview.png';

            // Dividi il nome e il cognome
            $parts1 = explode(" ", $pilota1);
            $parts2 = explode(" ", $pilota2);

            // Converte il cognome in maiuscolo
            $parts1[1] = strtoupper($parts1[1]);
            $parts2[1] = strtoupper($parts2[1]);

            // Ricombina il nome e il cognome
            $pilota1 = implode(" ", $parts1);
            $pilota2 = implode(" ", $parts2);

            //Punteggi
            $puntiPilota1Gara = "0";
            $puntiPilota2Gara = "0";
            $moltiplicatoreScuderiaGara = "1";

            $sql = "SELECT posizione, nome, scuderia, fastLap FROM ultimagara ORDER BY posizione";
            $result = $conn->query($sql); 
            if ($result->num_rows > 0) {    
                $puntixposizione = array(25, 18, 15, 12, 10, 8, 6, 4, 2, 1);
                $moltiplicatoreScuderia = array(4 , 3, 2, 1.75, 1.35, 1.30, 1.25, 1.20, 1.15, 1.10);
                // Stampa i dati di ogni riga
                $found = false;

                while($row = $result->fetch_assoc()){
                    // Assegna i dati alle variabili
                    $posizione = $row["posizione"];
                    $nome = $row["nome"];
                    $scuderiaPilota = $row["scuderia"];
                    $fastLap = $row["fastLap"];

                    if(!$found && $scuderiaPilota == $scuderia){
                        $moltiplicatoreScuderiaGara = $moltiplicatoreScuderia[$posizione-1];
                        $found = true;
                    }

                    if($nome == $pilota1){
                        $puntiPilota1Gara += $puntixposizione[$posizione-1];
                        if($fastLap)$puntiPilota1Gara += 3;
                    }else if($nome == $pilota2){
                        $puntiPilota2Gara += $puntixposizione[$posizione-1];
                        if($fastLap)$puntiPilota2Gara += 3;
                    }

                    

                }
                $puntiPilota1Gara *= $moltiplicatoreScuderiaGara;
                $puntiPilota2Gara *= $moltiplicatoreScuderiaGara;

                $punteggioTotale = $puntiPilota1Gara + $puntiPilota2Gara;

                //!Email 
                $sql = "SELECT email, punteggioStagionale FROM utenti WHERE username = '$user'";
                $result = $conn->query($sql); 
                if ($result->num_rows > 0) {    
                    $row = $result->fetch_assoc();
                    $email = $row["email"];
                    $punteggioStagionaleUser = $row["punteggioStagionale"];
                    
                    //<a href="" class="button1"> cambio immagine</a>

                    //!Lista Amici
                    // Controlla se esiste una riga con $user sia in "utente" che in "amico"
                    $sql = "SELECT * FROM amici WHERE utente = ? AND amico = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $user, $user);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows == 0) {
                        // Se non esiste, aggiungi la riga
                        $sql = "INSERT INTO amici (utente, amico, punteggioTotale) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssi", $user, $user, $punteggioTotale);
                        $stmt->execute();
                    }

                    //! PrevSquadra
                    $sql = "SELECT prevSquadra FROM squadra WHERE utente LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $user);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $prevSquadra = $row["prevSquadra"];
                        echo "Prev Squadra: " . $prevSquadra;
                    } else {
                        echo "No results found";
                    }
                    
                    
                    echo '<script>console.log("Prev Squadra: [' . $prevSquadra . ']");</script>';

                    // Verifica se il form è stato inviato
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Prendi il termine di ricerca dall'input del form
                        $searchTerm = $_POST['search'];

                        //! Punteggio Stagionale
                        $sql = "SELECT punteggioStagionale FROM utenti WHERE username = '$searchTerm'";
                        $result = $conn->query($sql); 
                        if ($result->num_rows > 0) {    
                            $row = $result->fetch_assoc();
                            $punteggioStagionale = $row["punteggioStagionale"];
                            //echo "<script>console.log('PunteggioStagionale: '+ $punteggioStagionale);</script>";
                            //Aggiorno il valore in amici
                            $sql = "UPDATE amici SET punteggioStagionale = ? WHERE amico = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("is", $punteggioStagionale, $searchTerm);
                            $stmt->execute();

                            //Aggiorno il mio valore (user)
                            $sql = "UPDATE amici SET punteggioStagionale = ? WHERE amico = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("is", $punteggioStagionaleUser, $user);
                            $stmt->execute();
                            
                        }else{
                            echo "Punteggio Stagionale non disponibile";
                        }

                        // Query SQL per cercare l'utente nella tabella "squadra" che non è già nella tabella "amici" //*AND utente NOT IN (SELECT utente FROM amici)
                        $sql = "SELECT * FROM squadra WHERE utente LIKE ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $searchTerm);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Se l'utente esiste
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                if($user != $row["utente"]) {
                                     // Controlla se l'utente esiste già nella tabella "amici"
                                    $check_sql = "SELECT * FROM amici WHERE utente = ? AND amico = ?";
                                    $check_stmt = $conn->prepare($check_sql);
                                    $check_stmt->bind_param("ss", $user, $row["utente"]);
                                    $check_stmt->execute();
                                    $check_result = $check_stmt->get_result();
                                    if ($check_result->num_rows == 0) {
                                        // Inserisci l'utente nella tabella "amici"
                                        $sql = "INSERT INTO amici (utente, amico, punteggioTotale, punteggioStagionale) VALUES (?, ?, ?, ?)";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("ssii", $user , $row["utente"], $row["punteggioTotale"], $punteggioStagionale);
                                        $stmt->execute();
                                        echo "User: " . $row["utente"]. " added to friends.<br>";
                                    } else {
                                        echo "User: " . $row["utente"]. " already exists in friends.<br>";
                                    }
                                }
                                else{
                                    echo "<script>
                                        document.getElementById('popup-text').textContent = 'Ti sei cercato a te stesso, perché?';
                                        document.getElementById('popup').style.display = 'block';
                                    </script>";
                                }
                            }
                        } else {
                            echo "<script>
                                    document.getElementById('popup-text').textContent = 'User not found or already in friends';
                                    document.getElementById('popup').style.display = 'block';
                                </script>";
                        }
                        


                    }  

                   


                    // Query SQL per ottenere tutti gli utenti da "amici" ordinati per punteggio
                    $user = $conn->real_escape_string($user); // Proteggi contro SQL Injection
                    $sql = "SELECT * FROM amici WHERE utente = '$user' ORDER BY punteggioStagionale DESC";
                    $result = $conn->query($sql);

                    echo '<div class="mt-4">
                        <div class="grid-container">
                            <div class="grid-container-profilo">
                                <div class="immagine_profilo">
                                    <img src="'. $_SESSION['profile_image'] .'" alt="immagine non presente"> 
                                    
                                    <form id="uploadForm" action="/login/upload.php" method="post" enctype="multipart/form-data">
                                        <input id="fileInput" class="button1" type="file" name="profilePicture" accept="image/*" style="display: none;">
                                        <button class="button1" id="uploadButton" type="button">Cambia immagine</button>
                                    </form>
                                </div>
                                <div>
                                    <div class="info-1"> '. $user .' <br> </div>
                                    <div class="info-2"> '. $email .' <br> </div>
                                    <div class="info-2">                                         
                                        <form method="post">
                                            <label for="search">Cerca amici:</label><br><br>
                                            <input type="text" id="search" name="search"><br><br>
                                            <input type="submit" value="Submit">
                                        </form> 
                                        <br> 
                                    </div>
                                    <div> 
                                        <table>
                                        <tr>
                                            <th>User</th>
                                            <th>Score</th>
                                            <th>total</th>

                                        </tr>';
                                        
                                        while($row = $result->fetch_assoc()) {
                                            if($prevSquadra != 1){
                                                if($row["amico"] == $user){
                                                    echo '<tr><td class="username">' . $user . '</td><td> '. $punteggioTotale. '</td><td> '. $punteggioStagionaleUser .'</td>
                                                    </tr>';
                                                }else{
                                                    echo "<tr><td class='username'>" . $row["amico"]. "</td><td>" . $row["punteggioTotale"]. "</td><td>" . $row["punteggioStagionale"]. "</td><td>
                                                    <form class='button-rm' action='remove_friend.php' method='post'>
                                                        <input type='hidden' name='utente' value='".$row["amico"]."'>
                                                        <input type='submit' value='Remove'>
                                                    </form>
                                                    </td></tr>";
                                                }
                                            }else{
                                                if($row["amico"] == $user){
                                                    echo '<tr><td class="username">' . $user . '</td><td> 0  </td><td> '. $punteggioStagionaleUser .'</td>
                                                    </tr>';
                                                }else{
                                                    echo "<tr><td class='username'>" . $row["amico"]. "</td><td>" . $row["punteggioTotale"]. "</td><td>" . $row["punteggioStagionale"]. "</td><td>
                                                    <form class='button-rm' action='remove_friend.php' method='post'>
                                                        <input type='hidden' name='utente' value='".$row["amico"]."'>
                                                        <input type='submit' value='Remove'>
                                                    </form>
                                                    </td></tr>";
                                                }
                                            }
                                        }
        echo '                          </table>
                                    </div>';
                                        // Ottieni il valore del campo moderatore per l'utente corrente
                                        $sql = "SELECT moderatore FROM utenti WHERE username = ?";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param('s', $user);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $row = $result->fetch_assoc();

                                        $moderatore = $row['moderatore'];

                                        // Esegui un'azione diversa in base al valore di moderatore
                                        if ($moderatore == 0) {
                                            // Esegui un'azione quando moderatore è 0
                                            echo '<a href="segnala_utenti.php" class="button3">SEGNALA UTENTI</a>';
                                        } else if ($moderatore == 1) {
                                            // Esegui un'azione quando moderatore è 1
                                            echo '<a href="ban_utenti.php" class="button3" id="Ban_button">BANNA UTENTI</a>';
                                        }
                                        
                                        echo '<form action="API_updater/clientUpdater.php" method="post">
                                                <button type="submit" class="button3 button-update">ESEGUI AGGIORNAMENTO</button>
                                              </form>';
     
        echo                 '</div>

                
                            </div>
                            <div class="grid-container-squad">
                                <div class="grid-container-squad-interno">
                                    <div class="grid-container-piloti">
                                        <div class="immagine_pilota">
                                        <img src="media/' . $immaginePilota1 . '" alt="">
                                        </div>
                                        <div class="immagine_pilota"> 
                                            <img src="media/' . $immaginePilota2 . '" alt="">
                                        
                                        </div>';
                                        if($prevSquadra != 1) {
                                            echo '<div class="info ' . ($puntiPilota1Gara > 0 ? 'positive' : 'negative') . '"> ' . $puntiPilota1Gara . '</div>';
                                        }
                                        if($prevSquadra != 1) {
                                            echo '<div class="info ' . ($puntiPilota2Gara > 0 ? 'positive' : 'negative') . '"> ' . $puntiPilota2Gara . '</div>';
                                        }
                                        #<div class="info '. ($puntiPilota1Gara > 0 ? 'positive' : 'negative') .'"> '. $puntiPilota1Gara .'</div>
                                        #<div class="info '. ($puntiPilota2Gara > 0 ? 'positive' : 'negative') .'"> '. $puntiPilota2Gara .'</div>
                echo '              </div>
                                    <div class="grid-container-scuderie">
                                        <div class="immagine_scuderia">
                                            <img src="media/' . $immagineScuderia . '" alt="">
                                        </div>';
                                        if($prevSquadra != 1) echo '<div class="info">x'. $moltiplicatoreScuderiaGara .'</div>';

                echo'               </div>
                                </div>
                                <div class="grid-container-punti">';
                                    if($prevSquadra != 1) echo '<div class="info"> Punti della Squadra: '. $puntiPilota1Gara + $puntiPilota2Gara .'</div>';
                                    else  echo '<div class="info"> Punti della Squadra:<br> Aspetta la fine della gara per sapere i risultati </div>';
                echo '          </div>
                                <div class="timer">
                                        <p>Prossima gara fra:</p>
                                        <p id="countdown"></p>
                                        <p id="nomeGara"></p>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }

        }else if (!$result) {
            printf("Error: %s\n", $conn->error);
        }
        else{
            echo '<div class="mt-4">
                        <div class="grid-container">
                            <div class="grid-container-profilo">
                                <div class="immagine_profilo">
                                    <img src="'. $_SESSION['profile_image'] .'" alt="immagine non presente"> 
                                    
                                    <form id="uploadForm" action="/login/upload.php" method="post" enctype="multipart/form-data">
                                        <input id="fileInput" class="button1" type="file" name="profilePicture" accept="image/*" style="display: none;">
                                        <button class="button1" id="uploadButton" type="button">Cambia immagine</button>
                                    </form>
                                </div>
                                <div>
                                    <div class="info-1"> '. $_SESSION['username'] .' <br> </div>
                                    <div class="info-2"> '. $_SESSION['email'] .' <br> </div>
                                    <div class="info-2">                                         
                                        <form method="post">
                                            <label for="search">Cerca amici:</label><br><br>
                                            <input type="text" id="search" name="search"><br><br>
                                            <input type="submit" value="Submit">
                                        </form> 
                                        <br> 
                                    </div>
                                    <div> 
                                        <table>
                                        <tr>
                                            <th>User</th>
                                            <th>Score</th>

                                        </tr>';
                                        
                                        while($row = $result->fetch_assoc()) {
                                            if($row["amico"] == $user){
                                                echo '<tr><td class="username">' . $user . '</td><td> '. $punteggioTotale. '</td><td> '. $punteggioStagionaleUser .'</td>
                                                </tr>';
                                            }else{
                                                echo "<tr><td class='username'>" . $row["amico"]. "</td><td>" . $row["punteggioTotale"]. "</td><td>" . $row["punteggioStagionale"]. "</td><td>
                                                <form class='button-rm' action='remove_friend.php' method='post'>
                                                    <input type='hidden' name='utente' value='".$row["amico"]."'>
                                                    <input type='submit' value='Remove'>
                                                </form>
                                                </td></tr>";
                                            }
                                        }
        echo '                          </table>
                                    </div>+
                                </div>
                            </div>
                            <div class="grid-container-squad">
                                <div class="grid-container-squad-interno">
                                    <div class="grid-container-piloti">
                                        <div class="info"> NESSUN PILOTA SCELTO</div>
                                        <div class="info"> NESSUN PILOTA SCELTO</div>
                                    </div>
                                    <div class="grid-container-scuderie">
                                        <div class="info">NESSUNA SCUDERIA SCELTA</div>
                                    </div>
                                </div>
                                <div class="grid-container-punti">

                                    <div class="info"> NON HAI FATTO ANCORALA TUA SQUADRA</div>

                                </div>
                            </div>
                        </div>
                    </div>';
        }
        // Chiudi la connessione
        $conn->close();
        ?>

        <script>
            document.getElementById('uploadButton').addEventListener('click', function() {
                document.getElementById('fileInput').click();
            });

            document.getElementById('fileInput').addEventListener('change', function() {
                if (this.value) {
                    document.getElementById('uploadForm').submit();
                }
            });

            document.getElementById('popup-close').addEventListener('click', function() {
                document.getElementById('popup').style.display = 'none';
            });
        </script>

         <footer class="footer mt-0">        
            <div class="col">
                <h3 class="medium-text">Contatti </h3>
                <p class="normal-text">e-mail: <br/> Fantaformula@gmail.com</p>
                <p class="normal-text">telefono: <br/> +39 3383477124</p>
            </div>
        </footer>
        
        

        <script>
            var countdownElement = document.getElementById('countdown');   
            var targetDate;
            var raceLocation;

            // Funzione per ottenere la prossima gara dal database
            function getNextRace() {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "getNextRace.php", false); // Imposta il terzo parametro su false per rendere la chiamata sincrona
                xhr.send();

                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    targetDate = response.Data;
                    raceLocation = response.Luogo;
                    
                    console.log("Data della prossima gara: " + targetDate);
                    console.log("Luogo della prossima gara: " + raceLocation);
                    
                }
            }

            // Imposta la data di destinazione
            getNextRace();

            document.getElementById('nomeGara').textContent = raceLocation;
            
             // Ottieni la prossima gara all'inizio
            //console.log("Questo è un messaggio di test 1");
            //console.log("2 "+targetDate);    
            var countdownId = setInterval(function() {
                var now = new Date().getTime();
                var targetDateTimestamp = new Date(targetDate).getTime();
                var timeLeft = targetDateTimestamp - now;
                //console.log("3 "+timeLeft); 
                var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                countdownElement.textContent = days + " : " + hours + " : " + minutes + " : " + seconds;
                //alert("Now: " + now + "Tempo Rimanente: " + timeLeft);
                
                if (timeLeft < 0) {
                    
                    // Controlla se sono passati tre giorni dalla gara
                    var threeDaysAfter = new Date(targetDate);
                    threeDaysAfter.setDate(threeDaysAfter.getDate() + 3);
                    console.log("Now: " + now + "Tempo Rimanente: " + timeLeft + "Tre giorni rimanenti: "+ threeDaysAfter);
                    if (now >= threeDaysAfter) {

                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "deletePrevGara.php", true);
                        xhr.send();
                        xhr.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                getNextRace(); // Ottieni la prossima gara
                            }
                        };

                        // Call a PHP script to do the requires
                        /*
                        var xhr2 = new XMLHttpRequest();
                        xhr2.open("GET", "updateAPIs.php", true);
                        xhr2.send();*/
                        

                    } else {
                        countdownElement.textContent = "La gara è iniziata!";
                    }
                }
            }, 1000);
            
        </script>
            <!-- Jquery-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="hamburger.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</php>


<!-- dobbiamo inserire i link per le paggine appena le abbiamo crete -->