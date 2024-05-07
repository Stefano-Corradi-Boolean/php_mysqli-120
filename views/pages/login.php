<div class="container my-5">

    <h2 id="output">Login</h2>
    <form action="<?php getHref('php_mysqli/login.php') ?>" method="POST">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput2" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="exampleFormControlInput2" placeholder="******">
    </div>

    <div class="mb-3">
      <button class="btn btn-primary ">Invia</button>
    </div>

    </form>
  </div>