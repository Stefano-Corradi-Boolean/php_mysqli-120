
<?php

require_once __DIR__ . '/data/conn.php';

if(session_status() === PHP_SESSION_NONE ){
  session_start();
}

// cancello la sessione
session_destroy();

// reindirizzo all home
header('Location: index.php');





require_once __DIR__ . '/views/layouts/head.php';
require_once __DIR__ . '/views/layouts/header.php';

// includo la view
require_once __DIR__ . '/views/pages/logout.php';

require_once __DIR__ . '/views/layouts/footer.php'; 