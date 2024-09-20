<?php
    if (!empty($_POST["edad"]))
    {
        $edad = $_POST["edad"];

        echo("Edad hace 10 años: " . ($edad - 10)  . "</br>");
        echo("Edad dentro 10 años: " . ($edad + 10) . "</br>");
        if ($edad < 67)
        {
            echo("Años hasta la jubilación: " . (67 - $edad));
        }
        else
        {
            echo("Ya estas jubilado.");
        }

    }
?>