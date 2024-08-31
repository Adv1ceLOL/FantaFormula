
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
      <link rel="stylesheet" href="Style_stats.css">
      <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css" integrity="sha512-fJcFDOQo2+/Ke365m0NMCZt5uGYEWSxth3wg2i0dXu7A1jQhdzz6nkzwmJdOdkcS8jmy2lWGaRXl+nFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    </head>

    
<body>
    <div class="header">
        <div class="logo">
            <a href="index.php" class="box-link"><img src="media/logo.png" alt=""></a>
        </div>

        <ul class="menu">
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a></li>
                <label><a href="logout.php" id="logoutButton" class="menu-text">LOGOUT</a></label>
            <?php else: ?>
                <label><a href="login.html" id="loginButton" class="menu-text">Login</a></label>
                <label><a href="register.html" id="registerButton" class="menu-text">Register</a></label>
            <?php endif; ?>
            <li><a href="stats.php" class="menu-text">Stats</a></li>
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
            <label><a href="login.php"class="menu-text">Login</a></label>
            <label><a href="register.php"class="menu-text">Register</a></label>   
        </ul>

        <div class="r-l">
        <?php if(isset($_SESSION['username'])): ?>
                    <a href="pagina_personale.php" id="userImage"><img src="<?php echo $_SESSION['profile_image']; ?>" alt="image"></a>
                    <a href="logout.php" id="logoutButton" class="button">LOGOUT</a>
                <?php else: ?>
                    <a href="login.html" id="loginButton" class="button">LOGIN</a>
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

    <?php 
      $conn = new mysqli('127.0.0.1', 'root', '', 'statistiche');

      // Controlla la connessione
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      
      // Esegui una query SQL per ottenere i dati della squadra
      $sql = "SELECT cognome, posizione, gare, vittorie, podi, fastLap, mediaGriglia, mediaFinale FROM fanta ORDER BY posizione";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cognome = $row["cognome"];
        $posizone = $row["posizione"];
        $wins = $row["vittorie"];
        $gare = $row["gare"];
        $podi = $row["podi"];
        $fastLap = $row["fastLap"];
        $mediaGriglia = $row["mediaGriglia"];
        $mediaFinale = $row["mediaFinale"];
        $counter = 1;
      
        echo ' 
          <div class="grid-container mt-3">
            <div class="box">
              <div class="main">
                <div class="position">'.$counter.'</div>
                <img class="product__image" src="media/versatppen.avif" alt="pilota_image" />
                  <div class="container">
                    <div class="title">Max Verstappen
                      <span>RedBull</span>
                      <span>- 1° -</span>
                    </div>
                    <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                    
                  </div>
                </div>
            </div>';

            $row = $result->fetch_assoc();
            $cognome = $row["cognome"];
            $posizone = $row["posizione"];
            $wins = $row["vittorie"];
            $gare = $row["gare"];
            $podi = $row["podi"];
            $fastLap = $row["fastLap"];
            $mediaGriglia = $row["mediaGriglia"];
            $mediaFinale = $row["mediaFinale"];
            $counter++;

            echo '
            <div class="box">
                <div class="main">
                    <img class="product__image" src="media/perez.avif" alt="pilota_image" />
                    <div class="container">
                      <div class="title">Sergio Perez
                        <span>RedBull</span>
                        <span>- 2° -</span>
                      </div>
                      <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
            
                    </div>
                  </div>
            </div>
          </div>';
  
        $row = $result->fetch_assoc();
        $cognome = $row["cognome"];
        $posizone = $row["posizione"];
        $wins = $row["vittorie"];
        $gare = $row["gare"];
        $podi = $row["podi"];
        $fastLap = $row["fastLap"];
        $mediaGriglia = $row["mediaGriglia"];
        $mediaFinale = $row["mediaFinale"];

        echo '
          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/hamilton.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Lewis Hamilton
                          <span>Mercedes</span>
                          <span>- 3° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                    
                      </div>
                    </div>
              </div>';

              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];

              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/leclerc.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Charle Leclerc
                          <span>Ferrari</span>
                          <span>- 4° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
  
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/alonso.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Fernando Alonso
                          <span>Aston Martin</span>
                          <span>- 5° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                  
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/Norris.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Lando Norris
                          <span>MCLarren</span>
                          <span>- 6° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
              
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/sainz.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Carlos Sainz
                          <span>Ferrari</span>
                          <span>- 7° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/russel.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">George Russel
                          <span>Mercedes</span>
                          <span>- 8° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                  
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/Piastri.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Oscar Piastri
                          <span>McLaren</span>
                          <span>- 9° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/stroll.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Lance Stroll
                          <span>Aston Martin</span>
                          <span>- 10° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/gasly.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Pierre Gasly
                          <span>Alpha</span>
                          <span>- 11° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
              
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/ocon.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Esteban Ocon
                          <span>Alphine</span>
                          <span>- 12° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
            
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/albon.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Alexander Albon
                          <span>Williams</span>
                          <span>- 13° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
              
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/tunoda.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Yuki Tsunoda
                          <span>Alpha Tauri</span>
                          <span>- 14° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                    
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/bottas.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Valterri Bottas
                          <span>Kick Saubern</span>
                          <span>- 15° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                  
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/hulkenberg.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Nico Hulkenberg
                          <span>Haas</span>
                          <span>- 16° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                      
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/zhou.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Ghuanyu Zhou
                          <span>kick Saubern</span>
                          <span>- 17° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/riccardo.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Daniel Ricciardo
                          <span>Alpha Tauri</span>
                          <span>- 18° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
            
                      </div>
                    </div>
              </div>
          </div>';
  
          $row = $result->fetch_assoc();
          $cognome = $row["cognome"];
          $posizone = $row["posizione"];
          $wins = $row["vittorie"];
          $gare = $row["gare"];
          $podi = $row["podi"];
          $fastLap = $row["fastLap"];
          $mediaGriglia = $row["mediaGriglia"];
          $mediaFinale = $row["mediaFinale"];
  
          echo '

          <div class="grid-container">
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/magnussen.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Kevin Magnussen 
                          <span>Haas</span>
                          <span>- 19° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                        
                      </div>
                    </div>
              </div>';
  
              $row = $result->fetch_assoc();
              $cognome = $row["cognome"];
              $posizone = $row["posizione"];
              $wins = $row["vittorie"];
              $gare = $row["gare"];
              $podi = $row["podi"];
              $fastLap = $row["fastLap"];
              $mediaGriglia = $row["mediaGriglia"];
              $mediaFinale = $row["mediaFinale"];
      
              echo '
              <div class="box">
                  <div class="main">
                      <img class="product__image" src="media/sargent.avif" alt="pilota_image" />
                      <div class="container">
                        <div class="title">Logan Sargeant
                          <span>Williams</span>
                          <span>- 20° -</span>
                        </div>
                        <div class="desc">Vittorie: '. $wins .'   Gare: '. $gare .'  Podi: '. $podi .'</br> Giro più veloce: '. $fastLap .'</br>Media Griglia inizio gara: '. $mediaGriglia .'</br> Media Griglia fine gara: '. $mediaFinale .'</div>
                      
                      </div>
                    </div>
              </div>
          </div>';

        }else{

        }
      // Chiudi la connessione
      $conn->close();
      ?>

    <footer class="footer">        
        <div class="col">
            <h3 class="medium-text">Contatti </h3>
            <p class="normal-text">e-mail: <br/> Fantaformula@gmail.com</p>
            <p class="normal-text">telefono: <br/> +39 </p>
        </div>
    </footer>

    <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

     <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    -->
    <script src="hamburger.js"></script>    

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOrEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    -->
</body>
</html>
