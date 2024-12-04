<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bgColor'])) {
        $_SESSION["bgColor"] = '#' . $_POST['bgColor'];
        $bgColor = $_SESSION["bgColor"];
    }

    if (isset($_GET['action']) && $_GET['action'] === 'clear') {
        session_unset(); // Limpiar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: 408fondoSesion1.php'); // Redirigir a la página anterior
        exit;
    }

    echo "<style>body{background-color:" .  $bgColor . ";</style>";
    echo '  <a href="408fondoSesion1.php">Volver a la página anterior</a><br><br>
            <a href="408fondoSesion2.php?action=clear">Vaciar sesión y volver a la página anterior</a>';
?>