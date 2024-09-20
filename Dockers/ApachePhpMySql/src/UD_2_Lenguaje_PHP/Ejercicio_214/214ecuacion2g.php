<?php
    if (!empty($_POST))
    {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        $primerPaso = pow($b, 2) - (4*$a*$c);

        if ($primerPaso < 0)
        {
            echo("No tiene solución.");
        }
        else if ($primerPaso == 0)
        {
            echo("La solución es " . ((-$b)/2*$a));
        }
        else
        {
            $solucion1 = ( ( (-$b) + sqrt($primerPaso) ) / ( 2*$a ) );
            $solucion2 = ( ( (-$b) - sqrt($primerPaso) ) / ( 2*$a ) );
            echo("Solución 1: $solucion1 </br>");
            echo("Solución 2: $solucion2");
        }
    }
?>