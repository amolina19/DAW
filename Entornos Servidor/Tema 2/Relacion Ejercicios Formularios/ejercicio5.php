<?php
    $action = "";
    $error = "";
    if(isset($_POST["enviar"])){
        if(empty($_POST["textobuscar"])){
            $error = "¡Debe introducir el texto de busqueda!";
        }else{
            $action = "action='ejercicio1-resultados.php'";
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ejercicio 5 Formulario</title>

    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
        <div class="container">
            <h1>Formulario Simple</h1>
            <h3>Búsqueda de canciones </h3>

            <form method="post" <?php echo $action ?>>
                <div class="row" id="border">
                    <div class="col-md-4 mb-4 mt-4">
                        <p>Texto a buscar: </p>
                        <p id="error"> <?php echo $error ?></p>
                        <p>Buscar en: </p>
                        <p>Género musical: </p>
                        <input type="submit" value="Buscar" name="enviar">
                    </div>

                    <div class="col-md-8 mt-4">
                    
                            <input type="text" name="textobuscar" size="40" class="mb-4">
                            <div class="row ">
                                <input class="mr-2" type="radio" name="radiocheck" value="Titulo cancion">Titulos de canción
                                <input class="mr-2" type="radio" name="radiocheck" value="Nombre album">Nombres de albúm
                                <input class="mr-2" type="radio" name="radiocheck" value="Ambos campos">Ambos campos
                            </div>
                            <select name="genero" class="mt-2">
                                <option value="Todos">Todos</option>
                                <option value="Acustica">Acústica</option>
                                <option value="Banda Sonora">Banda Sonora</option>
                                <option value="Blues">Blues</option>
                                <option value="Electronica">Electrónica</option>
                                <option value="Folk">Folk</option>
                                <option value="Jazz">Jazz</option>
                                <option value="New Age">New Age</option>
                                <option value="Pop">Pop</option>
                                <option value="Rock">Rock</option>
                            </select>
                    </div>
                </div>
            </form>
        </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>