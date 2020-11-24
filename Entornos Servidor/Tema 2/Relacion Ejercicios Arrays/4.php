<?php


    $colores = array(
        array("Rojo" => "FF0000","Verde" => "00FF00","Azul" => "0000FF"),
        array("Rosa" => "FE9ABC","Amarillo" => "FDF189","Malva" => "BC8F8F")
    );

    for ($i=0 ; $i < count($colores) ; $i++ ) { 
        
        $array = $colores[$i];
        //print_r($array);
        if(in_array("BC8F8F",$array)){
            print("BC8F8F exists \n");
        }

        if(in_array("FF0000",$array)){
            print("FF0000 exists \n");
        }
    }

    
?>