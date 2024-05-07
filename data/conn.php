<?php


// CONNESSIONE AL DATABASE ///////////////////////////////
// definiamo le constanti di autenticazione
define('DB_SERVERNAME', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db_university');

// inizializzo una connessione
try{
  // verifico la connessione avvenuta
  $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
  
}catch(Exception $e){
  // reindirizzo a una pagine di errore ... ecc 
  echo "<h1>ERROR 500! " . $e->getMessage() ." </h1>";
  // oppure blocco tutto
  die();
}

