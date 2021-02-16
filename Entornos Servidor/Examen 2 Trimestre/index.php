
<?php

    include_once 'configuracion.php';
    include_once 'table.php';
    include_once 'buttons.php';
    $conexion = getPDODatabase();
    global $filtro;
    $filtro[0] = -1;
    $filtro[1] = -1;

    if(isset($_POST['filtrar'])){

        $filtro[0] = $_POST['curso'];
        $filtro[1] = $_POST['letra'];
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Instituto Examen PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="dwes.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
      <div class="container">
        <form method="post">
          <div class="row">
              <h1>Examen. Turno 2</h1>
          </div>
          <div class="row">

            <?php 
                if(isset($_POST['filtrar']) && $_POST['filtrar']){
                    generateTable($conexion,$filtro);
                }else{
                    generateTable($conexion,$filtro);
                }
            ?>
              
          </div>
          <div class="row">
            <p>Curso:</p>

            <?php generateButton($conexion,'Curso'); ?>

            <p>Letra:</p>

            <?php generateButton($conexion,'Letra'); ?>

            <input type="submit" name="filtrar" value="Filtrar por Curso y Letra">

          </div>
        </form>
      </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>