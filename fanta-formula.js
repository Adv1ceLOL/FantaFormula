
// Seleziona il bottone per chiudere il popup
var popupClose = document.getElementById('popup-close');

// Aggiungi un event listener per chiudere il popup
popupClose.addEventListener('click', function() {
    popup.style.display = 'none';
});

// Inizializza i contatori di piloti e scuderia
var counters = {
    piloti: 0,
    scuderia: 0
};

function handleClick(button, counterName, maxCount, counters) {
    var popup = document.getElementById('popup');
    var popupText = document.getElementById('popup-text');
    var price = Number(button.getAttribute('data-price'));
    var totalElement = document.getElementById('total');
    var totalText = totalElement.textContent;
    var total = Number(totalText.replace(/[^0-9.-]+/g,""));
    var choicesElement = document.getElementById('scelte');
    var parentDiv = button.parentElement;

    if (parentDiv.classList.contains('disabled')) {
        total += price;
        counters[counterName]--;
        parentDiv.classList.remove('disabled');
        parentDiv.classList.remove('clicked');
    } else {
        if (price > total) {
            popupText.textContent = "Non hai abbastanza budget per questo acquisto!";
            popup.style.display = 'block';
            return false;
        }
        if (counters[counterName] >= maxCount) {
            popupText.textContent = "Non puoi scegliere più di " + maxCount + " " + counterName + "!";
            popup.style.display = 'block';
            return false;
        }
        total -= price;
        parentDiv.classList.add('disabled');
        parentDiv.classList.add('clicked');
        counters[counterName]++;
    }

    totalElement.textContent = "Budget disponibile: " + total + " $";
    choicesElement.textContent = "Piloti: " + counters.piloti + "/2, Scuderia: " + counters.scuderia + "/1";
    return true;
}


var scuderia = null;
var pilota1 = null;
var pilota2 = null;

document.querySelectorAll('.botton_costo_scuderia').forEach(function(button) {
    button.addEventListener('click', function() {
        handleClick(button, 'scuderia', 1, counters);
        scuderia = this.value; // Salva il valore del pulsante
        console.log(scuderia); // Stampa il valore del pulsante per verificare che sia corretto
    });
});

document.querySelectorAll('.botton_costo_pilota').forEach(function(button) {
    button.addEventListener('click', function() {
        var success = handleClick(button, 'piloti', 2, counters);
        if (success) {
            var value = this.value;

            if (pilota1 === value) {
                pilota1 = null;
            } else if (pilota2 === value) {
                pilota2 = null;
            } else if (pilota1 === null) {
                pilota1 = value;
            } else if (pilota2 === null) {
                pilota2 = value;
            }
        }
    });
});

$('.button-squad').on('click', function(e) {
    e.preventDefault();
    //! Controllo partita gia iniziata
    var targetDate;
    // Funzione per ottenere la prossima gara dal database
    function getNextRace() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "getNextRace.php", false); // Imposta il terzo parametro su false per rendere la chiamata sincrona
        xhr.send();

        if (xhr.status == 200) {
            targetDate = xhr.responseText;
        }
    }
    getNextRace();

    var now = new Date().getTime();
    var targetDateTimestamp = new Date(targetDate).getTime();
    var timeLeft = targetDateTimestamp - now;
    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);


    
    confermaSquadra(scuderia, pilota1, pilota2, counters, targetDate, timeLeft);
});
// Ore buttate 12 h
function ajaxFunction(scuderia, pilota1, pilota2) {
    $.ajax({
        type: 'POST',
        url: 'salva.php',
        data: { 
            scuderia: scuderia,
            pilota1: pilota1,
            pilota2: pilota2
        },
        success: function(response) {
            //response = JSON.parse(response.replaceAll(/\s*<.*/gs,""));
            
            // Pulisci la risposta rimuovendo tutto dopo il primo carattere di chiusura graffa
            //var cleanResponse = response.substring(0, response.indexOf('}') + 1);

            //console.log('Clean server response:', cleanResponse);

            if (response.error) {
                var popup = document.getElementById('popup1');
                var popupText = document.getElementById('popup1-text');
                //alert('PopUpText: ' + popupText);
                popupText.textContent = response.error;
                popup.style.display = 'block';
            } else {
                // Gestisci il caso di successo qui
                window.location.href = "pagina_personale.php";
            }
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX error: Status', jqXHR.status, 'Status Text', jqXHR.statusText, 'Error Thrown', errorThrown, 'Text Status', textStatus);
        
            if (errorThrown instanceof SyntaxError) {
                console.log('Errore di sintassi nei dati. Verifica che l\'URL e i dati inviati siano corretti.');
            } else if (jqXHR.status === 0) {
                console.log('La richiesta AJAX è stata interrotta o ha incontrato un problema di CORS.');
            } else {
                console.log('Si è verificato un errore non gestito specificamente. Controlla i log per maggiori dettagli.');
            }
        }
    });
}

function confermaSquadra(scuderia, pilota1, pilota2, counters, targetDate, timeLeft) {
    var popup = document.getElementById('popup');
    var popupText = document.getElementById('popup-text');

    // Validate selections
    if (!scuderia || !pilota1 || !pilota2 || counters.scuderia != 1 || counters.piloti != 2) {
        popupText.textContent = 'Per favore, completa tutti i campi.';
        popup.style.display = 'block';
        return;
    }

    // Check if the selection is made after the race has started
    if (timeLeft < 0) {
        var now = new Date().getTime();
        var threeDaysAfter = new Date(targetDate);
        threeDaysAfter.setDate(threeDaysAfter.getDate() + 3);

        if (now < threeDaysAfter.getTime()) {
            popup = document.getElementById('popup1');
            popupText = document.getElementById('popup1-text');
            popupText.textContent = 'Non puoi cambiare la squadra se la partita è iniziata.';
            popup.style.display = 'block';
            return;
        }
    }
    ajaxFunction(scuderia, pilota1, pilota2);
    
}

// Export the functions for use in other parts of the application
module.exports = {
    handleClick,
    confermaSquadra
};

