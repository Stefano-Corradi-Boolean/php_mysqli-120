
<?php

require_once __DIR__ . '/data/conn.php';

// apro la sessione solo se la sessione non è già aperta
if(session_status() === PHP_SESSION_NONE ){
  session_start();
}


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$md5Psw = md5($password);


$stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
$stmt->bind_param('ss', $email, $md5Psw);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_object();

// se l'utente esiste lo salvo in sessione
if($user){
  $_SESSION['userID'] = $user->id;
  $_SESSION['userEmail'] = $user->email;
  header('Location: index.php');
}




require_once __DIR__ . '/views/layouts/head.php';
require_once __DIR__ . '/views/layouts/header.php';

// includo la view
require_once __DIR__ . '/views/pages/login.php';

require_once __DIR__ . '/views/layouts/footer.php'; 

$conn->close();