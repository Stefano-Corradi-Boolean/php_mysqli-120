
<?php

if(session_status() === PHP_SESSION_NONE ){
  session_start();
}

require_once __DIR__ . '/data/conn.php';
require_once __DIR__ . '/data/middleware.php';
checkLoggedIn();

$limit = 20;

$stmt = $conn->prepare("SELECT * FROM `students` LIMIT ?");
$stmt->bind_param('i', $limit);
$stmt->execute();
$result = $stmt->get_result();






require_once __DIR__ . '/views/layouts/head.php';
require_once __DIR__ . '/views/layouts/header.php';

// includo la view
require_once __DIR__ . '/views/pages/students.php';

require_once __DIR__ . '/views/layouts/footer.php'; 