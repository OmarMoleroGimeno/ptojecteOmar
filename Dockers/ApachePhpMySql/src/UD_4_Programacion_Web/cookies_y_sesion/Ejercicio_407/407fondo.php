<?php
    ob_start(); // Evitar problemas con encabezados

    $bgColor = isset($_COOKIE['bgColor']) ? $_COOKIE['bgColor'] : '#000000';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bgColor'])) 
    {
        $bgColor = '#' . $_POST['bgColor'];
        setcookie('bgColor', $bgColor, time() + 86400); // Cookie válida por 24 horas
    }

    echo "<style>body{background-color:" .  $bgColor . ";</style>";

    echo "<form method='POST' action=''>
            <select name='bgColor'>
                <option value='0c80fc' " . ($bgColor === '#0c80fc' ? 'selected' : '') . ">Azul</option>
                <option value='55fc0c' " . ($bgColor === '#55fc0c' ? 'selected' : '') . ">Verde</option>
                <option value='000000' " . ($bgColor === '#000000' ? 'selected' : '') . ">Negro</option>
                <option value='fbf82c' " . ($bgColor === '#fbf82c' ? 'selected' : '') . ">Amarillo</option>
                <option value='f61300' " . ($bgColor === '#f61300' ? 'selected' : '') . ">Rojo</option>
            </select>
            <br>
            <button type='submit'>Guardar</button>
          </form>";


    ob_end_flush(); // Enviar salida al navegador
?>