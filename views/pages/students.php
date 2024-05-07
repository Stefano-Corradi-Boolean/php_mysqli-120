
<div class="container my-5">

    <h2 id="output">Elenco studenti</h2>

    <table class="table stripped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Cognome</th>
      <th scope="col">Matricola</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    if($result && $result->num_rows > 0 ){
      while($row = $result->fetch_object()){ ?>
        <tr>
          <td><?php echo $row->id ?></td>
          <td><?php echo $row->name ?></td>
          <td><?php echo $row->surname ?></td>
          <td><?php echo $row->registration_number ?></td>
          <td><a href="<?php getHref('php_mysqli/student.php' . '?id=' . $row->id) ?>" class="btn btn-warning">Vai</a></td>
        </tr>
    <?php  }
    } ?>
    

    
  </tbody>
</table>

  </div>