<?php

  include_once 'modules.php';
  include_once dirname(__DIR__).'/logic/session.php';
  include_once dirname(__DIR__).'/logic/buttons.php';
  include_once dirname(__DIR__).'/logic/database.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php if($_SESSION['type'] === 'admin'){generateAdminMenu();}else{
    header("Location: index.php");
  } ?>

  <?php if(!isset($_POST['editar-']) && !isset($_POST['eliminar-']) && !isset($_POST['modvehiculo'])){
    echo "<form method='post'>";
    echo "<div class='container-fluid'>";
    echo "<div class='d-flex justify-content-center mt-2'>";
    echo "<select name='filtrarusuarios' class='form-select'>";
    echo "<option value='all'>Todos</option>";
    echo "<option value='users'>Usuarios</option>";
    echo "<option value='admin'>Administradores</option>";
    echo "</select>";
    echo "<input type='submit' class='btn btn-warning ml-2' value='Filtrar' name='filtrarpor'>";
    echo "</div></div>";
  } ?>

  <?php if($_SESSION['type'] === 'admin'){
    
      
      if(isset($_POST['filtrarpor'])){
        generateUsersListView($_POST['filtrarusuarios']);
        //echo "test1";
      }else if(isset($_POST['moduser'])){
        generateUsersListView(('all'));
        //echo "test2";
      }else if(isset($_POST['modvehiculo'])){
        generateVehiclesListView();
      }else{
        //echo "test4";
        generateUsersListView('all');
      }
    } 
  ?>

  </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>