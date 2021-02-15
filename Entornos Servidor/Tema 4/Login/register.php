<?php

    include_once 'configuracion.php';
    $_SESSION['test'] = 0;
    $_SESSION['error'] = null;

    if(isset($_POST['registrarse'])){
        check();
    }

    function check(){

        $conn = getPDODatabase();
        $exists = userExists($conn);
       
        if($exists == true){
            error();
        }else{
            $_SESSION['error'] = null;
            registerUser($conn);
        }
    }

    function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function userExists($conn){
        $user = $_POST['usuario'];
        $sql = "SELECT user FROM user WHERE user like '$user'";
        foreach($conn->query($sql) as $row){
            if($row['user'] == $user){
                return true;
            }
        }
        return false;
    }

    function registerUser($conn){

        $password = hashPassword($_POST['password']);
        try{
            $gsent = $conn->prepare("INSERT INTO user (user, password) VALUES(:user,:password)");
            //$gsent->bindParam(":id", $id);
            $gsent->bindParam(":user", $_POST['usuario']);
            $gsent->bindParam(":password", $password);
            
            if($gsent->execute()){
                echo "Se ha insertado un nuevo elemento";
            }
        }catch(PDOException $e){
            die("Connection to database failed: " . $e->getMessage());
            echo "Connection to database failed:".$e->getMessage();
        }
    }

    function error(){
        $_SESSION["error"] = "<div class='row'>"."<div class='col-md-4'></div>"."<div class='col-md-2'><p class='error'> USER EXISTS</p></div></div>";
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <form method="post">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-2">
            <p>Usuario</p>
          </div>

          <div class="col-md-2">
            <input type="text" name="usuario" placeholder="Usuario">
          </div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <p>Contraseña</p>
            </div>
            <div class="col-md-2">
                <input type="password" name="password" placeholder="Contraseña">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <input type="submit" name="registrarse" value="Registrarse" class="btn btn-primary">
            </div>
        </div>
    </form>
      
  </div>

  <?php echo $_SESSION["error"] ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>