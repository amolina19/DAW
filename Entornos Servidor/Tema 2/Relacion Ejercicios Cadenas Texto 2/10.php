<?php
    $cadena = file_get_contents(__DIR__.'/text.txt');
    print(addslashes($cadena));
?>