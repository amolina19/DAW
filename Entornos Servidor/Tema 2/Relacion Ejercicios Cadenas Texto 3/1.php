<?php


    $cadena = $_POST["input"];

    $pos = strrpos($cadena," ");
    $ultimaPalabra = substr($cadena,$pos,strlen($cadena));
    echo $ultimaPalabra;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="input" placeholder="Introduce una cadena"/>

    </form>
    
</body>
</html>