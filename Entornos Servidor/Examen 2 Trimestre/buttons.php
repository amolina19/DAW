<?php

    function generateButton($conn,$button){
        
        if($button == 'Curso'){
            echo "<select name='curso' id='curso' class='ml-2 mb-2 mr-2'>";
            $sql = 'SELECT DISTINCT Curso from Alumnos';
            foreach ($conn->query($sql) as $row) {
                $curso = $row['Curso'];
                echo "<option value='$curso'>".$curso."</option>";
            }
        }else if($button == 'Letra'){
            echo "<select name='letra' id='letra' class='ml-2 mb-2 mr-2'>";
            $sql = 'SELECT DISTINCT Letra from Alumnos';
            foreach ($conn->query($sql) as $row) {
                $letra = $row['Letra'];
                echo "<option value='$letra'>".$letra."</option>";
            }
        }
        echo "</select>";
    }


?>