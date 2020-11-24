<?php

echo suma(25);

function suma($number){
    
    if($number >=1){
        return $number + suma($number-1);
    }
}
?>