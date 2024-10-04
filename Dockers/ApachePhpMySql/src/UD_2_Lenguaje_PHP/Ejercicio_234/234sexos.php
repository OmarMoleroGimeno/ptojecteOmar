<?php
    $arraySexo = [];
    for ($i=0; $i < 100; $i++)
    {
        $numRand = rand(0, 1);
        if ($numRand == 1) 
        {
            $arraySexo[] = "M";
        } else 
        {
            $arraySexo[] = "F";
        }
    }
    print_r(array_count_values($arraySexo));
?>