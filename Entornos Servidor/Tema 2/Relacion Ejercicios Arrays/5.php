<?php


    $pila = array("cinco" => 5, "uno"=>1, "cuatro"=>4, "dos"=>2, "tres"=>3);
    //print_r($pila);
    asort($pila);
    
    arsort($pila);
    print_r($pila);
    ksort($pila);
    print_r($pila);
    sort($pila);
    print_r($pila);
    rsort($pila);
    print_r($pila);
?>