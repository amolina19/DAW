<?php

    include_once 'fecha.php';

    function generateTable($conn,$filtro){
        //Filtro Index 0 Curso, Index 1 Letra, en case de ser en los 2 index -1 se hara un select de todo.
        if($filtro[0] === -1 && $filtro[1] == -1){
            $sql = "SELECT N_expdte,Nombre,Apellidos,Fecha_nac,Curso,Letra FROM Alumnos ORDER BY Apellidos";
        }else{
            $sql = "SELECT N_expdte,Nombre,Apellidos,Fecha_nac,Curso,Letra FROM Alumnos WHERE Curso LIKE '$filtro[0]' AND Letra LIKE '$filtro[1]' ORDER BY Apellidos";
            //echo $sql;
        }
        $output = "<table>";
        
        $table = false;
        foreach ($conn->query($sql) as $row) {
            
            if($table === false){
                echo "<table class='mt-5 mb-5'>";
                echo "<tr><th>Nº Expediente</th><th>Nombre</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>Curso</th><th>Letra</th></tr>";
                $table = true;
            }
            echo "<tr>";
            echo "<td>".$row['N_expdte']."</td>";
            echo "<td>".$row['Nombre']."</td>";
            echo "<td>".$row['Apellidos']."</td>";
            echo "<td>".date2string($row['Fecha_nac'])."</td>";
            echo "<td>".$row['Curso']."</td>";
            echo "<td>".$row['Letra']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

?>