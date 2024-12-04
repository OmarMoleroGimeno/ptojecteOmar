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
    <section>
        <div>
            <img src="https://pics.filmaffinity.com/Dark_Serie_de_TV-111203947-large.jpg" 
                height="300px" width="auto" alt="ERROR">
            <h3>Dark</h3>
        </div>
        <div>
            <img src="https://pics.filmaffinity.com/Mindfulness_para_asesinos_Serie_de_TV-714157520-large.jpg" 
                height="300px" width="auto" alt="ERROR">
            <h3>Mindfullness</h3>
        </div>
        <div>
            <img src="https://hips.hearstapps.com/hmg-prod/images/5wducarmueomnh1wkca65pputxv-66ab60c945d48.jpg?crop=1xw:1xh;center,top&resize=980:*" 
                height="300px" width="auto" alt="ERROR">
            <h3>Stranger things</h3>
        </div>    
    </section>
    
    
    <style>
        section {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        div {
            padding: 40px;
        }
    </style>
</body>
</html>