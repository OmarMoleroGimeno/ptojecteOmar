<?php
    if (!empty($_POST))
    {
        $dia = $_POST["dia"];
        $mes = $_POST["mes"];
        $anho = $_POST["anho"];

        $diasMes = 31;

        if ($mes == 2)
        {
            $diasMes = 28;
        }
        elseif ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11)
        {
            $diasMes = 30;
        }

        if ($dia == $diasMes)
        {
            if ($mes == 12)
            {
                $anho++;
                $mes = 1;
            }
            else
            {
                $mes++;
                $dia = 1;
            }
        }
        else
        {
            $dia++;
        }

        echo("$dia/$mes/$anho");
    }
?>