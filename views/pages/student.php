<div class="container my-5">

    <h2 id="output"><?php echo $student->name ?> <?php echo $student->surname ?></h2>
    <ul>
      <li>Matricola: <?php echo $student->registration_number ?></li>
      <li>CF: <?php echo $student->fiscal_code ?></li>
      <li>Data di nascita: <?php echo $student->date_of_birth ?></li>
    </ul>

    <a href="<?php getHref('php_mysqli/students.php') ?>" class="btn btn-warning">Torna</a>
  </div>