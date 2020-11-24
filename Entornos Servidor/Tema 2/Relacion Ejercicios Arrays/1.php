<?php
    $dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    //print_r($dias);

    print("For Each Loop \n");
    foreach ($dias as $key => $value) {
        print($key." ");
        print($value."\n");
        
    }
    print("\n");
    print("For Loop \n");
    for ($i=0; $i < count($dias); $i++) { 
        print($dias[$i]."\n");
    }
?>