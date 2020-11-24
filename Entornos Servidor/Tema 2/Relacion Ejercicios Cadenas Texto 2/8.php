<?php



    $cadena = "Esta cadena tiene muchas letras";

    print("La primera ocurrencia de a esta en la posicion: ".strpos($cadena,"a")."\n");
    print("La primera ocurrencia de a esta en la posicion: ".strpos($cadena,"m")."\n");
    print("La primera ocurrencia de a esta en :la posicion: ".strpos($cadena,"tiene")."\n");
    print("La primera ocurrencia desde final de a esta en la posicion: ".strrpos($cadena,"a")."\n");
    print("\n");
    print(substr($cadena,strpos($cadena,"cadena"),strlen($cadena))."\n");
    print(substr($cadena,12,strlen($cadena))."\n");
    print(substr($cadena,18,6)."\n");
    print(substr($cadena,strlen($cadena)-6,strlen($cadena))."\n");
    print(substr($cadena,-26,6)."\n");
    print(substr($cadena,4,-7)."\n");



?>