

<?php

    $texto = $_POST["textobuscar"];
    $radiobutton = $_POST["radiocheck"];
    $select = $_POST["genero"];
    
    echo($texto);
    /*
    echo($radiobutton);
    $echo($select);
    */
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ejercicio 1 Formulario</title>

    <style>
        h1{
            color:blue;
            font-weight: bold;
        }
        h3{
            font-style: italic;
            font-weight: bold;
        }
        p{
            font-weight: bold;
        }
        #border{
            border: 1px dotted blue;
            width: 100%;
        }
    </style>
  </head>
  <body>
        <div class="container">
            <h1>Formulario Simple</h1>
            <h3>Búsqueda de canciones </h3>

            <div class="row" id="border">
                <div class="col-md-4 mb-4 mt-4">
                    <p>Texto a buscar: </p>
                    <p>Buscar en: </p>
                    <p>Género musical: </p>
                    
                </div>

                <div class="col-md-8 mt-4">
                    <form method="post">
                        <input type="text" id="textobuscar" size="40" class="mb-4">
                        <div class="row ">
                            <input class="mr-2" type="radio" name="radiocheck" value="titulocancion">Titulos de canción
                            <input class="mr-2" type="radio" name="radiocheck" value="nombrealbum">Nombres de albúm
                            <input class="mr-2" type="radio" name="radiocheck" value="amboscampos">Ambos campos
                        </div>
                        <select name="genero" id="genero" class="mt-2">
                            <option value="todos">Todos</option>
                            <option value="acustica">Acústica</option>
                            <option value="bandasonora">Banda Sonora</option>
                            <option value="blues">Blues</option>
                            <option value="electronica">Electrónica</option>
                            <option value="folk">Folk</option>
                            <option value="jazz">Jazz</option>
                            <option value="newage">New Age</option>
                            <option value="pop">Pop</option>
                            <option value="rock">Rock</option>
                        </select>
                        <button type="button">Buscar</button>
                    </form>
                   
                </div>
            </div>
        </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>