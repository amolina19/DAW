<?php

    include_once 'session.php';
    include_once 'database.php';

    //Menu Buttons
    if(isset($_POST['desconectar'])){
        loginOff();
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

    if(isset($_POST['volver'])){
        header('Location: index.php');
    }

    if(isset($_POST['perfil'])){
        header('Location: profile.php');
    }

    if(isset($_POST['editar-'])){
        foreach ($_POST['editar-'] as $key => $value) {
            echo $key;
        }
    }

    if(isset($_POST['addvehiculo'])){
        header('Location: newvehicle.php');
    }

    if(isset($_POST['eliminar-'])){
        foreach ($_POST['eliminar-'] as $key => $value) {
            echo $key;
        }
    }

    if(isset($_POST['moduser']) && getActualPage() !== 'admin.php'){
        header('Location: admin.php');
    }

    function checkRegister(){

        if($_POST['username'] !== "" && $_POST['email'] !== "" && $_POST['password'] !== "" && $_POST['password_confirm'] !== ""){
            //echo $_POST['username'].$_POST['email'].$_POST['password'];
            if(strpos($_POST['email'],"@") >= 1 && strpos($_POST['email'],".") >= 1){
                if($_POST['password'] === $_POST['password_confirm']){
                    if(userExists($_POST['username'])){
                        echo "<span class='error'>Error el usuario ya existe.</span>";
                    }else{
                        $user['username'] = $_POST['username'];
                        $user['password'] = hashPassword($_POST['password']);
                        $user['email'] = $_POST['email'];
                        $user['type'] = "user";
                        if(insertNewUser($user)){
                            returnUserData($user['username']);
                            setCookieUser($user);
                            echo "<span class='success'>Registrado correctamente</span>";
                            return true;
                        }else{
                            echo "<span class='error'>Error al crear usuario</span>";
                        }
                    }
                }else{
                    echo "<span class='error'>Las contraseñas no coinciden.</span>";
                }
            }else{
                echo "<span class='error'>Email no válido.</span>";
            }
        }else{
            echo "<span class='error'>Faltan campos para rellenar.</span>";
        }
        return false;
    }
