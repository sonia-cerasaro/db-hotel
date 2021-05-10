<!-- uso il file db.php per creare
la connessione con il database.
Questo file interagisce con stanze.php attraverso include_once
In ogni variabile inserisco il valore chiave per potervi accedere
 -->
 <?php

  $servername = "localhost";
  $username = "DEVI GUARDARE QUAL'e'!";
  $password = "SAME AS ABOVE";
  $dbname = "db_hotel";

  // Connetto le variabili al database
  // (come se tutte insieme creassero una chiave per avere accesso ad db)
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Controlla la connessione. Se riuscita ho accesso al db,
  // se fallisce, uscira' la scritta connection failed
  if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
  }

  ?>
