<?php

    $test= getPDODatabase();

    function getPDODatabase(){
        $user = "inmobiliaria";
        $host = "localhost";
        $password = "inmobiliaria";
        $database = "inmobiliaria";
        try {
            # Conexión a MySQL
            $pdo = new PDO("mysql:host=".$host.";dbname=".$database,"".$user, "".$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;
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