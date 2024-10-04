<?php
    declare(strict_types= 1);
    function esPar(int $num): bool
    {
        $esPar = false;
        if ($num%2 == 0)
        {
            $esPar = true;
        }
        return $esPar;
    }

    function generarArray(int $tam, int $max, int $min): array
    {
        $arr = [];
        for ($i = 0; $i < $tam; $i++)
        {
            $arr[] = rand($min, $max);
        }
        return $arr;
    }

    function arrayPares(array &$array): int
    {
        $count = 0;
        for ($i = 0; $i < count($array); $i++)
        {
            if (($array[$i] % 2) == 0) {
                $count++;
            }
        }
        return $count;
    }

    echo (esPar(1) ? 'true <br/>' : 'false <br/>');

    $resultado = generarArray(5, 100, 1);
    print_r($resultado);

    $miArray = [4, 7, 10, 13, 22, 35, 44];
    echo ("<br/>");
    echo arrayPares($miArray);
?>