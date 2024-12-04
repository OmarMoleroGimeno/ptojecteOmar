<?php
    session_start();

    // Redirigir al inicio de sesión si el usuario no está logueado
    if (!isset($_SESSION['nombre']) || !isset($_SESSION['contrasenha'])) 
    {
        header('Location: 410index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series</title>
</head>
<body>
    <form method="post" action="./413logout.php">
        <button type="submit">log out</button>
    </form>
    <a href="./412peliculas.php">Listado Películas</a>
    <h1>Listado de Series</h1>
    <ul>
        <?php foreach ($_SESSION['series'] as $serie): ?>
                <li>
                    <?= htmlspecialchars($serie) ?>
                </li>
        <?php endforeach; ?>   
    </ul>
</body>
</html>