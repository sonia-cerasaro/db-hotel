<?php
  include_once __DIR__.'../db.php';  //collega il codice che sta nel file db.php

  header('Content-Type: application/json');  //dice che i dati che stanno per tornare
                                             //sono di tipo json

  if (!empty($_GET) && $_GET['id']) {        //se ci arriva solo un query parameter ($_GET)
                                            //e facciamo la selezione di una precisa riga in questo caso id
    $id = $_GET['id'];
    $result = [];

    $statmt = $conn->prepare("SELECT * FROM stanze WHERE id = ?"); //facciamo la richiesta al database. id = ? verra' sostituito con l'id che verra' selezionato
    $statmt->bind_param("i", $id);                                 //sta a specificare il tipo del valore di $id(in questo caso e' un intero INT -i-)

      $statmt->execute();                                            //esegue il codice SQL
      $rows = $statmt->get_result();                                 //salva i risultati in una variabile
      while($row = $rows->fetch_assoc()) {                           // cicla i risultati e li trasforma in array associativi
        $result[] = $row;                                            //push dell'array associativo in un array di risultati
    }
  }

  echo json_encode([                      //questo pezzo di codice e' collegato all'If di sopra
    "response" => $result,                //serve per mostrare il risultato codificato in json
    "success" => true,                    //senza di questo axios di Vue non capirebbe
  ]);

} else {                                  //se invece ci arrivano query parameter diversi da ID
  $sql = "SELECT * FROM stanze";          //creiamo un sequel che eseguira' un azione
  $rows = $conn->query($sql);             //simile a quello di sopra

  $result = [];

  if ($rows && &rows->num_rows > 0) {          //se la query ha funzionato e quindi ci sono piu' di 0 row
    while($row = $rows->fetch_assoc()) {       //cicliamo queste row e per ogni riga la trasformiamo in array associativo
      $result[] = $row;                        //e la pushamo in un array di risultati (come sopra)
    }
  }

  echo json_encode([
    "response" => $result,
    "success" => true,
  ]);
  }

  $conn->close();                              //chiudo la connessione con db
 ?>
