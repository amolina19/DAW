<?php

if($_POST['borrarBtn']){
    $conn = getPDODatabase();
    $ids = getIDsDelete();
    deleteRow($conn,$ids);
    
}

function getIDsDelete(){
    global $ids;
    if(isset($_POST['borrar'])){
        
        for($i=0;$i<sizeof($_POST['borrar']);$i++){
            $ids[$i] = $_POST['borrar'][$i]; 
        }
    }
    return $ids;
}

function generateBtn($rows){
    if($rows > 0){
        echo "<div class='row mt-4'>";
        echo "<input type='submit' class='btn btn-danger' name='borrarBtn' value='Eliminar Noticias'>";
        echo "</div>";
    }
    echo "<div class='row mt-4'>";
    echo "<input class='btn btn-success' type='submit' name='insertar' value='Insertar Noticia'>";
    echo "</div>";
}

function deleteRow($conn,$arrayRow){
    $count = 0;
    $id;
    
    for($i=0;$i<sizeof($_POST['borrar']);$i++){
        $id = $_POST['borrar'][$i];
        //echo $id;
        //echo "".$sql;
        $sql = "DELETE FROM noticias WHERE id=".$id."\n";
        $conn->query($sql);
        $count++;
    }
    //updateTable($conn,"Todas");
    echo "Se han eliminado ".$count." elementos";
}



?>