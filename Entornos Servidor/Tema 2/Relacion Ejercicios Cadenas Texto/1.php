<?php
$cadena1 = $_POST["cadena1"];
$cadena2 = $_POST["cadena2"];
siRiman($cadena1,$cadena2);


function siRiman($cadena1,$cadena2){
    $last3cad1 = substr ($cadena1, strlen($cadena1)-3, 3);
    $last3cad2 = substr ($cadena2, strlen($cadena2)-3, 3);
    if(strcasecmp($last3cad1, $last3cad2) == 0){
        echo "Riman";
    }else{
        $last3cad1 = substr ($cadena1, strlen($cadena1)-2, 2);
        $last3cad2 = substr ($cadena2, strlen($cadena2)-2, 2);
        if(strcasecmp($last3cad1, $last3cad2) == 0){
            echo "Riman un poco";
        }else{
            echo "No riman";
        }
    }
    //echo $last3cad1;
}
?>
<html>


    <head></head>

    <body>
        <form method="post">
            <p>Cadena 1 <input type="text" name="cadena1" placeholder="Introduce la primera cadena"></p>
            <p>Cadena 2 <input type="text" name="cadena2" placeholder="Introduce la segunda cadena"></p>
            <input type="submit">
        </form>
    </body>
</html>


