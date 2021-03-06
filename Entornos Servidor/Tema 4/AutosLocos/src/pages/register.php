<?php

include_once dirname(__DIR__).'/logic/buttons.php';
include_once dirname(__DIR__).'/logic/session.php';
include_once dirname(__DIR__).'/logic/database.php';
include_once 'modules.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Registrarse</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php generateMenu();  ?>

  <div class="container d-flex justify-content-center mt-5">
    <form class="form-horizontal" method="post">
    <fieldset>
        <div id="legend">
            <legend>Crear cuenta</legend>
        </div>
        <div class="control-group">
        <!-- Username -->
            <label class="control-label"  for="username">Usuario</label>
            <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge form-control" value="<?php if(isset($_POST['username'])){ echo $_POST['username'];} ?>">
                <p class="help-block">El nombre de usuario puede contener cualquier letra o número, sin espacios</p>
            </div>
        </div>
        
        <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge form-control" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];} ?>">
                <p class="help-block">Por favor proporcione su correo electrónico</p>
            </div>
        </div>
        
        <div class="control-group">
            <!-- Password-->
            <label class="control-label" for="password">Contraseña</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge form-control" value="<?php if(isset($_POST['password'])){ echo $_POST['password'];} ?>">
                <p class="help-block">La contraseña debe tener al menos 4 caracteres</p>
            </div>
        </div>
        
        <div class="control-group">
            <!-- Password -->
            <label class="control-label"  for="password_confirm">Reintroduce contraseña</label>
            <div class="controls">
                <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge form-control" value="<?php if(isset($_POST['password_confirm'])){ echo $_POST['password_confirm'];} ?>">
                <p class="help-block">Confirme la contraseña</p>
            </div>
        </div>
        
        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success" name="crearcuenta">Registrarse</button>
            </div>
        </div>

        <div class="control-group mt-3">
            <?php if(isset($_POST['crearcuenta'])){
                if(checkRegister()){
                    //echo $_SESSION['username']." ".$_SESSION['password']." ".$_SESSION['email']." ".$_SESSION['type'];
                    header('Location: login.php');
                };
            } ?>
        </div>
    </fieldset>
    </form>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>