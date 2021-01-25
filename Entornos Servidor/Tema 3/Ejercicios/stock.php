<?php

include_once "configuracion.php";
$productos = null;


if($_POST['stockbutton']){
  if($_POST['stockselect']){
    print "Entro";
    print $_POST['stockselect'];
    $resultado = queryConnect("select tienda.nombre,stock.unidades from producto,tienda,stock where producto.cod = stock.producto AND tienda.cod = stock.tienda AND producto.cod = ".$_POST['stockselect']);
    print_r($resultado);
    /*
    for($i=0;$i<sizeof($resultado);$i++){
      $tienda = $resultado[$i]['tienda.nombre'];
      $unidades = $resultado[$i]['stock.unidades'];
  
      echo "<div>Este producto tiene ".$unidades." en ".$tienda."</div>";
    }
    */
  
  }
}


//obtenerProductos();

function obtenerProductos(){
  global $productos;
  $productos = queryConnect("select cod,nombre_corto from producto");
  //print $productos->fetch_array();
  for($i=0;$i<sizeof($productos);$i++){
    $nombre = $productos[$i]['nombre_corto'];
    $cod = $productos[$i]['cod'];
    echo "<option value='$cod'>$nombre</option>";
  }
  //print_r($productos);
}
?>



<!doctype html>
<html lang="en">
  <head>
    <title>Stock</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">

      <div id="encabezado">
        <h1>Ejercicio: </h1> 
          <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

          <div class="row">
              <div class="col-8">
                  <select name="stockselect" id="stockselect"> <?php obtenerProductos(); ?></select>
              </div>
              <div class="col-4">
                  <input type="submit" id="stockbutton" name="stockbutton" value="Mirar Stock">
              </div>
          </div>

          <div class="row">

          </div>

        </form>
      </div>
        
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>