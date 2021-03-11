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
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row mb-5">
                <div class="col-md-2"></div>
                <div class="col-md-8 mb-3">
                    <img src="<?php echo $vehicle->imagen_url ?>" class="img-fluid rounded">
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="form-row mt-5">
                <div class="col-md-4 mb-3">
                    <label><b>Modelo</b></label>
                    <input type="text" class="form-control" placeholder="Modelo del vehiculo" name="modeloVehiculo" value="<?php echo $vehicle->modelo ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>Marca</b></label>
                    <input type="text" class="form-control" placeholder="Marca del vehiculo" name="marcaVehiculo" value="<?php echo $vehicle->marca ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>Año</b></label>
                    <input type="text"  class="form-control" placeholder='<?php echo date("Y") ?>' name="annoVehiculo" value="<?php echo $vehicle->anno ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>Precio</b></label>
                    <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php echo $vehicle->precio ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>Kilometros</b></label>
                    <input type="text" class="form-control" name="kilometros" placeholder="Kilometros" value="<?php echo $vehicle->km ?>" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>Color</b></label>
                    <input type="text" class="form-control" name="color" placeholder="Color" value="<?php echo $vehicle->color ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label><b>Contacto Telefono</b></label>
                    <input type="text" class="form-control" name="telefonoContacto" placeholder="Télefono" value="<?php echo $vehicle->contacto_tlf ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label><b>Contacto Email</b></label>
                    <input type="text" class="form-control" name="emailContacto" placeholder="Email" value="<?php echo $vehicle->contacto_email ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label><b>Caracteristicas</b></label>
                    <input type="text" class="form-control" name="caracteristicas" rows="10"  value="<?php echo $vehicle->caracteristicas ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label><b>URL Imagen</b></label>
                    <input type="text" class="form-control" name="imagenURL" placeholder="Inserte URL de la imagen" value="<?php echo $vehicle->imagen_url ?>" required>
                </div>
            </div>
            <div class="form-row mb-5">
                <div class="col-md-2 mb-3">
                    <input type='submit' value='Guardar cambios' class='btn btn-success' name='guardarcambios'>
                </div>
                <div class="col-md-1 mb-3">
                    <input type='submit' value='Volver' class='btn btn-warning' name='volver'>
                </div>
                <div class="col-md-2 mb-3">
                    <input type='submit' value='Eliminar Coche' class='btn btn-danger' name='eliminarcoche'>
                </div>
            </div>
        </form>

        <?php 
        
            if(isset($_POST['guardarcambios'])){
                
                if($_SESSION['type'] === 'admin'){
                    $vehicle = new Vehiculo();
                    $vehicle->modelo = $_POST['modeloVehiculo'];
                    $vehicle->marca = $_POST['marcaVehiculo'];
                    $vehicle->anno = $_POST['annoVehiculo'];
                    $vehicle->precio = $_POST['precio'];
                    $vehicle->kilometros = $_POST['kilometros'];
                    $vehicle->color = $_POST['color'];
                    $vehicle->contacto_tlf = $_POST['telefonoContacto'];
                    $vehicle->contacto_email = $_POST['emailContacto'];
                    $vehicle->caracteristicas = $_POST['caracteristicas'];
                    $vehicle->imagen_url = $_POST['imagenURL'];
                    updateVehicleData($vehicle);
                }
            }

            if(isset($_POST['volver'])){
                header('Location: admin_vehicles.php');
            }

            if(isset($_POST['eliminarcoche'])){
                if($_SESSION['type'] === 'admin'){
                    deleteVehicle($vehicle->id);
                }
                header('Location: admin_vehicles.php');
            }
        ?>

    </div>

  
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>