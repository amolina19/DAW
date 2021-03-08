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
                    echo    "<button class='btn btn-warning mr-2' name='administrar'>Administrar</button>";
                }
            }
        }else{
            echo    "<button class='btn btn-success mr-2' name='login'>Iniciar Sesion</button>";
            echo   "<button class='btn btn-primary mr-2' name='registrarse'>Registrarse</button>";
        }
       
        
        
        echo   "<input class='form-control mr-sm-2 mt-2 mt-sm-0' type='text' placeholder='Buscar vehiculo' name='buscar'>";
        echo   "<button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='buscarbtn'>Buscar</button>";
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
                echo    "<button class='btn btn-danger mr-2' name='desconectar'>Desconectar</button>";
                echo    "<button class='btn btn-warning mr-2' name='volver'>Volver</button>";
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
        echo "<div class='row mt-4 justify-content-center'>";
        generateProduct();
        generateProduct();
        generateProduct();
        echo "</div>";
    }

    function generateProduct(/*$product*/){
        echo "<div class='col-md-3 product mt-5 mt-md-0'></div>";
        echo "<div class='col-md-1'></div>";
    }


?>