<?php

    $cadena = $_POST["cadena"];

    if(strlen($cadena) > 20){
        $cadena = substr($cadena,0,20);
    }else if(strlen($cadena) < 20){
        $cadena = str_pad($cadena, 20, "#", STR_PAD_BOTH);
    }

    echo $cadena;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 Relacion 3 Cadenas</title>
</head>
<body>

    <form method="post">
        <input type="text" placeholder="Introduce una cadena" name="cadena">
    </form>
    
</body>
</html>