<?php

if (!empty($_POST))
{
    $base = $_POST["base"];
    $exponente = $_POST["exponente"];

    $resultado = $base;

    $a = 1;
    while ($a < $exponente) {
        $resultado *= $base;
        $a++;
    }
    echo($resultado);
}

?>