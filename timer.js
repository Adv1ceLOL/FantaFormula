// JavaScript
var countdownElement = document.getElementById('countdown');

// Imposta la data di destinazione
var targetDate = new Date("2024-05-03T18:30:00").getTime();

var countdownId = setInterval(function() {
    var now = new Date().getTime();
    var timeLeft = targetDate - now;

    var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    countdownElement.textContent = days + " : " + hours + " : " + minutes + " : " + seconds;

    if (timeLeft < 0) {
        clearInterval(countdownId);
        countdownElement.textContent = "La gara è iniziata!";
    }
}, 1000);