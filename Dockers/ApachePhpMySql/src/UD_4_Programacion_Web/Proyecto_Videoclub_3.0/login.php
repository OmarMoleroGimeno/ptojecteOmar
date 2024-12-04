<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['usuario'] != '' && $_POST['contrasenha'] != '') 
    {
        if ($_POST['usuario'] == 'usuario' && $_POST['usuario'] == 'usuario') 
        {
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasenha'] = $_POST['contrasenha'];
            header('Location: main.php');
        }
        else if ($_POST['usuario'] == 'admin' && $_POST['contrasenha'] == 'admin') 
        {
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['contrasenha'] = $_POST['contrasenha'];
            header('Location: main.php');
        }
        else
        {
            header('Location: index.php');
        }
        
    }
    else
    {
        echo '<h1>No has introducido nada</h1>';
    }
?>