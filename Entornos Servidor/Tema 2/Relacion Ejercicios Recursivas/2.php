<?php

    //Calcular el número de fibonacci. (F(1)=1, F(2)=1, F(X)=F(X-1)+F(X-2))


    function fibonacci($numero){
        
        if((int)$numero == 0 || (int)$numero ==1){
            return $numero;
        }else{
            return fibonacci($numero-1) + fibonacci($numero-2);
        }
    }
    echo fibonacci(20);
?>
