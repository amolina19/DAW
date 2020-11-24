<?php


    $paises = array("España"=>"Madrid","Alemania"=>"Berlin","Portugal"=>"Lisboa","Francia"=>"Paris","Reino Unido"=>"Londres","Italia"=>"Roma","Rumania"=>"Budapest");

    foreach ($paises as $key => $value) {
        print("La capital de ".$key." es ".$value."\n");
    }
    ksort($paises);
    print("Ordenador por Clave \n");
    print_r($paises);
    asort($paises);
    print("Ordenador por Valores \n");
    print_r($paises);
?>