<?php

    if (!empty($_POST))
    {
        $lonigtud = count($_POST);
        $suma = 0;
        for ($i=0; $i < $lonigtud; $i++) 
        {
            $suma += $_POST[$i];
        }
        echo("La suma total de los números es: $suma");
    }

?>