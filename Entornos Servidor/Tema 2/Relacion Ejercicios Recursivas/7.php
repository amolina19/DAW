<?php

    //implemente una función recursiva que nos diga si una cadena es palíndromo


    $texto = "aeiouuoiea";
    echo palindormo($texto);

    function palindormo($texto){
        $cont = 0;

        if(func_num_args() > 1){
            $cont = func_get_arg(1);
        }
        if((strlen($texto)==1 && $cont==0) || strlen($texto)==0){
            print("Es palindromo");
        }else{

            $firstC = substr($texto,0,1);
            $secondC = substr($texto,strlen($texto)-1,strlen($texto));

            if(strcmp($firstC,$secondC)==0){
                $texto = substr($texto,1,strlen($texto)-2);
                $cont++;
                palindormo($texto,$cont);
            }else{
                print("No es palindromo");
            }
        }
    }
?>
