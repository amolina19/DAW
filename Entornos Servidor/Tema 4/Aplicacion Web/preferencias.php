<?php

    include_once 'funciones.inc.php';

    if(isset($_POST['establecer'])){
        $value = $_POST['background'];
        setCookiePreference($value);
    }

    if(isset($_POST['restablecer'])){
        deletePreferences();
    }

    if(isset($_POST['volver'])){
        header('Location: aplicacion.php');
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Preferencias</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body <?php if(isset($_COOKIE ['background'])){setBackground();} ?> >
      <center>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-5">
        <b><label for="background">Color de Fondo</label><b>
        <select name="background">
            <option value="white">Blanco</option>
            <option value="yellow">Amarillo</option>
            <option value="green">Verde</option>
            <option value="blue">Azul</option>
            <option value="orange">Naranja</option>
            <option value="purple">Morado</option>
            <option value="gray">Gris</option>
            <option value="red">Rojo</option>
        </select>
        <input type="submit" value="Establecer" name="establecer">
        <input type="submit" value="Restablecer valores" name="restablecer">
        <input type="submit" value="Volver" name="volver">
      </form>
      </center>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>