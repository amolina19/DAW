<?php

    function generateMenu(){
        echo "<nav class='navbar navbar-expand-md navbar-light bg-light'>";
        echo  "<a class='navbar-brand' href='index.php'>AutosLocos</a>";
        echo  "<button class='navbar-toggler d-lg-none' type='button' data-toggle='collapse' data-target='#collapsibleNavId' aria-controls='collapsibleNavId' aria-expanded='false' aria-label='Toggle navigation'>";
        echo      "<span class='navbar-toggler-icon'></span>";
        echo   "</button>";
        echo  "<div class='collapse navbar-collapse' id='collapsibleNavId'>";
        echo      "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'></ul>";
         
        echo   "<form class='form-inline my-2 my-lg-0' method='post'>";

        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            if($_SESSION['username'] !== null && $_SESSION['password'] !== null){
                echo    "<button class='btn btn-danger mr-2' name='desconectar'>Desconectar</button>";
                if($_SESSION['type'] === 'admin'){
                    echo    "<button class='btn btn-success mr-2' name='addvehiculo'>Añadir Vehiculo</button>";
                    echo    "<button class='btn btn-warning mr-2' name='administrar'>Administrar</button>";
                }
            }
        }else{
            echo   "<button class='btn btn-success mr-2' name='login'>Iniciar Sesion</button>";
            echo   "<button class='btn btn-primary mr-2' name='registrarse'>Registrarse</button>";
        }

        echo   "<input class='form-control mr-sm-2 mt-2 mt-sm-0' type='text' placeholder='Buscar vehiculo' name='buscar'>";
        echo   "<button class='btn btn-outline-success my-2 my-sm-0 mr-4' type='submit' name='buscarbtn'>Buscar</button>";

        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            echo   "<div class='row justify-content-center d-flex align-items-center'>";
            echo   "<button type='submit' name='perfil' class='ml-2 mr-2 border-0'><img src='../images/perfil.svg'></button>";
            echo   "<b>".$_SESSION['username']."</b>";
            echo   "</div>";
        }
        
        echo  "</form>";
        echo  "</div>";
        echo  "</nav>";
    }

    function generateAdminMenu(){
        echo "<nav class='navbar navbar-expand-md navbar-light bg-light'>";
        echo  "<a class='navbar-brand' href='index.php'>AutosLocos</a>";
        echo  "<button class='navbar-toggler d-lg-none' type='button' data-toggle='collapse' data-target='#collapsibleNavId' aria-controls='collapsibleNavId' aria-expanded='false' aria-label='Toggle navigation'>";
        echo      "<span class='navbar-toggler-icon'></span>";
        echo   "</button>";
        echo  "<div class='collapse navbar-collapse' id='collapsibleNavId'>";
        echo      "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'></ul>";
         
        echo   "<form class='form-inline my-2 my-lg-0' method='post'>";
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            if($_SESSION['username'] !== null && $_SESSION['password'] !== null && $_SESSION['type'] === 'admin'){
                echo   "<button class='btn btn-success mr-2' name='addvehiculo'>Añadir Vehiculo</button>";
                echo   "<button type='submit' name='moduser' class='mr-2 border-0'><img height='40px' src='../images/usuarios.svg'></button>";
                echo   "<button type='submit' name='modvehiculo' class='mr-2 border-0'><img height='40px' src='../images/vehiculos.svg'></button>";
                echo   "<button class='btn btn-warning mr-2' name='volver'>Volver</button>";
                echo   "<button class='btn btn-danger mr-2' name='desconectar'>Desconectar</button>";
                
            }
        }
        echo  "</form>";
        echo  "</div>";
        echo  "</nav>";
    }


    function generateContent($filtro){

        switch($filtro){

        }
        
    }

    function generateRow(){
        echo "<div class='row justify-content-center'>";
        generateProduct();
        generateProduct();
        generateProduct();
        generateProduct();
        echo "</div>";
    }

    function generateProduct(/*$product*/){
        echo "<div class='card mr-2 mr-2 mb-4 mb-md-0 mt-0 mt-md-4' style='width: 18rem;'>";
        echo "<img class='card-img-top' src='https://soymotor.com/sites/default/files/imagenes/noticia/bugatti-chiron-super-sport-300-exterior-soymotor.jpg' alt='Card image cap'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Buggati Veyron</h5>";
        echo "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";
        echo "<input type='submit' class='btn btn-success mr-2' value='Reservar'>";
        echo "<input type='submit' class='btn btn-primary' value='+Info'>";
        echo "</div></div>";
        
    }

    function generateUsersListView($type){
        echo "<div class='container'>";
        $users;
        $cellColor = 0; //0 Blanco y 1 Gris
        if($type === 'admin'){
            $users = getAllUsers('admin');
        }else if($type === 'users'){
            $users = getAllUsers('users');
        }else if($type ==='all'){
            $users = getAllUsers('all');
        }

        foreach ($users as $value) {
                
            if($cellColor === 0){
                echo "<div class='row column mt-2 pt-2 pb-2 justify-content-center' style='background-color:#ffffff;'>";
                $cellColor = 1;
            }else{
                echo "<div class='row column mt-2 pt-2 pb-2 justify-content-center' style='background-color:#dddddd;'>";
                $cellColor = 0;
            }
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>ID:</b> ".$value->id."</div></div>";
            echo "<div class='col-md-2'><div class='text-center text-md-left text-truncate'><b>Usuario:</b> ".$value->username."</div></div>";
            echo "<div class='col-md-2'><div class='text-center text-md-left text-truncate'><b>Email:</b> ".$value->email."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Tipo:</b> ".$value->type."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left mb-2' ><input name='editar-[".$value->id."]' type='submit' value='Editar' class='btn btn-success'></div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left ml-md-3 ml-0'><input name='eliminar-[".$value->id."]' type='submit' value='Eliminar' class='btn btn-danger'></div></div>";
            echo "</div>";
        }
        echo "</div>";
    }


?>