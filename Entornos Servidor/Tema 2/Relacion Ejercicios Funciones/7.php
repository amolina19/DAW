<?php

print "Cuadrado: ".cuadrado(5).PHP_EOL;
print "Cubo: ".cubo(10);

function cuadrado($number){
    return $number*$number;
}

function cubo($number){
    return $number*$number*$number;
}
    
?>