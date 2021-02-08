
<?php


//DEPRECATED use updateTable
function generateTable($conn){

    $output = "<table>";
    $sql = 'SELECT titulo,texto,fecha,imagen FROM noticias';
    echo "<table>";
    echo "<tr><th>Titulo</th><th>Texto</th><th>Fecha</th><th>Imagen</th><th>Borrar</th></tr>";
    foreach ($conn->query($sql) as $row) {
        echo "<tr>";
        echo "<td>".$row['titulo']."</td>";
        echo "<td>".$row['texto']."</td>";
        echo "<td id='fecha'>".$row['fecha']."</td>";
        echo "<td>".$row['imagen']."</td>";
        echo "<td><input type='checkbox'></td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>