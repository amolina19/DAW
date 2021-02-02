<?php

    $test= getPDODatabase();

    function getPDODatabase(){
        $user = "inmobiliaria";
        $host = "localhost";
        $password = "inmobiliaria";
        $database = "inmobiliaria";
        try {
            # Conexión a MySQL
            return new PDO("mysql:host=".$host.";dbname=".$database,"".$user, "".$password);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getMySQLDatabase(){
        $user = "inmobiliaria";
        $host = "localhost";
        $password = "inmobiliaria";
        $database = "inmobiliaria";

    }

?>