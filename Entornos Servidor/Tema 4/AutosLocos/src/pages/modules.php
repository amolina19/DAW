<?php

    
    function generateMenu(){
        echo "<nav class='navbar navbar-expand-md navbar-light bg-light'>";
        echo  "<img src='../images/logo.svg' width='50px' height='50px'>";
        echo  "<a class='navbar-brand pl-3' href='index.php'><b>AutosLocos</b></a>";
        echo  "<button class='navbar-toggler d-lg-none' type='button' data-toggle='collapse' data-target='#collapsibleNavId' aria-controls='collapsibleNavId' aria-expanded='false' aria-label='Toggle navigation'>";
        echo      "<span class='navbar-toggler-icon'></span>";
        echo   "</button>";
        echo  "<div class='collapse navbar-collapse' id='collapsibleNavId'>";
        echo      "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'></ul>";
         
        echo   "<form class='form-inline my-2 my-lg-0' method='post'>";

        if(getActualPage() === 'index.php'){
            echo   "<input class='form-control mr-sm-2 mt-2 mt-sm-0' type='text' placeholder='Buscar por marca,modelo..' name='buscar'>";
            echo   "<button class='btn btn-outline-success my-2 my-sm-0 mr-4' type='submit' name='buscarbtn'>Buscar</button>";
        }
        

        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            if($_SESSION['username'] !== null && $_SESSION['password'] !== null){
                
                if($_SESSION['type'] === 'admin'){
                   // echo    "<button class='btn btn-success mr-2' name='addvehiculo'>Añadir Vehiculo</button>";
                    echo    "<button class='btn btn-warning mr-4' name='administrar'>Administrar</button>";
                }
            }
        }else{
            echo   "<button class='btn btn-success mr-2' name='login'>Iniciar Sesion</button>";
            echo   "<button class='btn btn-primary mr-2' name='registrarse'>Registrarse</button>";
        }

        

        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            echo   "<div class='row justify-content-center d-flex align-items-center'>";
            echo   "<img src='../images/perfil.svg' class='mr-2'>";
            echo   "<b class='pr-5'>".$_SESSION['username']."</b>";
            echo   "</div>";
            echo   "<div><button class='btn btn-danger mr-2' name='desconectar'>Desconectar</button></div>";
        }
        
        echo  "</form>";
        echo  "</div>";
        echo  "</nav>";
    }

    function generateAdminMenu(){
        echo "<nav class='navbar navbar-expand-md navbar-light bg-light'>";
        echo   "<img src='../images/logo.svg' width='50px' height='50px'>";
        echo  "<a class='navbar-brand pl-3' href='index.php'><b>AutosLocos</b></a>";
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

    function generateVehicleList($filtro,$busqueda){

        if($busqueda === null){
            $vehicles = getAllvehiculos($filtro,'all');
        }else{
            $vehicles = getAllvehiculosBuscador($filtro,$busqueda);
        }
        
        //var_dump($vehicles);
        $rows = 1;
        $count = 1;
        for($k=0;$k<sizeof($vehicles);$k++){
            if($count === 4){
                $rows++;
                $count = 1;
            }
            $count++;
        }
        //echo $rows;
        //generateColumns($rows,$vehicles);
        generateView($vehicles);
        
    }

    /*
    function generateColumns($rows,$vehicles){
        $vehicleCount = 0;
        $count = sizeof($vehicles);
        
        for($i=0;$i<$rows;$i++){

            echo "<div class='row justify-content-center'>";
            
            $z = 4;
            if($count <= 4){
                $z = $count;
            }
            for($x=0;$x<$z;$x++){
                generateProduct($vehicles[$vehicleCount]);
                $vehicleCount++;
            }
            $count = $count-4;
            echo "</div>";
        }
        
    }
    */
    
    function generateView($vehicles){
        echo "<div class='row justify-content-left ml-3 mt-4 mt-md-0'>";
        
        for($i=0;$i<sizeof($vehicles);$i++){
            generateProduct($vehicles[$i]);
        }
        echo "</div>";
    }

    function generateProduct($vehicle){
        echo "<div class='card mr-2 mr-2 mb-4 mb-md-0 mt-0 mt-md-4' style='width: 18rem;'>";
        if($vehicle->imagen_url != null){
            echo "<img class='card-img-top' src='".$vehicle->imagen_url."' height='200px' alt='".$vehicle->modelo."'>";
        }else{
            echo "<img class='card-img-top rounded' src='data:image/jpg;charset=utf-8;base64,".base64_encode($vehicle->imagen)."' height='200px' alt='".$vehicle->modelo."'>";
        }
        
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'><b>".$vehicle->marca." ".$vehicle->modelo."</b></h5>";
        echo "<p class='card-text'>Precio: <b>".$vehicle->precio."€</b></p>";
        echo "<p class='card-text'>Kilometros: <b>".$vehicle->km."</b></p>";
        echo "<p class='card-text'>Año:<b> ".$vehicle->anno."</b></p>";
        echo "<form method='post'>";
        if(isset($_SESSION['id']) && $_SESSION['type'] === 'admin' && $vehicle->reservado === 1){
            echo "<input type='submit' class='btn btn-danger mr-2 mt-2' value='Reservado' disabled>";
        }else{
            if($vehicle->reservado !== 1 && $_SESSION['type'] !== 'admin'){
                echo "<input type='submit' class='btn btn-success mr-2 mt-2' name='reservar-[".$vehicle->id."]' value='Reservar'>";
            }
        }
        
        if(isset($_SESSION['id']) && $_SESSION['id'] === $vehicle->usuario_reserva){
            echo "<input type='submit' class='btn btn-warning mr-2 mt-2' name='cancelarReserva-[".$vehicle->id."]' value='Cancelar Reserva'>";
        }else if(isset($_SESSION['id']) && $_SESSION['type'] === 'admin' && $vehicle->reservado === 1){
            echo "<input type='submit' class='btn btn-warning mr-2 mt-2' name='cancelarReserva-[".$vehicle->id."]' value='Cancelar Reserva'>";
        }
        
        echo "<input type='submit' class='btn btn-primary mt-2' name=info-[".$vehicle->id."]' value='+Info'>";
        echo "</form></div></div>";
        
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
            echo "<form method='post'>";
            if($cellColor === 0){
                echo "<div class='row column mt-2 pt-2 pb-2 justify-content-center' style='background-color:#ffffff;'>";
                $cellColor = 1;
            }else{
                echo "<div class='row column mt-2 pt-2 pb-2 justify-content-center' style='background-color:#dddddd;'>";
                $cellColor = 0;
            }
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>ID:</b><br> ".$value->id."</div></div>";
            echo "<div class='col-md-2'><div class='text-center text-md-left '><b>Usuario:</b><br> ".$value->username."</div></div>";
            echo "<div class='col-md-2'><div class='text-center text-md-left '><b>Email:</b><br> ".$value->email."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Tipo:</b><br> ".$value->type."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left mb-2' ><input name='editar-[".$value->id."]' type='submit' value='Editar' class='btn btn-success'></div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left ml-md-3 ml-0'><input name='eliminar-[".$value->id."]' type='submit' value='Eliminar' class='btn btn-danger'></div></div>";
            echo "</div>";
        }
        echo "</div></form>";
    }


    function selectVehicles(){
        echo "<form method='post'>";
        echo "<div class='container-fluid'>";
        echo "<div class='d-flex justify-content-center mt-2'>";
        echo "<select name='ordenarpor' class='form-select'>";
        echo "<option value='all'>Todo</option>";
        echo "<option value='marca'>Marca</option>";
        echo "<option value='modelo'>Modelo</option>";
        echo "<option value='color'>Color</option>";
        echo "<option value='precio'>Precio</option>";
        echo "<option value='km'>Km</option>";
        echo "<option value='reservado'>Reservado</option>";
        echo "<option value='anno'>Año</option>";
        echo "</select>";
        echo "<input type='submit' class='btn btn-warning ml-2' value='Ordenar' name='ordenar'>";
        echo "</div></div></form>";
    }


    function generateVehiclesListView($orden){
        echo "<div class='container-fluid'>";
        echo "<form method='post'>";
        $vehicles;
        $cellColor = 0; //0 Blanco y 1 Gris

        if($orden === null){
            $vehicles = getAllvehiculos('admin','all');
        }else{
            $vehicles = getAllvehiculos('admin',$orden);
        }
        
        foreach ($vehicles as $value) {
                
            if($cellColor === 0){
                echo "<div class='row column mt-2 pt-2 pb-2 justify-content-center' style='background-color:#ffffff;'>";
                $cellColor = 1;
            }else{
                echo "<div class='row column mt-2 pt-2 pb-2 justify-content-center' style='background-color:#dddddd;'>";
                $cellColor = 0;
            }
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>ID:</b><br>".$value->id."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Modelo:</b><br> ".$value->modelo."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Año:</b><br>".$value->anno."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Marca:</b><br> ".$value->marca."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Precio:</b><br>".$value->precio."€</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Km:</b><br>".$value->km."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Color:</b><br>".$value->color."</div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Precio:</b><br>".$value->precio."</div></div>";
            if($value->reservado === 1){
                echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Reservado:</b> SI </div></div>";
                
            }else{
                echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Reservado:</b> NO </div></div>";
            }
            echo "<div class='col-md-1'><div class='text-center text-md-left '><b>Fecha Reserva:</b><br>".$value->dia_reservado."</div></div>";
            
            
            echo "<div class='col-md-1'><div class='text-center text-md-left mb-2' ><input name='editar-[".$value->id."]' type='submit' value='Editar' class='btn btn-success'></div></div>";
            echo "<div class='col-md-1'><div class='text-center text-md-left ml-md-0 ml-0'><input name='eliminar-[".$value->id."]' type='submit' value='Eliminar' class='btn btn-danger'></div></div>";
            echo "</div>";
        }
        echo "</form></div>";
    }

    function info($vehicle){

        echo "<form method='post'>";
        if($_SESSION['type'] !== 'admin' && $_SESSION['reservado'] === 0){
            echo "<input type='submit' class='btn btn-success mr-2 mt-2' name='reservar-[".$vehicle->id."]' value='Reservar'>";
        }else if($_SESSION['usuario_reserva'] === $_SESSION['id']){
            echo "<input type='submit' class='btn btn-warning mr-2 mt-2' name='cancelarReserva-[".$vehicle->id."]' value='Cancelar Reserva'>";
        }else{
            echo "<input type='submit' class='btn btn-danger mr-2 mt-2' value='Reservado' disabled>";
        }
        echo "</form>";
    }


?>