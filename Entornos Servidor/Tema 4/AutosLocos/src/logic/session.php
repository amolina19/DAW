<?php

    //session_start();

    

    function userCookieExists(){
        echo $_COOKIE['username'];
        if($_COOKIE['username'] !== null && $_COOKIE['password'] !== null){
            setUserSession($user);
            return true;
        }
        echo "Cookie no existe";
        return false;
    }
    

    function deleteUserSession(){
        unset($_SESSION['username']);
        unset($_SESSION['type']);
        unset($_SESSION['password']);
        unset($_COOKIE['username']);
        unset($_COOKIE['password']);
    }

    function setCookieUser($user){
        setcookie('username',$user['username']);
        setcookie('password',$user['password']);
    }

    function getCookieUser(){
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){

        }else{
            $_COOKIE['username'] = $_SESSION['username'];
            $_COOKIE['password'] = $_SESSION['password'];
        }
    }

    function setUserSession($user){
        $_SESSION['username'] = $user['username;'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['type'] = $user['type'];
    }

    function loginOff(){
        //$_SESSION['password'] = null;
        ///$_COOKIE['password'] = null;
        unset($_SESSION['password']);
        unset($_SESSION['type']);
        unset($_COOKIE['password']);
    }

?>
