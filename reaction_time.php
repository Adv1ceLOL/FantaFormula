<?php 
session_start(); // Start the session at the beginning of your file 4

if (!isset($_SESSION['bestTime'])) {
    $_SESSION['bestTime'] = 0; // Imposta un valore predefinito
}

if (isset($_SESSION['username'])) {
    // Connessione al database
    $conn = new mysqli('localhost', 'root', '', 'statistiche');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];

    // Add quotes around $username
    $sql = "SELECT record_reaction FROM utenti WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bestTime = $row['record_reaction'];
    } else {
        echo "0 results";
    }
    $conn->close();
} else {
    echo "Non sei loggato";
}

?>

<?php
if (!is_numeric($_SESSION['bestTime'])) {
    $_SESSION['bestTime'] = 0; // Imposta un valore predefinito
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>F1 Start Timer</title>
  <link rel="stylesheet" href="style_reaction_time.css">
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#ffffff">

</head>
<body>

  <div class="f1-lights">
    <div class="back-board"></div>
    <div class="light-strip">
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
    </div>
    <div class="light-strip">
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
    </div>
    <div class="light-strip">
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
    </div>
    <div class="light-strip">
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
    </div>
    <div class="light-strip">
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
      <div class="light"></div>
    </div>
  </div>
  
  <p>Tap/click when you're ready to race, then tap again when the lights go out.</p>
  <div class="results">
    <div class="time">00.000</div>
    <?php echo '<div class="best">Your best: <span>'. $bestTime .'</span></div>';?>
    <div class="credit">Created by <a href="https://twitter.com/jaffathecake">@jaffathecake</a></div>
  </div>
</body>
</html>


<script>
var bestTime = "<?php echo $bestTime; ?>";
console.log("Prima del parsing Best Time: "+ bestTime);

const lights = Array.prototype.slice.call(document.querySelectorAll('.light-strip'));
const time = document.querySelector('.time');
const best = document.querySelector('.best span');

function unformatTime(timeStr) {
  let time = parseFloat(timeStr);
  return Math.round(time * 1000);
}
bestTime = unformatTime(bestTime);
console.log("Dopo del parsing Best Time: "+ bestTime);

let started = false;
let lightsOutTime = 0;
let raf;
let timeout;

function formatTime(time) {
  time = Math.round(time);
  let outputTime = time / 1000;
  if (time < 10000) {
    outputTime = '0' + outputTime;
  }
  while (outputTime.length < 6) {
    outputTime += '0';
  }
  return outputTime;
}

function start() {
  for (const light of lights) {
    light.classList.remove('on');
  }
  
  time.textContent = '00.000';
  time.classList.remove('anim');
  
  lightsOutTime = 0;
  let lightsOn = 0;
  const lightsStart = performance.now();
  
  function frame(now) {
    const toLight = Math.floor((now - lightsStart) / 1000) + 1;
    
    if (toLight > lightsOn) {
      for (const light of lights.slice(0, toLight)) {
        light.classList.add('on');
      }
    }
    
    if (toLight < 5) {
      raf = requestAnimationFrame(frame);
    }
    else {
      const delay = Math.random() * 4000 + 1000;
      timeout = setTimeout(() => {
        for (const light of lights) {
          light.classList.remove('on');
        }
        lightsOutTime = performance.now();
      }, delay);
    }
  }
  
  raf = requestAnimationFrame(frame);
}

function end(timeStamp) {
  cancelAnimationFrame(raf);
  clearTimeout(timeout);
  
  
  if (!lightsOutTime) {
      time.textContent = "Jump start!";
      time.classList.add('anim');
      return;
  }
  else {
    
      const thisTime = timeStamp - lightsOutTime;
      time.textContent = formatTime(thisTime);
      console.log("Tempo ottenuto: "+thisTime)
      
      if (thisTime < bestTime) {
        console.log("Best Time: "+ bestTime + ">" + "Your time: "+ thisTime);
        bestTime = thisTime.toString();
        best.textContent = time.textContent;
        localStorage.setItem('best', bestTime);

        // Invia una richiesta al server per salvare bestTime nel database
        fetch('updateBestTime.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: 'bestTime=' + encodeURIComponent(formatTime(bestTime)),
        })
        .then(response => response.text())
        .then(data => {
          console.log('Success:', data);
        })
        .catch((error) => {
          console.error('Error:', error);
        });
      }
    
    time.classList.add('anim');
  }
}

function tap(event) {
  let timeStamp = performance.now();
  
  if (!started && event.target && event.target.closest && event.target.closest('a')) return;
  event.preventDefault();
  
  if (started) {
    end(timeStamp);
    started = false;
  }
  else {
    start();
    started = true;
  }
}

addEventListener('touchstart', tap, {passive: false});

addEventListener('mousedown', event => {
  if (event.button === 0) tap(event);
}, {passive: false});

addEventListener('keydown', event => {
  if (event.key == ' ') tap(event);
}, {passive: false});


</script>