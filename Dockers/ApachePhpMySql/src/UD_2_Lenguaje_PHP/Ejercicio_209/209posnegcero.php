<?php 
    if (!empty($_POST["numero"]) || $_POST["numero"] == 0)
    {
        $numero = $_POST["numero"];

        if ($numero > 0) {
            echo("El número es positivo.");
        } elseif ($numero < 0) {
            echo("El número es negativo.");
        } else {
            echo("El número es 0.");
        }
    }
?>