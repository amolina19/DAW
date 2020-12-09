<?php

    $cadena = $_POST["cadena"];
    //$dotsPos = array();
    
    for($i=0;$i<strlen($cadena);$i++){
            echo substr($cadena,$i,$i+1);
        if(strcmp(substr($cadena,$i,$i+1),".") === 0){
            echo ".";
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12 Relacion 3 Cadenas</title>
</head>
<body>

    <form method="post">
        <input type="text" placeholder="Introduce una direccion IP" name="cadena">
    </form>
    
</body>
</html>