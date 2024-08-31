<script>
    
var countdownElement = document.getElementById('countdown');

// Funzione per ottenere la prossima gara dal database
function getNextRace() {
    console.log("Questo è un messaggio di test");
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getNextRace.php", true);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Imposta la nuova data di destinazione
            data = this.responseText;
            console.log(data);
            targetDate = data;
            console.log(targetDate);
        }
    };
    xhr.send();
}

// Imposta la data di destinazione
var targetDate;
getNextRace(); // Ottieni la prossima gara all'inizio
console.log("Questo è un messaggio di test 1");
alert("ocndsofndsojbfdso");
var countdownId = setInterval(function() {
    var now = new Date().getTime();
    var timeLeft = targetDate - now;

    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    countdownElement.textContent = days + " : " + hours + " : " + minutes + " : " + seconds;

    if (timeLeft < 0) {
        // Controlla se sono passati tre giorni dalla gara
        var threeDaysAfter = new Date(targetDate.getTime());
        threeDaysAfter.setDate(threeDaysAfter.getDate() + 3);

        if (now >= threeDaysAfter) {
            <?php
                // First, select the ID of the row with the earliest date
                $sql = "SELECT ID FROM nextGare ORDER BY Data LIMIT 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Fetch the ID
                    $row = $result->fetch_assoc();
                    $id = $row['ID'];

                    // Now, delete the row with the fetched ID
                    $sql = "DELETE FROM nextGare WHERE ID = $id";
                    $conn->query($sql);
                }
            ?>
            getNextRace(); // Ottieni la prossima gara
        } else {
            countdownElement.textContent = "La gara è iniziata!";
        }
    }
}, 1000);
</script>
