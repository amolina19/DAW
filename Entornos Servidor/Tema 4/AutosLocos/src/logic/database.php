<?php

class User{
    public $id;
    public $username;
    private $password;
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
        public $dia_reservado;
        public $nombre;
        public $precio;
        public $imagen;
        public $km;
        public $caracteristicas;
        public $color;
        public $marca;
        public $modelo;
        public $anno;
        public $contacto_tlf;
        public $contacto_imagen;

        function setData($id,$reservado,$dia_reservado,$precio,$nombre,$imagen,$km,$caracteristicas,$color,$marca,$modelo,$anno,$contacto_tlf,$contacto_imagen){
            $this->id = $id;
            $this->reservado = $reservado;
            $this->dia_reservado = $dia_reservado;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->imagen = $imagen;
            $this->km = $km;
            $this->caracteristicas = $caracteristicas;
            $this->color = $color;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->anno = $anno;
            $this->contacto_tlf = $contacto_tlf;
            $this->contacto_imagen = $contacto_imagen;
        }

        function setId($id){
            $this->id = $id;
        }

        function setReservado($reservado){
            $this->reservado = $reservado;
        }

        function setDiaReservado($dia_reservado){
            $this->dia_reservado = $dia_reservado;
        }

        function setNombre($nombre){
            $this->nombre = $nombre;
        }

        function setPrecio($precio){
            $this->precio = $precio;
        }

        function setImagen($imagen){
            $this->imagen = $imagen;
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

        function setContactoimagen($contacto_imagen){
            $this->contacto_imagen = $contacto_imagen;
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

    function deleteUser($id){
        $conn = getConnection();
        $sql = "SELECT * FROM Users";
    }

    //Admin Panel
    function getAllvehiculos($type){
        $conn = getConnection();
        $vehiculos = array();
        if($type === 'all'){
            $sql = "SELECT * FROM Users";
        }else if($type === 'admin'){
            $sql = "SELECT * FROM Users WHERE type LIKE 'admin'";
        }else if($type === 'users'){
            $sql = "SELECT * FROM Users WHERE type LIKE 'user'";
        }
        foreach($conn->query($sql) as $row){
            $vehiculo = new vehiculo();
            $vehiculo->setData($row['id'],$row['usuario'],$row['precio'],$row['imagen'],$row['km']);
            array_push($vehiculos,$vehiculo);
        }
        return $vehiculos;
    }

    function deletevehiculo($id){
        $conn = getConnection();
        $sql = "SELECT * FROM vehiculos";
    }


    function insertVehicle($vehiculo){
        echo print_r($vehiculo);
        $conn = getConnection();
        
        try{
            $gsent = $conn->prepare("INSERT INTO Vehicles (nombre,precio,imagen,km,caracteristicas,color,marca,modelo,anno,contacto_tlf,contacto_imagen) 
            VALUES(:nombre,:precio,:imagen,:km,:caracteristicas,:color,:marca,:modelo,:anno,:contacto_tlf,:contacto_imagen)");
            $gsent->bindParam(":nombre", $vehiculo['nombre']);
            $gsent->bindParam(":precio", $vehiculo['precio']);
            $gsent->bindParam(":imagen",$vehiculo['imagen']);
            $gsent->bindParam(":km",$vehiculo['km']);
            $gsent->bindParam(":caracteristicas",$vehiculo['caracteristicas']);
            $gsent->bindParam(":color",$vehiculo['color']);
            $gsent->bindParam(":marca",$vehiculo['marca']);
            $gsent->bindParam(":modelo",$vehiculo['modelo']);
            $gsent->bindParam(":anno",$vehiculo['anno']);
            $gsent->bindParam(":contacto_tlf",$vehiculo['contacto_tlf']);
            $gsent->bindParam(":contacto_imagen",$vehiculo['contacto_imagen']);
            
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

    //Filtrador de Busquedas

    function buscarPorPrecio(){

    }

    function buscarPoranno(){

    }

    function buscarPorModelo(){

    }

    function filtrarNombre(){

    }

    function buscarVehiculo(){

    }


    //Test Purposefully
    function generateTableTest(){
        
    }
?>
