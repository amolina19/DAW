<?php


    $cadena = $_POST["input"];

    $nombre = substr($cadena,0,strrpos($cadena,"@"));
    $dominio = substr($cadena,strrpos($cadena,"@")+1,strlen($cadena));

    echo "Nombre: ".$nombre." <br>";
    echo "Dominio: ".$dominio;

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="input" placeholder="Introduce una correo electronico"/>

    </form>
    
</body>
</html>