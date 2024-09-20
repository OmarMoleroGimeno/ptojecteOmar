<?php 
    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $email = $_POST['email'];
    $añoDeNacimiento = $_POST['añoDeNacimiento'];
    $telefono = $_POST['telefono'];

    echo("
        <style>
            table {
                border: #b2b2b2 1px solid;
            }
            td, th {
                border: black 1px solid;
            }
        </style>
        <table>
            <tr>
                <td>Nombre</td>
                <td>$nombre</td>
            </tr>
            <tr>
                <td>Primer apellido</td>
                <td>$primerApellido</td>
            </tr>
            <tr>
                <td>Segundo apellido</td>
                <td>$segundoApellido</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>$email</td>
            </tr>
            <tr>
                <td>Año de nacimiento</td>
                <td>$añoDeNacimiento</td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td>$telefono</td>
            </tr>
        </table>");
?>