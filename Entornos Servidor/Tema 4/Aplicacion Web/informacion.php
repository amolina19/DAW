<?php

    include_once 'funciones.inc.php';
    session_start();
    
    if(isset($_POST["volver"])){
        header("Location: aplicacion.php");
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Información</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body <?php if(isset($_COOKIE ['background'])){setBackground();} ?> >
    <?php generateNav(); ?>
    <div class="container">
        <center>
        <div class="mt-4">
            <h1>Información</h1>
        </div>
        </center>

        <div class="mt-2">
            <p>
                Es una aplicación web sencilla que permita a un usuario acceder a una parte de la aplicación u otra en función de si se ha autentificado o no. Dicha aplicación constará de las siguientes páginas:
            </p>
            <ul>
                <li><b>Index.php</b>
                    <p>Deberá ofrecer un formulario para que el usuario pueda introducir su usuario y contraseña y poder autentificarse. También debe ofrecer la posibilidad de acceder comoinvitado. Si se accede como invitado sólo podrá acceder a la página de información(información.php). En caso de que se introduzca un usuario y contraseña se comprobará que dicho usuario esté dado de alta en la base de datos (en la tabla usuarios). Si el usuario ycontraseña son correctos se creará una sesión y se tendrá acceso a la página aplicación.php. Las contraseñas están almacenadas en la base de datos usando hashing de una solavía mediante la función password_hash, por lo tanto para comprobar si una contraseña es correcta se deberá usar la función password_verify.</p>
                </li>
                <li><b>Informacion.php</b>
                    <p>Página que tan solo muestra la información de uso de la aplicación. En ella se debe explicar el funcionamiento de la aplicación. Debe ofrecer un enlace para volvera la página de inicio (index.php).</p>
                </li>
                <li><b>Aplicacion.php</b>
                    <p>A esta página sólo tendrán acceso los usuarios que hayan sido autentificados. Se controlará su acceso mediante sesiones (las sesiones almacenarán elnombre del usuario y la hora de conexión). Esta página debe ofrecer un menú que permit aacceder a la página de información (información.php), a la página de preferencias(preferencias.php) y a la desconexión del usuario.</p>
                </li>
                <li><b>Preferencias.php</b>
                    <p>Esta página permitirá al usuario seleccionar el color de fondo con el que se mostrarán todas las páginas. Estas preferencias serán guardadas en una cookie. En caso deque no se hayan establecido preferencias el color por defecto será el blanco. Esta página también ofrecerá la opción de restablecer las preferencias (debe eliminar la cookie). </p>
                </li>
                <li><b>Funciones.inc</b>
                    <p>Página que constará de las funciones usadas en la aplicación. Al menos constará de las funciones de acceso y control a la base de datos. </p>
                </li>
            </ul>

            <p>En todas las páginas se mostrará el nombre del usuario conectado y la hora a la que se conectó (horaen la que inició la sesión) junto a la opción de cerrar la sesión.</p>
        </div>
        
        
        
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>