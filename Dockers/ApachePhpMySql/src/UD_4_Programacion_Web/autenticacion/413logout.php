<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        session_unset(); // Limpiar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header('Location: 410index.php'); // Redirigir al login
        exit;
    }
?>