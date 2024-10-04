<?php
    include '244biblioteca.php';
    if (!empty($_POST)) 
    {
        $metodos = ['sumar', 'restar', 'multiplicar', 'dividir'];
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        for ($i = 0; $i < count($metodos); $i++)
        {
            $nombreFuncion = $metodos[$i];
            echo("El resultado de $nombreFuncion($num1, $num2) es: " . $nombreFuncion($num1, $num2) . "<br/>");
        }

    }
?>