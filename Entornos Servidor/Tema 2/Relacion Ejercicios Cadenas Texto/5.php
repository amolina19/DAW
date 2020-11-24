<?php

    $cadena = $_POST["cadena"];
    if(count($cadena) != 0){
        echo($cadena." tiene ".substr_count($cadena,"a")." a ");
    }
    $array = str_split($cadena);
    echo "<br>";
    $outarray = array_count_values($array);

    foreach ($outarray as $key => $value) {
        echo $key."[$value] ";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Relacion PHP 1</title>
</head>
<body>
    <form method="post">
        <input type="text" name="cadena" placeholder="Introduce una frase">
    </form>
    
</body>
</html>