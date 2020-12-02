<?php


    if(isset($_POST["enviar"])){

        $cadena1 = $_POST["texto1"];
        $cadena2 = $_POST["texto2"];

        $value = strcmp(substr($cadena1,0,5),substr($cadena2,0,5));
        if( $value < 0){
            echo "Es mas grande la primera cadena en los 5 primeros caracteres";
        }else if($value > 0){
            echo "Es mas grande la segunda cadena en los 5 primeros caracteres";
        }else{
            echo "Son iguales";
        }

        echo "<br>";

        $value2 = strcmp($cadena1,$cadena2);

        if( $value < 0){
            echo "Es mas grande la primera cadena de manera natural";
        }else if($value > 0){
            echo "Es mas grande la segunda cadena de manera natural";
        }else{
            echo "Son iguales";
        }
        
        
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="texto1" placeholder="Introduce primera cadena"/>
        <input type="text" name="texto2" placeholder="Introduce segunda cadena"/>
        <input type="submit" name="enviar" value="Enviar">

    </form>
    
</body>
</html>