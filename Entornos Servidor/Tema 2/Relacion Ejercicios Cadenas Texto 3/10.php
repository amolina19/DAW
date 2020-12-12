<?php

    $cadena = "No me gusta usar+*[] en cadenas";
    $out = addcslashes($cadena,"+*[]`'ç-.,<>");
    print($out);
    
?>
