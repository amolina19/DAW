<?php

$GLOBALS["address"] = "localhost";
$GLOBALS["username"] = "dwes";
$GLOBALS["password"] = "abc123";
$GLOBALS["dbname"] = "dwes";
$GLOBALS["database"] = new mysqli($GLOBALS["address"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["dbname"]);
//selectDB("dwes");
//$conexion = new mysqli($address,$user,$password,$database);

query("select cod,nombre_corto from producto","dwes");

function query($query,$table){
    
    if($GLOBALS["database"]->connect_errno != null){
        $GLOBALS["database"]->select_db($table);
        print "Database selected";
        $queryResult = $GLOBALS["database"]->query($query);

        if($queryResult){
            print $GLOBALS["database"]->fetch_array();
            $conexion->close();
            return $queryResult;
        }
    }
    $conexion->close();
    return null;
}
//$info = $conexion->server_info;
//print $info;
?>