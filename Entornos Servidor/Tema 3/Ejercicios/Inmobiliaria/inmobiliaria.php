<?php

    include_once 'configuracion.php';
    include_once 'updateTable.php';
    include_once 'generateCategoria.php';
    include_once 'generateTable.php';
    include_once 'generateBtn.php';
    include_once 'lib/fecha.php';
    include_once 'insertar.php';

    $conexion = getPDODatabase();
    $rows = 0;   
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Inmobiliaria</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <form method="post" action="inmobiliaria.php">
            <div class="row">
                <h5>Actualziar datos por categoría</h5>
                <?php generateCategoria($conexion); ?>
                <div class="ml-3"><input type="submit" value="Actualizar" name="actualizar"></div>
            </div>
            <div class="row">
                <?php 
                    if(isset($_POST['actualizar']) && $_POST['actualizar']){
                        $checked = $_POST['borrar'];
                        $category = $_POST['categoria'];
                        $rows = updateTable($conexion,$category);
                    }else{
                        $rows = updateTable($conexion,"Todas");
                    }
                ?>
            </div>
            <?php generateBtn($rows) ?>
            <?php 
                if($_POST['insertar']){
                    //echo "generated";
                    generateFormulario();
                } 
            ?>
        </form>
    </div>
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>