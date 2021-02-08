<?php

function enviarformulario(){
    $titulo = $_POST['formulario'][0];
    $texto = $_POST['formulario'][1];
    $fecha = $_POST['formulario'][2];
    $imagen = $_POST['formulario'][3];
    $categoria = $_POST['formulario'][4];
    $conn = getPDODatabase();

    try{
        $gsent = $conn->prepare("INSERT INTO noticias (titulo, texto, categoria,fecha, imagen) VALUES(:titulo,:texto,:categoria,:fecha,:imagen)");
        //$gsent->bindParam(":id", $id);
        $gsent->bindParam(":titulo", $titulo);
        $gsent->bindParam(":texto", $texto);
        $gsent->bindParam(":categoria", $categoria);
        $gsent->bindParam(":fecha", $fecha);
        $gsent->bindParam(":imagen", $imagen);
        
        if($gsent->execute()){
            echo "Se ha insertado un nuevo elemento";
        }
    }catch(PDOException $e){
        die("Connection to database failed: " . $e->getMessage());
        echo "Connection to database failed:".$e->getMessage();
    }
    
    //echo $sql;
    //$conn->query($sql);
}

function obtainCategorias(){
    $conn = getPDODatabase();
    $sql = 'SELECT DISTINCT categoria from noticias';
    $categorias;
    foreach ($conn->query($sql) as $row) {
        $categorias[] = $row['categoria'];
    }
    return $categorias;
}

function generateSelectCategoria(){
    $categorias = obtainCategorias();
    //echo var_dump($categorias);
    echo "<select name='formulario[]'>";

    if(sizeof($categorias) === 0){
        echo "<option value='Promociones'>Promociones</option>";
        echo "<option value='Costas'>Costas</option>";
        echo "<option value='Ofertas'>Ofertas</option>";
    }else{
        for($i=0;$i<sizeof($categorias);$i++){
            echo "<option value='".$categorias[$i]."'>".$categorias[$i]."</option>";
            echo $categorias[$i];
        }
    }
    
    echo "</select>";
}


if($_POST['enviarformulario']){
    if(isset($_POST['formulario'])){
        enviarformulario();
    }
}

function generateFormulario(){
    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    echo "<div class='mt-2'><h5>Titulo</h5></div>";
    echo "<div class='mt-2'><input type='text' name='formulario[]'></div>";
    echo "<div class='mt-2'><h5>Texto</h5></div>";
    echo "<div class='mt-2'><textarea rows='4' cols='50' type='text' name='formulario[]'></textarea></div>";
    echo "<div class='mt-2'><h5>Fecha</h5></div>";
    echo "<div class='mt-2'><input type='date' name='formulario[]'></div>";
    echo "<div class='mt-2'><h5>Imagen</h5></div>";
    echo "<div class='mt-2'><input type='text' name='formulario[]'></div>";

    echo "<div class='mt-2'><h5>Categoria</h5></div>";
    echo "<div class='mt-2'>".generateSelectCategoria()."</div>";

    echo "</div>";

    
    echo "</div>";
    echo "<div class='row mt-5'>";
    echo "<div><input type='submit' class='btn btn-primary' name='enviarformulario'>";
    echo "</div>";
}


?>