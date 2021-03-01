<?php

  session_start();
  include_once 'funciones.inc.php';


  //Enviar
  if(isset($_POST["enviar"])){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    //echo returnPasswordUser($usuario);

    if(checkUserLogin($password,returnPasswordUser($usuario))){
      setUserSession($usuario,$password);
    }
  }


  //Invitado
  if(isset($_POST["invitado"])){
    setInvitado();
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Aplicacion Web</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body <?php if(isset($_COOKIE ['background'])){setBackground();} ?>>
      <div class="container">
        <div class="row mt-5"></div>

        <form method="post">
          <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-2">
                <h5><label for="usuario">Usuario</label><h5>
              </div>
              <div class="col-md-2">
                <input type="text" name="usuario" placeholder="Usuario">
              </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-4"></div>
              <div class="col-md-2">
                <h5><label for="password">Contraseña</label></h5>
              </div>
              <div class="col-md-2">
                <input type="password" name="password" placeholder="Contraseña">
              </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-6"></div>
            <div class="col-md-2">
              <input type="submit" class="btn btn-primary" value="Iniciar Sesión" name="enviar">
              <input type="submit" class="btn btn-success mt-1" value="Acceder como invitado" name="invitado">
            </div>
          </div>
        </form>
        
      </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>