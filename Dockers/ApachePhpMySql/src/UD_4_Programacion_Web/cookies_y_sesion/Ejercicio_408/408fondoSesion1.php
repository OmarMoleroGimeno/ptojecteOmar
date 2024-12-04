<?php

    session_start();
    $bgColor = '#000000';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bgColor'])) 
    {
        $_SESSION["bgColor"] = '#' . $_POST['bgColor'];
        $bgColor = $_SESSION["bgColor"];
    }

    echo "<style>body{background-color:" .  $bgColor . ";</style>";

    echo "<form method='POST' action='./408fondoSesion2.php'>
            <select name='bgColor'>
                <option value='0c80fc'>Azul</option>
                <option value='55fc0c'>Verde</option>
                <option value='000000'>Negro</option>
                <option value='fbf82c'>Amarillo</option>
                <option value='f61300'>Rojo</option>
            </select>
            <br>
            <button type='submit'>Guardar</button>
          </form>";

?>