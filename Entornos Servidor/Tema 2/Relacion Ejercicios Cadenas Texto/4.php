<?php

    $cadena = $_POST["cadena"];
    $out = explode(" ", $cadena);
    echo $out[0]." ".$out[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Relacion PHP 1</title>
</head>
<body>
    <form method="post">
        <input type="text" name="cadena" placeholder="Introduce una frase">
    </form>
    
</body>
</html>