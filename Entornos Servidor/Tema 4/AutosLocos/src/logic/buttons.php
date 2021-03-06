<?php


    //Menu Buttons
    if(isset($_POST['desconectar'])){
        deleteUserSession();
    }

    if(isset($_POST['administrar'])){
        header('Location: admin.php');
    }

    if(isset($_POST['buscarbtn'])){
        //echo $_POST['buscar'];
    }

    if(isset($_POST['login'])){
        header('Location: login.php');
    }

    if(isset($_POST['registrarse'])){
        header('Location: register.php');
    }

    


?>