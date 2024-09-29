<?php

if (!empty($_POST))
{
    $base = $_POST["base"];
    $exponente = $_POST["exponente"];

    $resultado = $base;

    for ($i=1; $i < $exponente; $i++) 
    { 
        $resultado *= $base;
    }
    echo($resultado);
}

?>