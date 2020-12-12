<?php

    $fichero = fopen("visitas.txt","r+a");
    $contador = fread($fichero, 8);
    $newvalue = intval($contador);
    $newvalue++;
    rewind($fichero);
    fwrite($fichero,$newvalue);
    //fclose($fichero);
    //$contador = file_get_contents("visitas.txt");
    print("Eres el visitante ".$newvalue);
    //print(gettype($contador));

?>
