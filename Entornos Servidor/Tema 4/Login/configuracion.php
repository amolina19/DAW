<?php

    function getPDODatabase(){
        $user = "login";
        $host = "localhost";
        $password = "login";
        $database = "login";
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

    function returnPasswordUser($user){
        $conn = getPDODatabase();
        $sql = "SELECT password from user WHERE user LIKE '$user'";
        foreach ($conn->query($sql) as $row){
            if($row['password'] != null){
                return $row['password'];
            }
        }
        return false;
    }

?>