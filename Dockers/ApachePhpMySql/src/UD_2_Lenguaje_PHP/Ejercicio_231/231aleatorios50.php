<?php
    $arrayNumeros = [];
    for ($i=0; $i < 50; $i++)
    {
        $arrayNumeros[] = rand(0, 99);
    }
    $cadena = "<ul>";
    for ($i=0; $i < count($arrayNumeros); $i++)
    { 
        $cadena .= "<li>" . $arrayNumeros[$i] . "</li>";
    }
    $cadena .= "</ul>";
    echo($cadena);
?>