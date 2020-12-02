<?php


    if(isset($_POST["enviar"])){

        $cadena = $_POST["texto1"];
        $vocalesMin = array("a","e","i","o","u");
        $vocalesMay = array("A","E","I","O","U");
        //$cadenaout = "";
        
        /*
        for($i=0;$i<sizeof($vocales);$i++){

            $cadena = str_replace($cadena,$vocalesMay,$vocalesMin);
        }
        */

        $salida = str_replace(array($vocalesMin,$vocalesMay),array($vocalesMay,$vocalesMin),$cadena);
        //$salida = str_replace($vocalesMay,$vocalesMin,$cadena);

        echo $salida;
        
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="texto1" placeholder="Introduce primera cadena"/>
        <input type="submit" name="enviar" value="Enviar">

    </form>
    
</body>
</html>