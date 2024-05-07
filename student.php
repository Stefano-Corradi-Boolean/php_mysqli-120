
<?php

if(session_status() === PHP_SESSION_NONE ){
  session_start();
}

require_once __DIR__ . '/data/conn.php';
require_once __DIR__ . '/data/middleware.php';
checkLoggedIn();

if(isset($_GET['id'])){
  $studentId = $_GET['id'];

  $stmt = $conn->prepare("SELECT * FROM `students` WHERE `id` = ?");
  $stmt->bind_param('i', $studentId);
  $stmt->execute();
  $result = $stmt->get_result();

  $student = $result->fetch_object();

}else{
  header('Location: index.php');
}







require_once __DIR__ . '/views/layouts/head.php';
require_once __DIR__ . '/views/layouts/header.php';

// includo la view
require_once __DIR__ . '/views/pages/student.php';

require_once __DIR__ . '/views/layouts/footer.php'; 