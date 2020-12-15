<?php

    $error = "";
    $vacio = true;
    $arrarbol = array();
    $nombre;
    $apellidos;
    $foto;
    $dni;
    $arbol;
    $comentario;
    $sexo;
    $pais;
    $gfoto;

    //session_start();

    if(isset($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        $vacio = false;
    }

    if(isset($_POST["apellidos"])){
        $apellidos = $_POST["apellidos"];
        $vacio = false;
    }

    if(isset($_POST["dni"])){
        $dni = $_POST["dni"];
        $vacio = false;
    }

    if(isset($_POST["sexo"])){
        $sexo = $_POST["sexo"];

        if(strcmp($sexo,"F")){
            $sexo = "Mujer";
        }else{
            $sexo = "Hombre";
        }
    }

    if(isset($_POST["pais"])){
        $pais = $_POST["pais"];
    }

    if(isset($_POST["comentario"])){
        $comentario = $_POST["comentario"];
    }

    if(isset($_POST["arbol"])){
        $arbol = $_POST["arbol"];
    }

    if(isset($_POST["enviar"])){

        if(strlen($arbol) === 0){
            $vacio = true;
        }

        if(strlen($nombre) === 0){
            $vacio = true;
        }

        if(strlen($apellidos) === 0){
            $vacio = true;
        }

        if(strlen($dni) === 0){
            $vacio = true;
        }
        
        if(isset($_FILES["foto"]) === false){
            $vacio = true;
        }


        $fileTmpPath = $_FILES["foto"]['tmp_name'];
        $fileName = $_FILES["foto"]['name'];

        $uploadFileDir = "./img/";
        $dest_path = $uploadFileDir.$fileName;
        $extension = mime_content_type($dest_path);

        if(strcmp($extension,"image/jpeg")){
            if(move_uploaded_file($fileTmpPath,$dest_path)){

                global $gfoto;
                global $gnombre;
                global $gapellidos;
                global $gdni;
                global $gsexo;
                global $gpais;
                global $gcomentario;
                global $table;
                $gfoto = "<img src='./img/".$fileName."'>";
                $gnombre = "Nombre: ".$nombre;
                $gapellidos = "Apellidos: ".$apellidos;
                $gdni = "DNI: ".$dni;
                $gsexo = "Sexo: ".$sexo;
                $gpais = "Pais Resiendica: ".$pais;
                $gcomentario = "Comentario: ".$comentario;

                for($i=1;$i<=$arbol;$i++){

                    $str = "";
                    for($j=0;$j<($i*2)-1;$j++){
                        $str .= "/";
                    }

                    $cadena = str_pad($str, ($arbol*2)-1, "*", STR_PAD_BOTH);
                    //echo $cadena."\n";
                    $arr = str_split($cadena);
                    $arrarbol[$i] = $arr;

                    //print_r($arrarbol);

                    //print_r($arrarbol);
                }
                
                
                $table = "<table border='1'>";
                for($i=1;$i<=count($arrarbol);$i++){
                    $table .= "<tr>";
                    $arrFila = $arrarbol[$i];

                    for($j=0;$j<count($arrFila);$j++){
                
                        if(strcmp($arrFila[$i],"/")){
                            $table .= "<td bgcolor ='#000000'>/</td>";
                        }else{
                            $table .= "<td bgcolor ='#00FFFF'>*</td>";
                        }
                       
                    }
                    $table .= "</tr>";
                }

                $table .= "</table>";
                
                
            }else{
                $error = "Error al procesar la imagen";
            }
        }

        if($vacio === true){
            $error = "Algunos campos estan vacios con la marca *";
        }
        settype($arbol, "integer");
        if($arbol < 0){
            $error = "La altura del arbol debe ser positivo";
            $vacio = true;
        }
    }

    //echo $nombre.$apellidos.$dni.$sexo.$pais.$comentario.$foto.$arbol;

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Examen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style>
        p.error{
            color:red;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-4">
                <div class="col-6">
                    <p>Nombre*: </p>
                </div>

                <div class="col-6">
                    <input type="text" name="nombre" placeholder="Introduce el nombre">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>Apellidos*: </p>
                </div>

                <div class="col-6">
                    <input type="text" name="apellidos" placeholder="Introduce los apellidos">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>DNI*: </p>
                </div>

                <div class="col-6">
                    <input type="text" name="dni" placeholder="Introduce el dni">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>Sexo: </p>
                </div>

                <div class="col-6">
                    <input type="radio" name="sexo" value="M" /> Hombre
                    <input type="radio" name="sexo" value="F" /> Mujer
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <p>Pais de residencia: </p>
                </div>

                <div class="col-6">
                <select name="pais">
                    <option value="Francia">Francia</option>
                    <option value="España">España</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Italia">Italia</option>
                </select>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>Comentario: </p>
                </div>

                <div class="col-6">
                    <textarea type="textarea" name="comentario" rows="6" cols="50" placeholder="Introduce un comentario.."></textarea>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-6">
                    <p>Foto Carnet*: </p>
                </div>

                <div class="col-6">
                    <input type="file" class="form-control-file" name="foto">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p>Alto del arbol*: </p>
                </div>

                <div class="col-6">
                    <input type="text" name="arbol" placeholder="Introduce altura del arbol">
                </div>
            </div>

            <div class="row">
                <div class="col-6"></div>
                <div class="col-4">
                    <p class="error"> <?= $error ?> </p>
                </div>
                <div class="col-4"></div>
            </div>

            <div class="row">
                <div class="col-6"></div>
                <div class="col-4">
                    <input type="submit" value="Enviar" name="enviar">
                </div>  
                <div class="col-4"></div>
            </div>
            
        </form>
    </div>

    <div class="container">
        <div class="row">
           <div class="col-3"></div> 
           <div class="col-4">
                <p> <?= $gfoto ?> </p>
           </div> 
           <div class="col-4"></div> 
        </div>

        <div class="row">
            <p> <?= $table ?> </p>
        </div>

        <div class="row">
            <div class="col-5"></div>
            <div class="col-3">
                <p> <?= $gnombre ?> </p>
                <p> <?= $gapellidos ?> </p>
                <p> <?= $gdni ?> </p>
                <p> <?= $gsexo ?> </p>
                <p> <?= $gpais ?> </p>
                <p> <?= $gcomentario ?> </p>
            </div>
            <div class="col-4"></div>

        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>