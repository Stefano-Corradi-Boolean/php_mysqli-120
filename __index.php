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


// salvo inuna variabie la stringa della query
$sql = "SELECT * FROM `students` LIMIT 10";
// salvo il risultato della query in una variabile
// il metodo query() esegue la query e restituisce il risultato
$result = $conn->query($sql);
var_dump($result);
// salvo tutti i risultati in una array
//$array_students = $result->fetch_all();
//var_dump($array_students);

//$result->fetch_assoc() prendo il primo elemento, lo trasforma in array associativo, e lo toglie dalla lista
//var_dump($result->fetch_assoc());
// stampo tuti lgi elementi fino a che la lista è vuota
// if($result && $result->num_rows > 0 ){
//   while($row = $result->fetch_assoc()){
//     var_dump($row['name']);
//     var_dump($row['surname']);
//     var_dump('---------------');
//   }
// }

// stessa logica ma con fetch_object() salvando quindi il dato non in una array associativo ma un un array di oggetti
if($result && $result->num_rows > 0 ){
  while($row = $result->fetch_object()){
    var_dump($row->name);
    var_dump($row->surname);
    var_dump('---------------');
  }
}
var_dump('=============================');


if(isset($_GET['name'])){
  $name = $_GET['name'];
  // modalità pericolosa
  // $sql = "SELECT * FROM `students` WHERE `name` = '" . $name . "';";
  // $result = $conn->query($sql);

  // modalità sicura
  // il ? è un marcatore che viene utilizzato per contrllare la validità del dato
  $stmt = $conn->prepare("SELECT * FROM `students` WHERE `name` = ?");
  // 's' sta a indicare che la variabile $name, che andrà a sostituire il ? deve essere una stringa
  $stmt->bind_param('s', $name);
  // una volta controllata la validità dei dati esegueo la quesry
  $stmt->execute();
  // salvo il risultato della query in una variabile
  $result = $stmt->get_result();

  if($result && $result->num_rows > 0 ){
    while($row = $result->fetch_object()){
      var_dump($row->id);
      var_dump($row->name);
      var_dump($row->surname);
      var_dump('---------------');
    }
  }
}







// dopo aver aperto la connessione ed eseguite le query bisogna sempre chiuserla
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css' integrity='sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==' crossorigin='anonymous'/>
  <link rel="stylesheet" href="css/style.css">
  <title>PHP + DB</title>

</head>
<body>
  <div class="container my-5">
    <h1>PHP + DB</h1>
    <h2 id="output"></h2>
  </div>
  



  <script src="js/script.js"></script>
</body>
</html>