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
    <title>Películas</title>
</head>
<body>
    <form method="post" action="./413logout.php">
        <button type="submit">log out</button>  
    </form>

    <a href="./414series.php">Listado Series</a>
    <h1>Listado de Películas</h1>
    <ul>
        <?php foreach ($_SESSION['peliculas'] as $pelicula): ?>
                <li>
                    <?= htmlspecialchars($pelicula) ?>
                </li>
        <?php endforeach; ?>   
    </ul>
</body>
</html>