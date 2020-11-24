<?php
echo getHTML("test");

function getHTML($title){

    $returned = 
    "<html>
    <head>
    <title>$title</title>
    </head>
    <body>
    <h1>$title
    </body>
    </html>";

    return $returned;
}

?>
