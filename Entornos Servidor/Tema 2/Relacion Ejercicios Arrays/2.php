<?php


    $alumnos = array("Alvaro","Sergio","Manu","Adrian","Alejandro");

    for ($i=0; $i < (count($alumnos)-2) ; $i++) { 
        print($alumnos[$i]."\n");
    }

    $salida = array_slice($alumnos, -2, 2);
    print_r($salida);
    

    array_splice($alumnos,0,-2);
    print_r($alumnos);
?>