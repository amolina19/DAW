<?php

    //Calcular el factorial de un número

    function factorial($numero){

        if((int)$numero == 1){
            return 1;
        }else{
            return $numero * factorial($numero-1);
        }
    }

    echo factorial(20);
?>
