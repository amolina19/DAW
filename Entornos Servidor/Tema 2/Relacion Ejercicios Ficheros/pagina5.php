<?php
    global $circuito;
    global $destino;
    global $duracion;
    global $dias;
    global $nombreF;
    
    $nombreF = "viajes.txt";

    readData($nombreF);
    


    if(isset($_POST["enviar"])){
        $circuito = $_POST["circuito"];
        $destino = $_POST["destino"];
        $duracion = $_POST["duracion"];
        $dias = $_POST["dias"];
        writeFile($circuito,$destino,$duracion,$dias);
    }

    function writeFile($circuito,$destino,$duracion,$dias){
        $nombreF = "viajes.txt";
        $fichero = fopen($nombreF,"a");

        fwrite($fichero,"\n".$circuito.":");
        fwrite($fichero,$destino.":");
        fwrite($fichero,$duracion.":");
        fwrite($fichero,$dias);
        if(fclose($fichero) === true){
            echo "Con exito";
        }
    }

    function readData($file){
        $nombreF = $file;
        $fichero = fopen($nombreF, "r");
        global $generated;
        if($fichero){
            $generated .= "<table border='1'>";
            $generated .= "<tr>
            <th>nombre</th>
            <th>destino</th>
            <th>duracion</th>
            <th>salida</th>
            </tr>";
            while(($line = fgets($fichero)) !== false){
                $array = str_split($line);
                $strLine = "";
                $generated .= "<tr>";
                for($i=0;$i<sizeof($array);$i++){
                    
                    
                    if(!(strcmp($array[$i],":") === 0)){
                        $strLine .= $array[$i];
                        $dotCount++;
                    }else{
                        $generated .= "<td>";
                        $generated .= $strLine;
                        $strLine = "";
                        $generated .= "</td>";
                        
                    }

                    if($i == (count($array)-1)){
                        $generated .= "<td>";
                        $generated .= $strLine;
                        $strLine = "";
                        $generated .= "</td>";
                    }

                }
                $generated .= "</tr>";
            }
            $generated .= "</table>";
            //echo $generated;
            fclose($fichero);
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina 5 Formulario Viajes</title>
        
    </head>
<body>

    <!doctype html>
    <html lang="en">
      <head>
        <title>Agencia Viajes</title>
        <style>
            h1{
                color:blue;
            }

            th{
                background-color: purple;
            }

            td{
                background-color:#f0e68c;
            }
        </style>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p> <?= $generated ?> </p>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <form method="post">
                            <table border="1">

                            <tr>
                                <td>Introduzca el nombre del circuito</td>
                                <td><input type="text" placeholder="Circuito" name="circuito"></td>
                            </tr>
                            <tr>
                                <td>Introduzca el destino</td>
                                <td><input type="text" placeholder="Destino" name="destino"></td>
                            </tr>
                            <tr>
                                <td>Introduzca la duracion</td>
                                <td><input type="text" placeholder="Duracion" name="duracion"></td>
                            </tr>
                            <tr>
                                <td>Introduzca los dias de salida</td>
                                <td><input type="text" placeholder="Dias salida" name="dias"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="enviar" value="Enviar"></td>
                            </tr>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
</html>
