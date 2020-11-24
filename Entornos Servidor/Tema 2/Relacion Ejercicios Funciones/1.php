<?php
    /*
    Añadir la función aquí
    */
    function calculaCantidad($anos,$deposito,$interes){

        
        $ahorros = 0.0;
        for($i=1;$i<=$anos;$i++){
            $ahorros += (float) (($deposito * $interes) /100.0);
        }
        return $ahorros;
    }

    $interes=5;
    echo "<p><b>El interés actual es $interes%.</b></p>" ;
    echo " <p>Si usted deposita 100 &#x20AC; hoy, sus ahorros crecerán a " ;

    printf("%.2f",calculaCantidad(5 , 100,$interes));
    echo "&#x20AC; en 5 años.</p>" ;
    echo " <p>Si usted deposita 1.500&#x20AC; hoy, sus ahorros crecerán a " ;
    printf("%.2f",calculaCantidad(20 , 1500,$interes));
    //echo $result2;

    echo "&#x20AC; después de 20 años.</p>" ;
?>