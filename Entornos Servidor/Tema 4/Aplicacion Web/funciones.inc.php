<?php


    function getPDODatabase(){
        $user = "usu4";
        $host = "localhost";
        $password = "usu4";
        $database = "tarea4";
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
        $sql = "SELECT password from usuarios WHERE usuario LIKE '$user'";
        foreach ($conn->query($sql) as $row){
            if($row['pwd'] != null){
                return $row['pwd'];
            }
        }
        return false;
    }

?>