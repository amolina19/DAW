<?php

    session_start();
    $error;
    if(isset($_POST["enviar"])){
        $nombre = $_POST["nombre"];
        $comentario = $_POST["comentario"];

        if(isset($comentario) && isset($comentario)){
            if(strlen($comentario) == 0 || strlen($comentario) == 0){
                $error = "Introduce todos los campos que no queden vacios";
            }else{
                $error = "";
                writeFile($nombre,$comentario);
            }
        }
    }

    function writeFile($nombre,$comentario){
        $nombreF = "datos.txt";
        $fichero = fopen($nombreF,"a");
        fwrite($fichero,"--------------------------------------------------"."\n");
        fwrite($fichero,$nombre."\n");
        fwrite($fichero,$comentario."\n");
        if(fclose($fichero) === true){

            global $guardado;
            global $slash;
            global $name;
            global $content;
            global $link;
            global $button;
            $guardado = "Los datos se han guardado correctamente";
            $slash = "--------------------------------------------------";
            $name = $nombre;
            $content = $comentario;
            //$link = "<a href='file://".__DIR__."/".$nombreF."'>Ver fichero</a>";
            $button = "<input type='submit' name='btnlink' value='Ver fichero'>";
            $_SESSION["link"] = __DIR__."/".$nombreF;
            //header('Location '.$_SESSION["link"]);
        }
    }

    
    if(isset($_POST["btnlink"])){
        echo $_SESSION["link"];
        header("Location: pagina3.php");
    }
    
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Formulario Ficheros</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        h1 {color:blue;}
        .error {color:red;}
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <div class="container">
        <form method="post">
            <h1>Sugerencias para nuestra pagina web</h1>

            <div class="row mb-4">
                <div class="col-md-3">
                    <b>Introdzca su nombre</b>
                </div>

                <div class="col-md-9">
                    <input type="text" name="nombre">
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <b>Comentarios sobre esta pagina web</b>
                </div>
        
                <div class="col-md-9">
                    <textarea type="textarea" name="comentario" rows="6" cols="50"></textarea>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Enviar" name="enviar">
            </div>

            <p class="error"> <?= $error ?> </p>
            <p> <?= $guardado ?> </p>
            <p> <?= $slash ?> </p>
            <p> <?= $name ?> </p>
            <p> <?= $content ?> </p>
        </form>

        <form method="post">
                <p> <?= $button ?> </p>
        </form>
            
            
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>