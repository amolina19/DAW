<?php

    session_start();
    //$link = "file://".$_SESSION["link"];
    print($link);
    //$fichero = file_get_contents($_SESSION["link"]);
    $fh = fopen($_SESSION["link"], 'r');
    $pageText = fread($fh, 25000);
    echo nl2br($pageText);
    //print($fichero);
    //echo $link;
    //header("Location: "."$link");
?>