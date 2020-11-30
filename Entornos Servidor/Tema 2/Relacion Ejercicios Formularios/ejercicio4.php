<?php
    $color = "#d1d1d1";
    session_start();

    if(isset($_POST["enviar"])){
        checkCampos();
    }

    function checkCampos(){
        $array_error = array();
        if(empty($_POST["texto"])){
            array_push($array_error,"texto");
        }

        if(empty($_POST["textarea"])){
            array_push($array_error,"textarea");
        }
        
        $_SESSION["errors"] = $array_error;
        $_SESSION["texto"] = $_POST["texto"];
        $_SESSION["textarea"] = $_POST["texto"];
        $_SESSION["categoria"] = $_POST["categoria"];
        

        if(isset($_FILES["archivo"])){
            $_SESSION["file"] = $_FILES["archivo"]['name'];
            $fileTmpPath = $_FILES["archivo"]['tmp_name'];
            $fileName = $_FILES["archivo"]['name'];
            $fileSize = $_FILES["archivo"]['size'];
            $fileType = $_FILES["archivo"]['type'];

            $uploadFileDir = "./img/";
            $dest_path = $uploadFileDir.$fileName;
            //print($dest_path);

            if(move_uploaded_file($fileTmpPath,$dest_path)){
                echo("Se ha subido bien");
            }else{
                echo(" error al subir");
            }
        }
        header("Location: ejercicio4-status.php");
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Formularios 4 PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row">
            <h1>Subida de ficheros<h1>
        </div>
        <div class="row">
            <h3>Insertar nueva noticia</h3>
        </div>

        <div class="border">
            <form method="post" enctype="multipart/form-data">
                <div class="row mb-4 mt-4 ml-2">
                    <div class="col-4">
                        <p>Título:*</p>
                        <p>Texto:*</p>
                        <p>Categoría:</p>
                        <p>Imagen:</p>
                        <input type="submit" value="Insertar noticia" name="enviar">
                    </div>
                    <div class="col-8 mb-2">
                        <div class="mb-2">
                            <input type="text" name="texto">
                        </div>
                        
                        <div class="mb-2">
                            <input type="textarea" name="textarea" row="5" columns="20">
                        </div>

                        <div class="mb-2">
                            <select name="categoria">
                                <option value="promociones">promociones</option>
                                <option value="marketing">marketing</option>
                                <option value="desarrollo">desarrollo</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <div class="form-group">
                                <input type="file" name="archivo" placeholder="Introduce un archivo"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>


    </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>