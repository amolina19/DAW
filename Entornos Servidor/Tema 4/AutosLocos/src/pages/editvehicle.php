<?php

  include_once dirname(__DIR__).'/logic/session.php';
  include_once dirname(__DIR__).'/logic/buttons.php';
  include_once dirname(__DIR__).'/logic/database.php';
  include_once 'modules.php';

  

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Editar</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php 
    if($_SESSION['type'] === 'admin' && $_SESSION['id'] !== null && $_SESSION['username'] != null && $_SESSION['password'] !== null){
        $vehicle = returnVehicleDataByID($_SESSION['editVehicle']);
        generateAdminMenu();
        //print_r($user);
    
    }else{
    header('Location: index.php');
    }
  ?>

    <div class="container mt-5">
        
        <form method="POST">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label><b>Usuario</b></label>
                <input type="text" class="form-control" placeholder="Usuario" name="username" value="<?php if(isset($user['username'])){ echo $user['username'];} ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if(isset($user['email'])){ echo $user['email'];} ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label><b>Contraseña</b></label>
                <input type="password" class="form-control" placeholder="Contraseña" name="password">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label><b>Tipo</b></label>
                <select class="form-select" name='type'>
                
                    <?php if($user['type'] === 'admin'){
                        echo "<option value='admin' selected>Administrador</option>";
                        echo "<option value='user'>Usuario</option>";
                    }else{
                        echo "<option value='admin'>Administrador</option>";
                        echo "<option value='user'selected >Usuario</option>";
                    }

                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <input type='submit' value='Guardar cambios' class='btn btn-success' name='guardarcambios'>
            </div>
            <div class="col-md-1 mb-3">
                <input type='submit' value='Volver' class='btn btn-warning' name='volver'>
            </div>
            <div class="col-md-2 mb-3">
                <input type='submit' value='Eliminar usuario' class='btn btn-danger' name='eliminarusuario'>
            </div>
        </div>
        </form>

        <?php 
        
            if(isset($_POST['guardarcambios'])){
                updateUserData();
            }

            if(isset($_POST['volver'])){
                header('Location: admin_vehicles.php');
            }

            if(isset($_POST['eliminarusuario'])){
                deleteUser($user['id']);
            }
        ?>

    </div>

  
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>