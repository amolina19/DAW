<?php
$GLOBALS["address"] = "localhost";
$GLOBALS["username"] = "dwes";
$GLOBALS["password"] = "abc123";
$GLOBALS["dbname"] = "dwes";
$database = new mysqli($GLOBALS["address"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["dbname"]);
//selectDB("dwes");
//$conexion = new mysqli($address,$user,$password,$database);
//print $database->server_info;

//queryConnect("select cod,nombre_corto from producto");

function queryConnect($query){
    global $database;
    $result = null;
    if($database != null){
        $queryResult = $database->query($query);
        //print_r($queryResult);
        if($queryResult){
            $rows = $queryResult->num_rows;
            $count = 0;
            while($count < $rows){
                $fila = $queryResult->fetch_array();
                $result[$count] = $fila;
                $count++;
            }
            //print_r($result);
            $database->close();
            return $result;
        }
    }
    $database->close();
    return null;
}
?>