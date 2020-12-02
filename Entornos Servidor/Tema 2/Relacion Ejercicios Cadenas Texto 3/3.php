<?php


    if(isset($_POST["enviar"])){

        $cadena = $_POST["input"];
        $vocales = ["a","e","i","o","u"];
        $cont = 0;

        $vocaCount = sizeof($vocales);
        for($i=0;$i<$vocaCount;$i++){

            if(strpos($cadena,$vocales[$i])){
                $cont++;
            }
        }
        
        if($cont > 0){
            echo "La cadena tiene vocales";
        }else{
            echo "La cadena no tiene vocales";
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="input" placeholder="Introduce una cadena"/>
        <input type="submit" name="enviar" value="Enviar">

    </form>
    
</body>
</html>