<?php

function generateCategoria($conn){
    echo "<select name='categoria' id='categoria' class='ml-2 mb-2'>";
    //SHOW COLUMnS FROM noticias LIKE 'categoria';
    $sql = 'SELECT DISTINCT categoria from noticias';
    echo "<option value='todas'>Todas</option>";

    foreach ($conn->query($sql) as $row) {
        $cat = $row['categoria'];
        echo "<option value='$cat'>".$cat."</option>";
    }

    
    echo "</select>";
}

?>