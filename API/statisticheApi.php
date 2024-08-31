<?php 
session_start(); // Start the session at the beginning of your file 


    function stampaTabellaLaps($pilota) {
        $url = "http://localhost/login/API/laps.php?" . http_build_query(['pilota' => $pilota, 'PHPSESSID' => session_id()]);
        $laps = file_get_contents($url);
        
        if ($laps !== false) {
            $data = json_decode($laps, true);
        
            if ($data !== null) {
                echo "<table class='responsive-table'>";
                echo "<tr class='table-header'>";
                echo "<th class='col col-1'>Media Settore 1</th>";
                echo "<th class='col col-2'>Media Settore 2</th>";
                echo "<th class='col col-3'>Media Settore 3</th>";
                echo "<th class='col col-4'>Full Lap Durata Media</th>";
                echo "<th class='col col-5'>Lap Number</th>";
                echo "</tr>";
                
                foreach ($data as $lap) {
                    $milliseconds = $lap['avg_lap_duration'] * 1000;
                    $minutes_seconds = gmdate("i:s", floor($milliseconds / 1000));
                    $milliseconds = $milliseconds % 1000;
                    $lap['avg_lap_duration'] = $minutes_seconds . ':' . sprintf('%03d', $milliseconds);
                    
                    echo "<tr class ='table-row'>";
                    echo "<td class='col col-1'>" . $lap['avg_duration_sector_1'] . " s </td>";
                    echo "<td class='col col-2'>" . $lap['avg_duration_sector_2'] . " s </td>";
                    echo "<td class='col col-3'>" . $lap['avg_duration_sector_3'] . " s </td>";
                    echo "<td class='col col-4'>" . $lap['avg_lap_duration'] . "</td>";
                    echo "<td class='col col-4'>" . $lap['max_lap_number'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    }

    function stampaTabellaRuote($pilota) {
        $url = "http://localhost/login/API/ruote.php?" . http_build_query(['pilota' => $pilota, 'PHPSESSID' => session_id()]);
        $ruote = file_get_contents($url);

        if ($ruote !== false) {
            $data = json_decode($ruote, true);

            if ($data !== null) {
                // Verifica se la chiave $pilota esiste nei dati
                if (isset($data[$pilota]) && is_array($data[$pilota])) {
                    echo "<table class='responsive-table'>";
                    echo "<tr class='table-header'>";
                    echo "<th class='col col-1'>Numero Giri per Ruota</th>";
                    echo "<th class='col col-2'>Tipo di Ruota</th>";
                    echo "</tr>";
                    foreach ($data[$pilota] as $stint_number => $ruota) {
                        echo "<tr class='table-row'>";
                        echo "<td class='col col-1'>" . $ruota['laps'] . "</td>"; // Mostrare il numero del giro
                        echo "<td class='col col-2'>" . $ruota['compound'] . "</td>"; // Mostrare il composto della ruota
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Dati per il pilota $pilota non disponibili.";
                }
            } else {
                echo "Errore nella decodifica dei dati JSON.";
            }
        } else {
            echo "Errore nel recupero dei dati dall'API.";
        }
    }

    function stampaTabellaPit($pilota) {
        $url = "http://localhost/login/API/pit.php?" . http_build_query(['pilota' => $pilota, 'PHPSESSID' => session_id()]);
        $pit = file_get_contents($url);
        
        if ($pit !== false) {
            $data = json_decode($pit, true);
        
            if ($data !== null) {
                echo "<table class='responsive-table'>";
                echo "<tr class='table-header'>";
                echo "<th class='col col-1'>Media Tempo in Pit Lane</th>";
                echo "<th class='col col-2'>Numero Pit Stops</th>";
                echo "<th class='col col-3'>Gran Prix</th>";
                echo "</tr>";
                foreach ($data as $row) {
                    echo "<tr class='table-row'>";
                    echo "<td class='col col-1'>" . $row['average_pit_duration'] . " s </td>";
                    echo "<td class='col col-2'>" . $row['number_of_stops'] . "</td>";
                    echo "<td class='col col-3'>" . $row['meeting_name'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    }
    

    function stampaTabellaRadio($pilota) {
        $url = "http://localhost/login/API/radio.php?" . http_build_query(['pilota' => $pilota, 'PHPSESSID' => session_id()]);
        $radio = file_get_contents($url);
        
        if ($radio !== false) {
            $data = json_decode($radio, true);
            if ($data !== null) {
                $audioCount = 0;
                foreach ($data as $row) {
                    if (array_key_exists('recording_url', $row)) {
                        $recording_urls = explode(',', $row['recording_url']);
                        foreach ($recording_urls as $recording_url) {
                            $recording_url .= '?' . time();
                            echo '
                                <iframe id="myIframe'.$audioCount.'" src="audioButton.html?audioId=myAudio'.$audioCount.'&recordingUrl='.urlencode($recording_url).'" style="border:none;width:100px;height:62px;"></iframe>
                                <audio id="myAudio'.$audioCount.'" type="audio/mp3"></audio>
                            ';
                            $audioCount++;
                        }
                    } else {
                        echo "No recording URLs found for driver: " . $row['full_name'];
                    }
                }
            }
 
        }
    }
    
    
    
    
    function stampaTabellaSettori($pilota) {
        $url = "http://localhost/login/API/settori.php?" . http_build_query(['pilota' => $pilota, 'PHPSESSID' => session_id()]);
        $settori = file_get_contents($url);
        
        if ($settori !== false) {
            echo "<pre>Response from URL: " . htmlspecialchars($settori) . "</pre>";
            
            $data = json_decode($settori, true);
        
            if ($data !== null) {
                if (empty($data)) {
                    echo "<table class='responsive-table'>";
                    echo "<tr class='table-header'>";
                    echo "<th class='col col-1'>Infrazioni</th>";
                    echo "</tr>";
                    echo "<tr class='table-row'>";
                    echo "<td class='col col-1'>Nessuna infrazione per Race Control</td>";
                    echo "</tr>";
                    echo "</table>";
                } else {
                    echo "<table class='responsive-table'>";
                    echo "<tr class='table-header'>";
                    echo "<th class='col col-1'>Infrazioni</th>";
                    echo "</tr>";
                    foreach ($data as $row) {
                        echo "<tr class='table-row'>";
                        echo "<td class='col col-1'>" . $row['message'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            } else {
                echo "Error decoding JSON: " . json_last_error_msg();
            }
        } else {
            echo "Error fetching data from URL.";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="IT">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FormulaForFun</title>
        <link rel="stylesheet" href="statisticheApiStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQfz9T4hdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">  
    </head>

    
<body>

    
    <div class="header">
        <div class="logo">
            <a href="../index.php" class="box-link"><img src="../media/logo.png" alt=""></a>
        </div>

        <ul class="menu">
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="../pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a></li>
                <label><a href="../logout.php" id="logoutButton" class="menu-text">LOGOUT</a></label>
            <?php else: ?>
                <label><a href="../login.html" id="loginButton" class="menu-text">LOGIN</a></label>
                <label><a href="../register.html" id="registerButton" class="menu-text">REGISTER</a></label>
            <?php endif; ?>
            <li><a href="statisticheApi.php" class="menu-text">Stats</a></li>
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
                    <a href="../login.html" id="loginButton" class="button">LOGIN</a>
                    <p>
                    <a href="../register.html" id="registerButton" class="button">REGISTER</a>
                <?php endif; ?>
        </div>

        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="hamburger.js"></script>

    <script>
    console.log("Meeting key: <?php echo isset($_SESSION['meeting_key']) ? $_SESSION['meeting_key'] : 'No meeting key set'; ?>");
    </script>
    <?php
    $meeting_keys = [1242, 1241, 1240, 1239, 1238, 1237];
    $selected_meeting_key = isset($_SESSION['meeting_key']) ? $_SESSION['meeting_key'] : null;
    ?>
    
    <div class="menu">
        <label for="grandPrixSelect">Choose a Grand Prix:</label>
        <select id="grandPrixSelect">
            <?php foreach ($meeting_keys as $key): ?>
                <option value="<?php echo $key; ?>" <?php echo ($key == $selected_meeting_key) ? 'selected' : ''; ?>>
                    <?php echo $key; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <script>
        document.getElementById('grandPrixSelect').addEventListener('change', function() {
            var selectedKey = this.value;
            $.ajax({
                type: 'POST',
                url: 'updateSession.php',
                data: { meeting_key: selectedKey },
                success: function(response) {
                    // Reload the page after the session is updated
                    location.reload();
                }
            });
        });
        
    </script>

    </div>
    <div class="mt-4">
        <div class="grid-container">
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/versatppen.avif" alt="Driver Image">
                    </div><?php $pilota = "Max VERSTAPPEN" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                                
                            ?>
                        </div>
                    </div>
                    
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/redbull-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/perez.avif" alt="Driver Image">
                        </div><?php $pilota = "Sergio PEREZ"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/redbull-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>    
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/hamilton.avif" alt="Driver Image">
                        </div><?php $pilota = "Lewis HAMILTON"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/mercedes-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>
                
            </div>
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/russel.avif" alt="Driver Image">
                    </div><?php $pilota = "George RUSSELL" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/mercedes-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/leclerc.avif" alt="Driver Image">
                        </div><?php $pilota = "Charles LECLERC"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div> 
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/ferrar-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>      
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/sainz.avif" alt="Driver Image">
                        </div><?php $pilota = "Carlos SAINZ"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/ferrar-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/norris.avif" alt="Driver Image">
                    </div><?php $pilota = "Lando NORRIS" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/mclaren-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/piastri.avif" alt="Driver Image">
                        </div><?php $pilota = "Oscar PIASTRI"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/mclaren-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>    
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/alonso.avif" alt="Driver Image">
                        </div><?php $pilota = "Fernando ALONSO"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/AstonMartin-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>
                
            </div>
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/stroll.avif" alt="Driver Image">
                    </div><?php $pilota = "Lance STROLL" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/AstonMartin-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/gasly.avif" alt="Driver Image">
                        </div><?php $pilota = "Pierre GASLY"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div> 
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/alphine-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>      
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/ocon.avif" alt="Driver Image">
                        </div><?php $pilota = "Esteban OCON"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/alphine-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/albon.avif" alt="Driver Image">
                    </div><?php $pilota = "Alexander ALBON" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/williams-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/sargent.avif" alt="Driver Image">
                        </div><?php $pilota = "Logan SARGEANT"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/williams-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>    
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/tunoda.avif" alt="Driver Image">
                        </div><?php $pilota = "Yuki TSUNODA"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/alphatauri-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>
                
            </div>
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/riccardo.avif" alt="Driver Image">
                    </div><?php $pilota = "Daniel RICCIARDO" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/alphatauri-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/bottas.avif" alt="Driver Image">
                        </div><?php $pilota = "Valtteri BOTTAS"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div> 
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/kik_saubern-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>      
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/zhou.avif" alt="Driver Image">
                        </div><?php $pilota = "ZHOU Guanyu"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/kik_saubern-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>
            </div>
            <div class="container">
                <div class="ruote-container">
                    <div class="image-box">
                        <img src="../media/hulkenberg.avif" alt="Driver Image">
                    </div><?php $pilota = "Nico HULKENBERG" ?>
                    <div class="data-ruote">
                        <?php
                            stampaTabellaRadio($pilota);
                        ?>
                    </div>
                </div>
                <div class="data1-box">
                    <div class="column1">
                        <div class="data1-item">
                            <?php
                                stampaTabellaLaps($pilota);
                            ?>   
                        </div>
                    
                        
                        <div class="data1-item">
                            <?php
                                stampaTabellaPit($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php
                                stampaTabellaRuote($pilota);
                            ?>
                        </div>
                        <div class="data1-item">
                            <?php   
                                stampaTabellaSettori($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="imageCar-box" class="width: 100%">
                        <img src="../media/haas-removebg-preview.png" alt="Driver Image">
                    </div>
                </div>               
            </div>
            <div class="container">
                <div class="ruote-container">
                        <div class="image-box">
                            <img src="../media/magnussen.avif" alt="Driver Image">
                        </div><?php $pilota = "Kevin MAGNUSSEN"?>
                        <div class="data-ruote">
                            <?php
                                stampaTabellaRadio($pilota);
                            ?>
                        </div>
                    </div>
                    <div class="data1-box">
                        <div class="column1">
                            <div class="data1-item">
                                <?php
                                    stampaTabellaLaps($pilota);
                                ?>   
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaPit($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php
                                    stampaTabellaRuote($pilota);
                                ?>
                            </div>
                            <div class="data1-item">
                                <?php   
                                    stampaTabellaSettori($pilota);
                                ?>
                            </div>
                        </div>
                        <div class="imageCar-box" class="width: 100%">
                            <img src="../media/haas-removebg-preview.png" alt="Driver Image">
                        </div>
                    </div>    
            </div>

        </div>
    </div>
    
    <footer class="footer mt-1">        
        <div class="col">
            <h3 class="medium-text">Contatti </h3>
            <p class="normal-text">e-mail: <br/> Fantaformula@gmail.com</p>
            <p class="normal-text">telefono: <br/> +39 3383477124</p>
        </div>
    </footer>
    
    


    </body>
</html>

</body>
</html>