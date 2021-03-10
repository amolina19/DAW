<?php
    session_start();
    include_once 'database.php';
    userCookieExists();


    function getActualPage(){
        return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    }

    function userCookieExists(){
        //echo $_COOKIE['username'];
        if($_COOKIE['username'] !== null && isset($_COOKIE['password'])){

            if(password_verify($_COOKIE['password'],getUserPassword($_COOKIE['password']))){
                setUserSession($_COOKIE['username']);
                return true;
            }
        }
        //echo "Cookie no existe";
        return false;
    }

    function setCookieUser($user){
        setcookie('username',$user['username']);
        setcookie('password',$user['password']);
    }

    function deleteCookieUser(){
        setcookie('username',"",time()-3600);
    }

    function getCookieUser(){
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){

        }else{
            $_COOKIE['username'] = $_SESSION['username'];
            $_COOKIE['password'] = $_SESSION['password'];
        }
    }

    function setUserSession($user){

        $data = returnUserData($user);
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['type'] = $data['type'];
        setCookieUser($data);
    }

    function login($username,$password){
        if(userExists($username)){
            if(password_verify($password,getUserPassword($username))){
                return true;
            }
        }
        
        return false;
    }

    function loginOff(){
        deleteUserSession();
    }

    function deleteUserSession(){
        setcookie('password','', time()-3600);
        setcookie('password','', time()-3600,"/");
        session_destroy();
        header("Location: index.php");
        //deleteCookieUser();
    }

    function noErasTu(){
        if(isset($_COOKIE['username']) && $_COOKIE['username'] !==  ""){
            return true;
        }
        return false;
    }

?>
