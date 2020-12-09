<?php


    $cadena = $_POST["cadena"];

    $cadena = str_split($cadena);

    echo print_r($cadena);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>11 Relacion 3 Cadenas</title>
</head>
<body>

    <form method="post">
        <input type="text" placeholder="Introduce una cadena" name="cadena">
    </form>

    

    
</body>
</html>