<!DOCTYPE html>
<html>
    <head>
        <title>login.formula1forfun</title>
        <link rel="stylesheet" href="formula.css">
    </head>
    <body>
        <div class="sfondo"></div>
        <div class = "box">
            <a href="index.html">
                <img src="media/logo.png" alt="logo">
            </a>
            <form>
                <?php
                    // Stabilisci la connessione al database
                    $conn = new mysqli('localhost', 'root', '', 'statistiche');

                    // Controlla se la connessione è riuscita
                    if ($conn->connect_error) {
                        die("Connessione fallita: " . $conn->connect_error);
                    }

                    // Esegui la query SQL
                    $sql = "SELECT cognome, posizione, gare, vittorie, podi, fastLap, mediaGriglia, mediaFinale FROM fanta ORDER BY posizione";                    $result = $conn->query($sql);

                    // Stampa i risultati
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            // Puoi utilizzare questi dati come preferisci
                            $cognome = $row["cognome"];
                            $posizione = $row["posizione"];
                            $gare = $row["gare"];
                            $vittorie = $row["vittorie"];
                            $podi = $row["podi"];
                            $fastLap = $row["fastLap"];
                            $mediaGriglia = $row["mediaGriglia"];
                            $mediaFinale = $row["mediaFinale"];

                            //Valori per la formula
                            $winstart = $vittorie / $gare;
                            $podigare = $podi / $gare;
                            $fastpergara = $fastLap / $gare;
                            $mediaGrigliaPerc = 1 / $mediaGriglia;
                            $mediaFinalePerc = 1 / $mediaFinale;

                            //Scala
                            $moltiplicatore = 0;
                            if($posizione <= 7)$moltiplicatore = 5000;
                            else if($posizione > 7 && $posizione <= 10)$moltiplicatore = 4000;
                            else if($posizione > 10 && $posizione <= 15)$moltiplicatore = 3000;
                            else if($posizione > 15 && $posizione <= 20)$moltiplicatore = 2000;

                            // Esegui un calcolo
                            $risultato = ( 1 + ($winstart * 0.15 + $podigare * 0.10 + $fastpergara * 0.15 + $mediaGrigliaPerc * 0.30 + $mediaFinalePerc * 0.30) ) * $moltiplicatore ;

                            //Arrotondo il risultato finale
                            $risultato = ceil($risultato / 100) * 100;

                            echo "<p class='risultato'>" . $cognome . ": " . $risultato . "</p>";                        }
                    } else {
                        echo "0 risultati";
                    }

                   // Esegui la query SQL sulla tabella scuderia
                    $sql = "SELECT nome, position, prezzoP1, prezzoP2 FROM scuderie ORDER BY position";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        // Print out the error message
                        echo "Error: " . $conn->error;
                    } else {
                        echo "<div class='grid-container'>";

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $nome = $row["nome"];
                                $position = $row["position"];
                                $prezzoP1 = $row["prezzoP1"];
                                $prezzoP2 = $row["prezzoP2"];

                                //Formula per prezzi scuderie
                                $solution = ($prezzoP1 + $prezzoP2) / 2;
                                $solution = ceil($solution /100) * 100;

                                echo "<div class='grid-item'>";
                                echo "<p class='risultato'>" . $nome . ": " . $solution . "</p>";
                                echo "<div class='piloti'>";
                                echo "<p>Pilota 1: " . $prezzoP1 . "</p>";
                                echo "<p>Pilota 2: " . $prezzoP2 . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "0 results";
                        }

                        echo "</div>";
                    }

                    // Chiudi la connessione
                    $conn->close();
                ?>
            </form>
        </div>
    </body>
</html>