<?php 

function entero(){
    $mi_entero = 3;
    $mi_real = 2.3;
    $resultado = $mi_entero + (int) $mi_real;
    echo "Entero $resultado";
    echo "\r\n"; //Salto de linea
}

function real(){
    $mi_entero = 3;
    $mi_real = 2.3;
    $resultado = $mi_entero + $mi_real;
    echo "Real $resultado";
}

function floresNumero(){

    $varN=1;
    $varC="2 flores";
    $varC=$varC+$varN; // el resultado es 3, A non well formed numeric value encountered in
    echo "\r\n"; //Salto de linea
    echo "El resultado de floresNumero es $varC";

}

function floresConcatenado(){

    $varN=1;
    $varC="4 flores";
    $varC=$varN.$varC; // el resultado es 14 flores
    echo "\r\n"; //Salto de linea
    echo "El resultado de floresCOnctaneado es $varC";
}

function nulo(){

    $varNull = (null) ;
    echo "\r\n"; //Salto de linea
    echo $varNull;
}

   entero();
   real();
   floresNumero();
   floresConcatenado();
   nulo();

    
?>

