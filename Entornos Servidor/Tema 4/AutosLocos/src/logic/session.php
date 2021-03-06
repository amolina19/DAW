<?php

    session_start();
    
    function checkUser(){
        if($_SESSION['username'] === null || $_SESSION['username'] === "" && $_SESSION['password'] === null || $_SESSION['password'] === ""){
            if($_COOKIE['username'] === null || $_COOKIE['username'] === "" && $_COOKIE['password'] === null || $_COOKIE['password'] === ""){
                return false;
            }
        }
        return true;
    }

    function deleteUserSession(){
        unset($_SESSION['username']);
        unset($_SESSION['type']);
        unset($_COOKIE['username']);
        unset($_SESSION['password']);
        unset($_COOKIE['password']);
    }

    function setUserTestSession(){
        $_SESSION['username'] = "test";
        $_SESSION['password'] = "test";
        $_SESSION['type'] = "admin";
    }

    function loginOff(){
        //$_SESSION['password'] = null;
        ///$_COOKIE['password'] = null;
        unset($_SESSION['password']);
        unset($_SESSION['type']);
        unset($_COOKIE['password']);
    }

?>
