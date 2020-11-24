<?php

    $numero = $_POST["cadena"];

    printf("Numero en octal %o\n", $numero);
    print("<br>");
    print(" Número en decimal ".$numero);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6 Relacion PHP 1</title>
</head>
<body>
    <form method="post">
        <input type="number" name="cadena" placeholder="Introduce un número">
    </form>
    
</body>
</html>