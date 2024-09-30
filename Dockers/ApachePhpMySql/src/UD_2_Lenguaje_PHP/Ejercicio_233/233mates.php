<?php
    $arrayNumeros = [];
    for ($i=0; $i < 33; $i++)
    {
        $arrayNumeros[] = rand(0, 100);
    }
    $mayor = max($arrayNumeros);
    $menor = min($arrayNumeros);
    $suma = array_sum($arrayNumeros);
    $cantidad = count($arrayNumeros);

    $media = $suma / $cantidad;
    echo("<p>Mayor: $mayor</p>");
    echo("<p>Menor: $menor</p>");
    echo("<p>Media: ". round($media) . "</p>");
?>