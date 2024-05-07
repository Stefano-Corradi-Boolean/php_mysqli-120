<?php

require_once __DIR__ . '/../../data/conn.php';

if(session_status() === PHP_SESSION_NONE ){
  session_start();
}

$logged = false;
if(isset($_SESSION['userID'])){
  $logged = true;
}


function getHref($uri){
  $scheme = $_SERVER['REQUEST_SCHEME'];
  $host = $_SERVER['HTTP_HOST'];
  echo "$scheme://$host/$uri";
}
?>


<body>

<header>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="<?php getHref('php_mysqli/index.php') ?>">Home</a>
          </li>
          <?php if($logged): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php getHref('php_mysqli/students.php') ?>">Elenco Studenti</a>
            </li>
            <?php endif; ?>
            <?php if(!$logged): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php getHref('php_mysqli/login.php') ?>">Login</a>
              </li>
          <?php endif; ?>
          <?php if($logged): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php getHref('php_mysqli/logout.php') ?>">Logout</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

</header>

