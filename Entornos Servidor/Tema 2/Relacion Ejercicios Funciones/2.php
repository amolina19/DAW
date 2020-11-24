<?php

echo country("España","Barcelona",29293232);

function country($pais,$capital="Madrid"){
    $parametros=func_get_args();
    $hab = $parametros[2];

    if(count($parametros) < 3){
        return "La capital de $pais es $capital y tiene muchos habitantes";
    } else {  
        return "La capital de $pais es $capital y tiene $hab";
    }  
}
?>