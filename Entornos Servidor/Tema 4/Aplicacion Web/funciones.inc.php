<?php

    //session_start();

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
        $sql = "SELECT pwd from usuarios WHERE usuario LIKE '$user'";
        foreach ($conn->query($sql) as $row){
            if($row['pwd'] != null){
                return $row['pwd'];
            }
        }
        return false;
    }

    function checkUserLogin($userInput,$password){

        if(password_verify($userInput,$password)){
            return true;
        }
        return false;
    }

    function checkCookiePreferences(){
        if(isset($_COOKIE['background'])){
            return $_COOKIE['background'];
        }else{
            setcookie("background", "white");
        }
    }

    function setCookiePreference($value){
        setcookie("background",$value);
    }

    function deletePreferences(){
        setcookie("background",time() -3600);
    }

    function setBackground(){
        echo "style='background-color:".$_COOKIE['background']."'";
    }

    function setInvitado(){
        $_SESSION['invitado'] = true;
        $_SESSION['usuario'] = "Invitado";
        $_SESSION['password'] = null;
        $_SESSION['fecha'] = date("Y-m-d H:i:s");
        header("Location: informacion.php");
    }

    function setUserSession($user,$password){
        $_SESSION['invitado'] == false;
        $_SESSION['usuario'] = $user;
        $_SESSION['password'] = $password;
        $_SESSION['fecha'] = date("Y-m-d H:i:s");
        header('Location: aplicacion.php');
    }

    function disconnectUser(){

        if(isset($_SESSION['invitado'])){
            $_SESSION['invitado'] = false;
        }
        $_SESSION['usuario'] = null;
        $_SESSION['password'] = null;
        $_SESSION['fecha'] = null;
        header('Location: index.php');
        session_destroy();
    }

    function generateNav(){
        
        if(isset($_SESSION['password'])){
            echo "<nav class='navbar navbar-expand-sm navbar-light bg-light'>";
            echo "<a class='navbar-brand' href='informacion.php'>Información</a>";
            echo "<a class='navbar-brand' href='preferencias.php'>Preferencias</a>";
            echo "<a class='navbar-brand' href='disconnectUser();'>Cerrar Sesión</a>";
            echo "Usuario: ".$_SESSION['usuario'];
            echo " Logeado en: ".$_SESSION['fecha'];
            echo "</nav>";
        }else if($_SESSION['invitado'] === true){
            echo "<nav class='navbar navbar-expand-sm navbar-light bg-light'>";
            echo "<a class='navbar-brand' href='informacion.php'>Información</a>";
            echo "<a class='navbar-brand' href='disconnectUser();'>Cerrar Sesión</a>";
            echo "Usuario: ".$_SESSION['usuario'];
            echo " Logeado en: ".$_SESSION['fecha'];
            echo "</nav>";
        }
    }

?>