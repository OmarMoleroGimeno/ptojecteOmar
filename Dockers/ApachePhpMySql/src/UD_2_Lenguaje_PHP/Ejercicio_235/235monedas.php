<?php
    $billetes = ['500', '200', '100', '50', '20', '10' , '5', '2', '1'];
    $billetes = array_fill_keys($billetes, 0);

    $num = 4432;

    foreach ($billetes as $key => $billete) 
    {
        $resultado = intval($num/$key);
        $billetes[$key] = $resultado;
        if ($key > 2) 
        {
            echo("Hay $billetes[$key] billetes de $key<br/>");
        }
        else
        {
            echo("Hay $billetes[$key] monedas de $key<br/>");
        }
        $num %= $key;
    }
?>