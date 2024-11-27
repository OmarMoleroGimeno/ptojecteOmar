<?php
    ob_start(); // Evitar problemas con encabezados

    $colorFondo = '#000000';

    // Gestionar fondo
    if (isset($_COOKIE['fondo'])) {
        $accesosPagina = $_COOKIE['accesos']; // Recuperar el valor de la cookie
        setcookie('accesos', ++$accesosPagina); // Incrementar y actualizar la cookie
        echo "<h1>Bienvenido de nuevo</h1>";
        echo "<p>Acceso nº $accesosPagina</p>";
    } else {
        setcookie('fondo', ++$accesosPagina); // Crear la cookie
        echo "<h1>Bienvenido por primera vez</h1>";
        echo "<p>Acceso nº $accesosPagina</p>";
    }
    echo "<br><a href='406contadorVisitas.php?reset=1'>Reiniciar contador</a>";

    ob_end_flush(); // Enviar salida al navegador
?>