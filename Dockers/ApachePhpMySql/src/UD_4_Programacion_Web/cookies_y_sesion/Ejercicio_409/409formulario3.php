<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $convivientes = $_POST['convivientes'];
        $menuFavorito = $_POST['menu'][0];
        $aficiones = $_POST['aficiones'][0];
    }

    echo '<ul>';
    echo '<li>Nombre => ' .  $_SESSION["nombre"] . "</li>";
    echo '<li>Email => ' .  $_SESSION["email"] . "</li>";
    echo '<li>Sexo => ' .  $_SESSION["sexo"] . "</li>";
    echo '<li>Conviventes => ' .  $convivientes  . "</li>";
    echo '<li>Menu Favorito => ' .  $menuFavorito  . "</li>";
    echo '<li>Nombre => ' .  $aficiones  . "</li>";
    echo '</ul>';
?>