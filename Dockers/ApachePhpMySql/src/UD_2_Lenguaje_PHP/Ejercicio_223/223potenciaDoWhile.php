<?php

if (!empty($_POST))
{
    $base = $_POST["base"];
    $exponente = $_POST["exponente"];

    $resultado = $base;

    $a = 1;
    do {
        if ($a == 1)
        {
            $resultado = $base;
        }
        else 
        {
            $resultado *= $base;
        }
        $a++;
    } while ($a < $exponente);
    echo($resultado);
}

?>