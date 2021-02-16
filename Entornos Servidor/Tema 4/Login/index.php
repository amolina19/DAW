<?php
  include_once 'configuracion.php';
 
session_start();
error(3);

global $password;
global $error;
global $button;

if (!isset($_SESSION["contador"])) {
  $_SESSION["contador"] = 0;
} else {
  $_SESSION["contador"]++;
}

if(isset($_POST['registrarse'])){
  header('Location: register.php');
}

if(isset($_POST['nosoyyo'])){
  $_SESSION['usuario'] = null;
  $_SESSION['password'] = null;
}

if(isset($_SESSION['password']) && isset($_POST['usuario'])){
  header('Location: user.php');
}

function error($number){
  $error = $_SESSION['error'];

  if($number == 1){
    $_SESSION['errorText'] = "User or Password not found";
  }else if($number == 2){
    $_SESSION['errorText'] = "Password doesnt Match";
  }else if($number== 3){
    $_SESSION['errorText'] = "";
  }
}

if(isset($_POST["enviar"])){

  if(isset($_SESSION['usuario'])){
    $password = returnPasswordUser($_SESSION['usuario']);
  }else{
    $password = returnPasswordUser($_POST['usuario']);
  }
  
  if($password != false){
    if(verificarPassword($_POST["password"],$password)){
      $_SESSION['password'] = $password;
      $_SESSION['usuario'] = $_POST['usuario'];
      $_SESSION['error'] = 3;
      header("Location: user.php");
      error(3);
    }else{
      error(2);
    }
  }else{
    error(1);
  }
  

  //$isValid = password_verify($_POST["password"],$hash);
}

function noEresTu(){
  if(!isset($_SESSION['usuario'])){
    echo "<div class='row'>";
    echo "<div class='col-md-4'></div>";
    echo "<div class='col-md-4 mt-3'>";
    echo "<input type='text' name='usuario' placeholder='Usuario'>";
    echo "</div></div>";
  }else{
    echo "<div class='row'>";
    echo "<div class='col-md-4'></div>";
    echo "<div class='col-md-4 mt-3'>";
    echo "<p>No eres tu <b>".$_SESSION['usuario']."<b>?</p>";
    echo "<input class='mr-2' type='submit' name='nosoyyo' value='No soy yo'>";
    echo "</div></div>";
  }
}

//IN CASE OF SIGN UP
function hashPassword($password){
  return password_hash($password, PASSWORD_DEFAULT);
}

//FUNCTION CHECK PASSWORD FROM MYSQL AND LOCAL USER HASH
function verificarPassword($password,$hash){
  //$hash = hashPassword($_POST["password"]);
  if(password_verify($password,$hash)){
    return true;
  }
  return false;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
      <form method="post">

          <?php noEresTu(); ?>
          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-3">
              <input type="password" name="password" placeholder="Contraseña">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-1 mt-3">
              <input class="btn btn-primary" type="submit" name="enviar" value="Enviar">
            </div>
            <div class="col-md-1 mt-3">
              <input class="btn btn-success" type="submit" name="registrarse" value="Registrarse">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><p class="error"> <?php echo $_SESSION['errorText'] ?></p> </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <?php echo "Has entrado ".$_SESSION["contador"]." veces " ?> 
            </div>
          </div>
    
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>