<?php

  include_once dirname(__DIR__).'/logic/buttons.php';
  include_once 'modules.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
  </head>
  <body>

    <?php generateMenu();  ?>
  
    <div class="container mt-5">

          <form method="post">
          <fieldset>
          <div id="legend">
            <legend>Iniciar Sesión</legend>
          </div>

            <div class="form-group">

              <?php
              
                if(noErasTu()){
                  echo "<div>No eras tu <b> ".$_COOKIE['username']."?</b></div>";
                }
              ?>
              <label for="user">Usuario</label>
              <input type="text" class="form-control" id="user" placeholder="Usuario" name="username" value="<?php  if(isset($_POST['username'])){ echo $_POST['username'];} ?>">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];} ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="iniciarsesion">Iniciar Sesion</button>
            <button type="submit" class="btn btn-success" name="registrarse">Crear cuenta</button>

            </fieldset>
          </form>

          <div class="row d-flex justify-content-center mt-2">
            <!-- No se puede meter en buttons, ya que si hay algun error, se tiene que avisar al usuario -->
            <?php if(isset($_POST['iniciarsesion'])){

                if(login($_POST['username'],$_POST['password'])){
                  setUserSession($_POST['username']);
                  header("Location: index.php");
                }else{
                  echo "<span class='error'>Usuario o contraseña incorrectos</span>";
                }
                
            } ?>
          </div>
    </div>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>