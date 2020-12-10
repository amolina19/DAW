<?php

    $ip = $_POST["cadena"];

    checkIfValid($ip);

    function checkIfValid($ip){
        $ipStr = "";
        $iparr = array();
        $dotCount = 0;
        for($i=0;$i<strlen($ip);$i++){
            if($ip[$i] === "."){
                $dotCount++;
                array_push($iparr,$ipStr);
                $ipStr = "";
            }else{
                $ipStr .= $ip[$i];
                if(($i == strlen($ip)-1) === true){
                    array_push($iparr,$ipStr);
                    $ipStr = "";
                }
            }
        }
        if($dotCount === 3){
            if(validIP($iparr)){
                echo "Is valid";
            }else{
                echo "Not valid";
            }
        }else{
            echo "Not a valid IP address";
        }
        //print_r($iparr);
    }

    function validIP($iparray) {
        for($i=0;$i<sizeof($iparray);$i++){
            //echo $iparray[$i];
            if(($iparray[$i] >= 0 && $iparray[$i] <= 255) === false){
                return false;
            }
        }
        return true;
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>12 Relacion 3 Cadenas</title>
</head>
<body>

    <form method="post">
        <input type="text" placeholder="Introduce una direccion IP" name="cadena">
    </form>
    
</body>
</html>