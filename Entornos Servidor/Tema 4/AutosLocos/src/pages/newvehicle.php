<?php

include_once 'modules.php';
include_once dirname(__DIR__).'/logic/session.php';
include_once dirname(__DIR__).'/logic/buttons.php';
include_once dirname(__DIR__).'/logic/database.php';


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Añadir Vehiculo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php if($_SESSION['type'] === 'admin'){
      generateAdminMenu();
  }else{
      header('Location: index.php');
  } ?>

  <div class="container mt-5">
      
    <form method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label><b>Modelo</b></label>
            <input type="text" class="form-control" placeholder="Modelo del vehiculo" name="modeloVehiculo" value="<?php if(isset($_POST['modeloVehiculo'])){ echo $_POST['modeloVehiculo'];} ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label><b>Marca</b></label>
            <input type="text" class="form-control" placeholder="Marca del vehiculo" name="marcaVehiculo" value="<?php if(isset($_POST['marcaVehiculo'])){ echo $_POST['marcaVehiculo'];} ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label><b>Año</b></label>
            <input type="text"  class="form-control" placeholder='<?php echo date("Y") ?>' name="annoVehiculo" value="<?php if(isset($_POST['annoVehiculo'])){ echo $_POST['annoVehiculo'];} ?>" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label><b>Precio</b></label>
            <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php if(isset($_POST['precio'])){ echo $_POST['precio'];} ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label><b>Kilometros</b></label>
            <input type="text" class="form-control" name="kilometros" placeholder="Kilometros" value="<?php if(isset($_POST['kilometros'])){ echo $_POST['kilometros'];} ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label><b>Color</b></label>
            <input type="text" class="form-control" name="color" placeholder="Color" value="<?php if(isset($_POST['color'])){ echo $_POST['color'];} ?>" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label><b>Contacto Telefono</b></label>
            <input type="text" class="form-control" name="telefonoContacto" placeholder="Télefono" value="<?php if(isset($_POST['telefonoContacto'])){ echo $_POST['telefonoContacto'];} ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label><b>Contacto Email</b></label>
            <input type="text" class="form-control" name="emailContacto" placeholder="Email" value="<?php if(isset($_POST['emailContacto'])){ echo $_POST['emailContacto'];} ?>" required>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label><b>Caracteristicas</b></label>
            <textarea class="form-control" name="caracteristicas"></textarea>
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label><b>URL Imagen</b></label>
            <input type="text" class="form-control" name="imagenURL" placeholder="Inserte URL de la imagen" value="<?php if(isset($_POST['imagenURL'])){ echo $_POST['imagenURL'];} ?>" required>
        </div>
    </div>
    <button class="btn btn-primary mb-5" type="submit" name="addnewvehicle">Añadir Vehiculo</button>
    </form>

    <?php if(isset($_POST['addnewvehicle'])){

        if(!isset($_POST['modeloVehiculo']) && !isset($_POST['marcaVehiculo']) && !isset($_POST['annoVehiculo']) && !isset($_POST['precio']) && !isset($_POST['kilometros']) && !isset($_POST['color']) && !isset($_POST['telefonoContacto']) && !isset($_POST['emailContacto']) && !isset($_POST['caracteristicas']) && !isset($_FILES['imagenURL'])){
            echo "<span class='error'>Te faltan campos por rellenar</span>";
        }else{
            $vehiculo = new Vehiculo();
            $vehiculo->setReservado(intval(false));
            $vehiculo->setUsuarioReserva(null);
            $vehiculo->setDiaReservado(null);
            $vehiculo->setMarca($_POST['marcaVehiculo']);
            $vehiculo->setModelo($_POST['modeloVehiculo']);
            $vehiculo->setAnno($_POST['annoVehiculo']);
            $vehiculo->setImagenURL($_POST['imagenURL']);
            $vehiculo->setPrecio($_POST['precio']);
            $vehiculo->setKm($_POST['kilometros']);
            $vehiculo->setColor($_POST['color']);
            $vehiculo->setContactoTelefono($_POST['telefonoContacto']);
            $vehiculo->setContactoEmail($_POST['emailContacto']);
            $vehiculo->setCaracteristicas($_POST['caracteristicas']);

            //$image = file_get_contents($_FILES['imagenVehiculo']['tmp_name']);
            //$fileName = $_FILES["imagenVehiculo"]['name'];
            //$vehiculo->setImagen($image);
            insertVehicle($vehiculo);
            header('Location: admin_vehicles.php');
        }
            
    } ?>
  </div>
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>