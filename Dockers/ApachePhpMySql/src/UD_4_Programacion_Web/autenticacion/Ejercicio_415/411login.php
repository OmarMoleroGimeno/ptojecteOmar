<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['nombre'] != '' && $_POST['contrasenha'] != '') 
    {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['contrasenha'] = $_POST['contrasenha'];
        $_SESSION['peliculas'] = [
            'Blanca nieves',
            'Brave',
            'Del revés 2'
        ];
        $_SESSION['series'] = [
            'Dark',
            'Mindfullness',
            'Stranger things'
        ];
        header('Location: 412peliculas.php');
    }
    else
    {
        echo '<h1>Usuario o contraseña inválidos</h1>';
    }
?>