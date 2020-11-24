<?php

    $cadena = $_POST["cadena"];
    $out = "";
    $arrayStr = str_split($cadena);

    foreach ($arrayStr as $key => $value) {
        print($value.$value);
    }

    //rint($out);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7 Relacion PHP 1</title>
</head>
<body>
    <form method="post">
        <input type="text" name="cadena" placeholder="Introduce una cadena">
    </form>
    
</body>
</html>