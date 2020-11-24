<?php


    $cadena = "Bienvenidos al a aventura de aprender PHP en 30 horas";

    

    print("La posicion de la palaraba PHP es ".strpos($cadena,"PHP")."\n");
    $cadena2 = str_replace("aventura","<\br>misión</br>",$cadena);
    print($cadena2);
?>