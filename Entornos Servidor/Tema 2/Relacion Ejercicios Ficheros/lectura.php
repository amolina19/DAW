<?php
    $pagina = $_GET["pagina"];
    $salida = file_get_contents($pagina);
    //$salida = file_get_contents("/home/lolm3/Escritorio/GitHub/DAW/Entornos Servidor/Tema 2/Relacion Ejercicios Formularios/ejercicio4.php");
    $fichero = "fich_salida.txt";
    $ficheroOpen = fopen($fichero,"w");
    fwrite($ficheroOpen , $salida);
    fclose($fichero);
    $bytes = filesize($fichero);
    print("El archivo ".$fichero." contiene ".$bytes." bytes");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros 1 Lectura</title>
</head>
<body>

    <form method="get">
        <input type="text" name="pagina" placeholder="Introduce una pagina o ruta de fichero">
    </form>
    
</body>
</html>


