<?php

include_once dirname(__DIR__).'/logic/session.php';
include_once dirname(__DIR__).'/logic/buttons.php';
include_once dirname(__DIR__).'/logic/database.php';
include_once 'modules.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Informacion </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <?php 
        generateMenu();
        $vehicle = returnVehicleDataByID($_SESSION['info']);
        $_SESSION['reservado'] = $vehicle->reservado;
        $_SESSION['usuario_reserva'] = $vehicle->usuario_reserva;
    ?>

    <div class="container mt-5">
        <div class="form-row mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8 mb-3">
                <img src="<?php echo $vehicle->imagen_url ?>" class="img-fluid rounded">
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="form-row mt-5">
            <div class="col-md-1 mb-3"></div>
            <div class="col-md-1 mb-3">
                <label><b>Modelo</b></label>
                <div><?php echo $vehicle->modelo ?></div>
            </div>
            <div class="col-md-1 mb-3">
                <label><b>Marca</b></label>
                <div><?php echo $vehicle->marca ?></div>
            </div>
            <div class="col-md-1 mb-3">
                <label><b>Año</b></label>
                <div><?php echo $vehicle->anno ?></div>
            </div>
            <div class="col-md-1 mb-3">
                <label><b>Precio</b></label>
                <div><?php echo $vehicle->precio ?>€</div>
            </div>
            <div class="col-md-1 mb-3">
                <label><b>Kilometros</b></label>
                <div><?php echo $vehicle->modelo ?></div>
            </div>
            <div class="col-md-1 mb-3">
                <label><b>Color</b></label>
                <div><?php echo $vehicle->color ?></div>
            </div>
            <div class="col-md-2 mb-3">
                <label><b>Contacto Telefono</b></label>
                <div><?php echo $vehicle->contacto_tlf ?></div>
            </div>
            <div class="col-md-2 mb-3">
                <label><b>Contacto Email</b></label>
                <div><?php echo $vehicle->contacto_email ?></div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-1 mb-3"></div>
            <div class="col-md-2 mb-3">
                <h4><b>Caracteristicas</b></h4>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-1 mb-3"></div>
            <div class="col-md-11 mb-3">
                <p><?php echo $vehicle->caracteristicas ?></p>
            </div>
        </div>
        <div class="form-row mb-5">
            <div class="col-md-1 mb-3"></div>
            <div class="col-md-2 mb-3">

                <?php info($vehicle); ?>
                
            </div>
        </div>
    </div>
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>