<?php
    session_start();

    function checkIfError(){
      if(count($_SESSION["errors"]) > 0){
        printErrors();
      }else{
        printResult();
      }
    }

    function printResult(){
      echo "<div> La noticia ha sido recibida correctamente: </div>";
      echo "<ul>";
      echo "<li>Título: ".$_SESSION["texto"];
      echo "<li>Texto: ".$_SESSION["textarea"];
      echo "<li>Categoría: ".$_SESSION["categoria"];
      echo "<li>Imagen: <a href='";
      echo "img/".$_SESSION["file"]."'>";
      echo $_SESSION["file"];
      echo "</a>";
      echo "</ul>";

    }
    
    function printErrors(){
        echo "<div>No se ha podido realizar la inserción debido a los siguientes errores</div>";
        echo "<ul>";
        foreach ($_SESSION["errors"] as $key => $value) {
            echo "<li> Se requiere el ".$value." de la noticia</li>";
        }
        echo "</ul>";
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Formulario 4 Error</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <h1>Subida de ficheros. Resultados del formulario</h1>
          <h3>Resultado de la inserción de nueva noticia</h3>
          <br>
          <br> <?= checkIfError() ?>
          <div>[<a href="ejercicio4.php">Volver</a>]</div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>