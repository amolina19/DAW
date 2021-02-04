<?php

    include_once 'configuracion.php';

    $conexion = getPDODatabase();

    function generateTable($conn){

        $output = "<table>";
        $sql = 'SELECT titulo,texto,fecha,imagen FROM noticias';
        echo "<table>";
        echo "<tr><th>Titulo</th><th>Texto</th><th>Fecha</th><th>Imagen</th></tr>";
        foreach ($conn->query($sql) as $row) {
            echo "<tr>";
            echo "<td>".$row['titulo']."</td>";
            echo "<td>".$row['texto']."</td>";
            echo "<td id='fecha'>".$row['fecha']."</td>";
            echo "<td>".$row['imagen']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    function generateCategoria($conn){
        echo "<select name='categoria' id='categoria' class='ml-2 mb-2'>";
        //SHOW COLUMnS FROM noticias LIKE 'categoria';
        $sql = 'SELECT DISTINCT categoria from noticias';
        foreach ($conn->query($sql) as $row) {
            $cat = $row['categoria'];
            echo "<option value='$cat'>".$cat."</option>";
        }
        echo "</select>";
    }

    function updateTable($conn,$categoria){

        if($categoria == 'none'){
            $sql = "SELECT titulo,texto,fecha,imagen,categoria FROM noticias";
        }else{
            $sql = "SELECT titulo,texto,fecha,imagen,categoria FROM noticias WHERE categoria LIKE '$categoria'";
        }
        $output = "<table>";
        
        echo "<table>";
        echo "<tr><th>Titulo</th><th>Texto</th><th>Fecha</th><th>Imagen</th></tr>";
        foreach ($conn->query($sql) as $row) {
            echo "<tr>";
            echo "<td>".$row['titulo']."</td>";
            echo "<td>".$row['texto']."</td>";
            echo "<td id='fecha'>".$row['fecha']."</td>";
            echo "<td>".$row['imagen']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
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
                        $category = $_POST['categoria'];
                        updateTable($conexion,$category);
                    }else{
                        updateTable($conexion,"none");
                    }
                ?>
            </div>
        </form>
    </div>
      

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>