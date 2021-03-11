<?php
    
    include_once 'database.php';

    while(true){

        $vehiculos = getAllVehiculosReserved();
        $dateTimeNow = date();


        $interval = date_diff($dateTimeNow, $vehiculos[1]['dia_reservado']);
        echo $interval->format('%R%a días');
        sleep(60);
    }
?>