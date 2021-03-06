<?php

class User{
    public $id;
    public $username;
    public $password;
    public $email;
    public $type;

    function setData($id, $username, $password, $email, $type){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->type = $type;
    }

    function dumpUserData(){
        var_dump(get_object_vars($this));
    }
}

    class Vehiculo {
        public $id;
        public $reservado;
        public $usuario_reserva;
        public $dia_reservado;
        public $nombre;
        public $precio;
        public $imagen;
        public $imagen_url;
        public $km;
        public $caracteristicas;
        public $color;
        public $marca;
        public $modelo;
        public $anno;
        public $contacto_tlf;
        public $contacto_imagen;

        function setData($id,$reservado,$usuario_reserva,$dia_reservado,$precio,$imagen,$imagen_url,$km,$caracteristicas,$color,$marca,$modelo,$anno,$contacto_tlf,$contacto_email){
            $this->id = $id;
            $this->reservado = $reservado;
            $this->usuario_reserva = $usuario_reserva;
            $this->dia_reservado = $dia_reservado;
            $this->precio = $precio;
            $this->imagen = $imagen;
            $this->imagen_url = $imagen_url;
            $this->km = $km;
            $this->caracteristicas = $caracteristicas;
            $this->color = $color;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->anno = $anno;
            $this->contacto_tlf = $contacto_tlf;
            $this->contacto_email = $contacto_email;
        }

        function setId($id){
            $this->id = $id;
        }

        function setReservado($reservado){
            $this->reservado = $reservado;
        }

        function setUsuarioReserva($usuario_reserva){
            $this->usuario_reserva = $usuario_reserva;
        }

        function setDiaReservado($dia_reservado){
            $this->dia_reservado = $dia_reservado;
        }

        function setPrecio($precio){
            $this->precio = (double) $precio;
        }

        function setImagen($imagen){
            $this->imagen = $imagen;
        }

        function setImagenURL($imagen_url){
            $this->imagen_url = $imagen_url;
        }

        function setKm($km){
            $this->km = $km;
        }

        function setCaracteristicas($caracteristicas){
            $this->caracteristicas = $caracteristicas;
        }

        function setColor($color){
            $this->color = $color;
        }

        function setMarca($marca){
            $this->marca = $marca;
        }

        function setModelo($modelo){
            $this->modelo = $modelo;
        }

        function setanno($anno){
            $this->anno = $anno;
        }

        function setContactoTelefono($contacto_tlf){
            $this->contacto_tlf = $contacto_tlf;
        }

        function setContactoEmail($contacto_email){
            $this->contacto_email = $contacto_email;
        }
    }
    

    function getConnection(){
        $vehiculo = "autoslocos";
        $host = "localhost";
        $precio = "autoslocos";
        $database = "autoslocos";
        try {
            # Conexión a MySQL
            $pdo = new PDO("mysql:host=".$host.";dbname=".$database,"".$vehiculo, "".$precio);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getUserPassword($user){
        $conn = getConnection();
        $sql = "SELECT password from Users WHERE usuario LIKE '$user'";
        foreach ($conn->query($sql) as $row){
            if($row['password'] != null){
                return $row['password'];
            }
        }
        return false;
    }

    function returnUserData($user){
        $conn = getConnection();
        $sql = "SELECT id,usuario,password,email,type FROM Users WHERE usuario LIKE '$user'";
        foreach ($conn->query($sql) as $row){
            if($row['usuario'] === $user){
                $data['id'] = $row['id'];
                $data['username'] = $row['usuario'];
                $data['password'] = $row['password'];
                $data['email'] = $row['email'];
                $data['type'] = $row['type'];
                return $data;
            }
        }
    }

    function returnUserDataByID($id){
        $conn = getConnection();
        $sql = "SELECT id,usuario,password,email,type FROM Users WHERE id LIKE '$id'";
        foreach ($conn->query($sql) as $row){
            $data['id'] = $row['id'];
            $data['username'] = $row['usuario'];
            $data['password'] = $row['password'];
            $data['email'] = $row['email'];
            $data['type'] = $row['type'];
            return $data;
        }
    }

    function returnVehicleDataByID($idCoche){

        if($idCoche === null){
            return null;
        }
        $conn = getConnection();
        $sql = "SELECT * FROM Vehicles WHERE id=".$idCoche;
        //echo $sql;

        foreach($conn->query($sql) as $row){
            $vehiculo = new Vehiculo();
            $vehiculo->setData($row['id'],$row['reservado'],$row['usuario_reserva'],$row['dia_reservado'],$row['precio'],$row['imagen'],$row['imagen_url'],$row['km'],$row['caracteristicas'],$row['color'],$row['marca'],$row['modelo'],$row['anno'],$row['contacto_tlf'],$row['contacto_email']);
            return $vehiculo;
        }
    }

    function userExists($user){
        $conn = getConnection();
        $sql = "SELECT usuario FROM Users WHERE usuario LIKE '$user'";
        foreach ($conn->query($sql) as $row){
            if($row['usuario'] != null){
                return true;
            }
        }
        return false;
    }

    function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    function editUser($user){
        $conn = getConnection();
        
        try{
            $gsent = $conn->prepare("INSERT INTO Users (usuario,password,email,type) VALUES(:usuario,:password,:email,:type)");
            $gsent->bindParam(":usuario", $user['username']);
            $gsent->bindParam(":password", $user['password']);
            $gsent->bindParam(":email",$user['email']);
            $gsent->bindParam(":type",$user['type']);
            
            if($gsent->execute()){
                return true;
            }

            return false;
        }catch(PDOException $e){
            die("Connection to database failed: " . $e->getMessage());
            echo "Connection to database failed:".$e->getMessage();
            return false;
        }
    }
    
    function insertNewUser($user){
        $conn = getConnection();
        
        try{
            $gsent = $conn->prepare("INSERT INTO Users (usuario,password,email,type) VALUES(:usuario,:password,:email,:type)");
            $gsent->bindParam(":usuario", $user['username']);
            $gsent->bindParam(":password", $user['password']);
            $gsent->bindParam(":email",$user['email']);
            $gsent->bindParam(":type",$user['type']);
            
            if($gsent->execute()){
                return true;
            }

            return false;
        }catch(PDOException $e){
            die("Connection to database failed: " . $e->getMessage());
            echo "Connection to database failed:".$e->getMessage();
            return false;
        }
    }


    //Admin Panel
    function getAllUsers($type){
        $conn = getConnection();
        $users = array();
        if($type === 'all'){
            $sql = "SELECT * FROM Users";
        }else if($type === 'admin'){
            $sql = "SELECT * FROM Users WHERE type LIKE 'admin'";
        }else if($type === 'users'){
            $sql = "SELECT * FROM Users WHERE type LIKE 'user'";
        }
        foreach($conn->query($sql) as $row){
            $user = new User();
            $user->setData($row['id'],$row['usuario'],$row['password'],$row['email'],$row['type']);
            array_push($users,$user);
        }
        return $users;
    }

    function getAllvehiculos($filtro,$orden){
        $conn = getConnection();
        $vehiculos = array();
        if(isset($_SESSION['type']) && $_SESSION['type'] === 'admin'){

            if($orden === 'all'){
                $sql = "SELECT * FROM Vehicles";
            }else{
                if($orden === 'anno' || $orden === 'reservado'){
                    $sql = "SELECT * FROM Vehicles ORDER BY ".$orden." DESC ";
                }else{
                    $sql = "SELECT * FROM Vehicles ORDER BY ".$orden;
                }
            }
            
        }else{
            $sql = "SELECT * FROM Vehicles";
        }

        foreach($conn->query($sql) as $row){

            if($row['usuario_reserva'] === null){
                $vehiculo = new Vehiculo();
                $vehiculo->setData($row['id'],$row['reservado'],$row['usuario_reserva'],$row['dia_reservado'],$row['precio'],$row['imagen'],$row['imagen_url'],$row['km'],$row['caracteristicas'],$row['color'],$row['marca'],$row['modelo'],$row['anno'],$row['contacto_tlf'],$row['contacto_email']);
                array_push($vehiculos,$vehiculo);
            }else if($row['usuario_reserva'] === $_SESSION['id']){
                $vehiculo = new Vehiculo();
                $vehiculo->setData($row['id'],$row['reservado'],$row['usuario_reserva'],$row['dia_reservado'],$row['precio'],$row['imagen'],$row['imagen_url'],$row['km'],$row['caracteristicas'],$row['color'],$row['marca'],$row['modelo'],$row['anno'],$row['contacto_tlf'],$row['contacto_email']);
                array_push($vehiculos,$vehiculo);
            }else if($_SESSION['type'] === 'admin'){
                $vehiculo = new Vehiculo();
                $vehiculo->setData($row['id'],$row['reservado'],$row['usuario_reserva'],$row['dia_reservado'],$row['precio'],$row['imagen'],$row['imagen_url'],$row['km'],$row['caracteristicas'],$row['color'],$row['marca'],$row['modelo'],$row['anno'],$row['contacto_tlf'],$row['contacto_email']);
                array_push($vehiculos,$vehiculo);
            }
            
        }
        return $vehiculos;
    }

    function getAllVehiculosReserved(){
        $conn = getConnection();
        $vehiculos = array();
        $sql = "SELECT * FROM Vehicles WHERE reservado LIKE '1'";
        foreach($conn->query($sql) as $row){
            $vehiculo = new Vehiculo();
            $vehiculo->setData($row['id'],$row['reservado'],$row['usuario_reserva'],$row['dia_reservado'],$row['precio'],$row['imagen'],$row['imagen_url'],$row['km'],$row['caracteristicas'],$row['color'],$row['marca'],$row['modelo'],$row['anno'],$row['contacto_tlf'],$row['contacto_email']);
            array_push($vehiculos,$vehiculo);
        }
        return $vehiculos;
    }

    function getAllvehiculosBuscador($filtro,$busqueda){
        $busqueda = '%'.$busqueda.'%';
        str_replace(" ","",$busqueda);
        $conn = getConnection();
        $vehiculos = array();
        if(isset($_SESSION['type']) && $_SESSION['type'] === 'admin'){
            $sql = "SELECT * FROM Vehicles WHERE marca LIKE '".$busqueda."' OR modelo LIKE '".$busqueda."' OR color LIKE '".$busqueda."' OR anno LIKE '".$busqueda."' OR precio LIKE '".$busqueda."' OR km LIKE '".$busqueda."'";
        }else{
            $sql = "SELECT * FROM Vehicles WHERE reservado='0' AND marca LIKE '".$busqueda."' OR modelo LIKE '".$busqueda."' OR color LIKE '".$busqueda."' OR anno LIKE '".$busqueda."' OR precio LIKE '".$busqueda."' OR km LIKE '".$busqueda."'";
        }

        foreach($conn->query($sql) as $row){
            $vehiculo = new Vehiculo();
            $vehiculo->setData($row['id'],$row['reservado'],$row['usuario_reserva'],$row['dia_reservado'],$row['precio'],$row['imagen'],$row['imagen_url'],$row['km'],$row['caracteristicas'],$row['color'],$row['marca'],$row['modelo'],$row['anno'],$row['contacto_tlf'],$row['contacto_email']);
            array_push($vehiculos,$vehiculo);
        }
        return $vehiculos;
    }

    function deleteVehicle($id){
        $conn = getConnection();
        $sql = "DELETE FROM Vehicles WHERE id=".$id;
        $conn->query($sql);
    }

    function deleteUser($id){
        $conn = getConnection();
        $sql = "DELETE FROM Users WHERE id=".$id;
        //echo $sql;
        $conn->query($sql);
    }


    function insertVehicle($vehiculo){
        //echo print_r($vehiculo);
        $conn = getConnection();
        
        try{
            $gsent = $conn->prepare("INSERT INTO Vehicles (reservado,usuario_reserva,dia_reservado,precio,imagen,imagen_url,km,caracteristicas,color,marca,modelo,anno,contacto_tlf,contacto_email) 
            VALUES(:reservado,:usuario_reserva,:dia_reservado,:precio,:imagen,:imagen_url,:km,:caracteristicas,:color,:marca,:modelo,:anno,:contacto_tlf,:contacto_email)");
            $gsent->bindParam(":reservado", $vehiculo->reservado);
            $gsent->bindParam(":usuario_reserva",$vehiculo->usuario_reserva);
            $gsent->bindParam(":dia_reservado", $vehiculo->dia_reservado);
            $gsent->bindParam(":precio", $vehiculo->precio);
            $gsent->bindParam(":imagen",$vehiculo->imagen);
            $gsent->bindParam(":imagen_url",$vehiculo->imagen_url);
            $gsent->bindParam(":km",$vehiculo->km);
            $gsent->bindParam(":caracteristicas",$vehiculo->caracteristicas);
            $gsent->bindParam(":color",$vehiculo->color);
            $gsent->bindParam(":marca",$vehiculo->marca);
            $gsent->bindParam(":modelo",$vehiculo->modelo);
            $gsent->bindParam(":anno",$vehiculo->anno);
            $gsent->bindParam(":contacto_tlf",$vehiculo->contacto_tlf);
            $gsent->bindParam(":contacto_email",$vehiculo->contacto_email);
            
            if($gsent->execute()){
                return true;
            }

            return false;
        }catch(PDOException $e){
            die("Connection to database failed: " . $e->getMessage());
            echo "Connection to database failed:".$e->getMessage();
            return false;
        }
    }

    function reservar($idCoche,$idUser){
        $conn = getConnection();
        $sql = "UPDATE Vehicles SET reservado = 1 ,usuario_reserva = ".$idUser.", dia_reservado = '".date("Y-m-d H:i:s")."' WHERE id = ".$idCoche;
        //echo $sql;
        $conn->query($sql);
    }

    function cancelarReserva($idCoche){
        $conn = getConnection();
        $sql = "UPDATE Vehicles SET usuario_reserva = NULL, dia_reservado = NULL, reservado = 0 WHERE id = ".$idCoche;
        $conn->query($sql);
    }

    function updateVehicleData($vehicle){
        $conn = getConnection();
        $sql = "UPDATE Vehicles SET "."marca=".$vehicle->marca.",modelo=".$vehicle->modelo.",color =".$vehicle->color.",precio =".$vehicle->precio.",km=".$vehicle->km.",anno =".$vehicle->anno.",caracteristicas =".$vehicle->caracteristicas.",imagen_url = ".$vehicle->imagen_url.", contacto_tlf=".$vehicle->contacto_tlf.", contacto_email = ".$vehicle->contacto_email." WHERE id =".$vehicle->id;
        $conn->query($sql);
    }

    function updateUserData($user){
        $conn = getConnection();
        if($user->password === null){
            $sql = "UPDATE Users SET email='".$user->email."',type ='".$user->type."' WHERE id =".$user->id;
        }else{
            $sql = "UPDATE Users SET email='".$user->email."',password='".$user->password."',type ='".$user->type."' WHERE id =".$user->id;
        }
        
        echo $sql;
        $conn->query($sql);
    }

    function trigger(){
        $vehiculos = getAllVehiculosReserved();
        $dateTimeNow = date_create("now");
        //$dateTimeTest = date_create("6-3-2021 10:10:10");
        //echo date_format($dateTimeNow,'Y-m-d h:i:s');
        //var_dump($vehiculos);

        for($i=0;$i<sizeof($vehiculos);$i++){
            //echo $vehiculos[$i]->dia_reservado;
            $dateReserva = date_create($vehiculos[$i]->dia_reservado);
            $dateTimeNow = date_create("now");
            //echo " ". date_format($dateReserva,'Y-m-d h:i:s');
            //echo " ".date_format($dateTimeNow,'Y-m-d h:i:s');
            $interval = date_diff($dateReserva,$dateTimeNow);
            $diference = $interval->format('%R%a');
            if($diference >= 7){
                cancelarReserva($vehiculos[$i]->id);
            }
        }
    }
?>
