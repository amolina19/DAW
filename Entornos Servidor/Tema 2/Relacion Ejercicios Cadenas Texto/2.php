<?php
    $email = $_POST["email"];
    check($email);

    function check($email){
        if(strpos($email, "@") !== FALSE && strpos($email,".") !== FALSE){
            $domain = strstr($email,"@");
            $domain = substr($domain,1,strlen($domain));
            $name = substr($email,0,strpos($email,"@"));
            echo "Email verificado";
            echo "<br>";
            echo "Dominio:  ".$domain."<br>";
            echo "Nombre: ".$name;
        }else{
            echo "Email no verificado";
        }
    }
?>

<html>
    <head></head>

    <body>
        <form method="post">
            <p>Introduce una direccion Email <input type="text" name="email" placeholder="Introduce el email"></p>
            <input type="submit">
        </form>
    </body>
</html>