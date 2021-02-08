<?php


function updateTable($conn,$categoria){
    $rows = 0;
    if($categoria === 'todas'){
        $sql = "SELECT id,titulo,texto,fecha,imagen,categoria FROM noticias";
    }else{
        $sql = "SELECT id,titulo,texto,fecha,imagen,categoria FROM noticias WHERE categoria LIKE '$categoria'";
    }
    $output = "<table>";
    
    $table = false;
    foreach ($conn->query($sql) as $row) {
        
        if($table === false){
            echo "<table>";
            echo "<tr><th>Titulo</th><th>Texto</th><th>Fecha</th><th>Imagen</th><th>Borrar</th></tr>";
            $table = true;
        }
        echo "<tr>";
        echo "<td>".$row['titulo']."</td>";
        echo "<td>".$row['texto']."</td>";
        echo "<td>".date2string($row['fecha'])."</td>";
        echo "<td>".$row['imagen']."</td>";
        echo "<td><input type='checkbox' type='hidden' name='borrar[]' value='".$row['id']."''></td>";
        echo "</tr>";
        $rows += 1;
    }
    echo "</table>";
    return $rows;
}
?>