<?php
    // Evitar problemas con encabezados
    ob_start();

    $accesosPagina = 0;

    // Comprobar si el usuario quiere reiniciar el contador
    if (isset($_GET['reset']) && $_GET['reset'] == '1') {
        setcookie('accesos', '', time() - 3600); // Eliminar la cookie
        echo "<h1>El contador de visitas ha sido reiniciado.</h1>";
        echo "<a href='406contadorVisitas.php'>Volver a la página principal</a>";
        exit;
    }

    // Gestionar el contador de visitas
    if (isset($_COOKIE['accesos'])) {
        $accesosPagina = $_COOKIE['accesos']; // Recuperar el valor de la cookie
        setcookie('accesos', ++$accesosPagina); // Incrementar y actualizar la cookie
        echo "<h1>Bienvenido de nuevo</h1>";
        echo "<p>Acceso nº $accesosPagina</p>";
    } else {
        setcookie('accesos', ++$accesosPagina); // Crear la cookie
        echo "<h1>Bienvenido por primera vez</h1>";
        echo "<p>Acceso nº $accesosPagina</p>";
    }
    echo "<br><a href='406contadorVisitas.php?reset=1'>Reiniciar contador</a>";

    ob_end_flush(); // Enviar salida al navegador
?>
