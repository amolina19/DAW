<?php

    //Escribir una función recursiva que devuelva la suma de los primeros N enteros


    print(suma(100));


    function suma($number){
        

        if(func_num_args() > 1){
            $posicion = func_get_arg(1);
        }else{
            $posicion = $number;
        }

        if($posicion == 0){
            return $number;
        }else{
            $posicion--;
            return suma($number,$posicion)+$posicion;

        }
    }
?>
