<?php

    $cadena = "vamos al o'Brian";
    $out = addslashes($cadena);
    $original = stripslashes($cadena);
    print($out."\n");
    print($original);
?>
