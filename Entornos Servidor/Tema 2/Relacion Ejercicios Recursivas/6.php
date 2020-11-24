<?php

    //Programe un método recursivo que calcule la suma de un array unidimensional de números enteros.

    $array = array(20,40,8,5,19,1003,11,1,24,104,789,87,44);
    $array2 = array(20,20,20,20,120);

    print calcularSumaArray($array2);

    function calcularSumaArray($array){

        $posicion = 0;

        if(func_num_args() == 1){
            $posicion = count($array)-1;
        }else{
            $posicion = func_get_arg(1);
        }

        //print(" $posicion ");

        if($posicion >= 0){
            return $array[$posicion] + calcularSumaArray($array,($posicion-1));
        }
        
    }
?>
