<?php

    $texto = $_REQUEST["textobuscar"];
    $radiobutton = $_REQUEST["radiocheck"];
    $select= $_REQUEST["genero"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
</head>
<body>

    <p>Estos son los datos introducidos</p>
    <ul>
        <li>Texto de busqueda: <?= $texto ?> </li>
        <li>Buscar en: <?= $radiobutton ?></li>
        <li>Genero: <?= $select ?></li>
    </ul> 
    <p> [<a href="ejercicio1.php">Nueva busqueda</a>]</p>
    
</body>
</html>