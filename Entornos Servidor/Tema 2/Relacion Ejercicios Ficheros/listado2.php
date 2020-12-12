<?php

    $directorio = $_GET["directory"];
    $ficheros  = scandir($directorio);

    foreach($ficheros as $file){
        //echo $directorio."/".$file."\n";
        echo "<ul>";
        if(is_file($directorio."/".$file)){

            echo "<li>";
            echo $file;
            echo " Peso en bytes ".filesize($directorio."/".$file);
            echo "</li>";
        }
        echo "</ul>";
    }
    //print_r($ficheros);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado 2</title>
</head>
<body>
    

    <form method="get">
        <input type="text" name="directory" placeholder="Introduce un directorio">
    </form>
</body>
</html>