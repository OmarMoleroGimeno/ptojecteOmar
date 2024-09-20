<?php 
    if (!empty($_POST["edad"]))
    {
        $edad = $_POST["edad"];
        $salida = match (true) {
            $edad < 3 => 'Eres un bebé',
            $edad < 12 => 'Eres un niño',
            $edad < 17 => 'Eres un adolescente',
            $edad < 66 => 'Eres un adulto',
            $edad >= 66 => 'Eres un jubilado ',
        };
        echo($salida);
    }
?>