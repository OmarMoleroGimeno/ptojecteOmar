<?php
    if (!empty($_POST))
    {
        $hora = $_POST["hora"];
        $minutos = $_POST["minutos"];
        $segundos = $_POST["segundos"];

        if ($segundos == 59)
        {
            $segundos = 0;

            if ($minutos == 59)
            {
                $minutos = 0;
                if ($hora == 23)
                {
                    $hora = 0;
                }
                else
                {
                    $hora++;
                }
            }
            else
            {
                $minutos++;
            }
        }
        else
        {
            $segundos++;
        }

        echo("$hora:$minutos:$segundos");
    }
?>