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
    <section>
        <div>
            <img src="https://lumiere-a.akamaihd.net/v1/images/image_a40571d0.jpeg?region=0,0,540,810" 
                height="300px" width="auto" alt="ERROR">
            <h3>Blanca nieves</h3>
        </div>
        <div>
            <img src="https://hips.hearstapps.com/es.h-cdn.co/crfes/images/ninos/ocio/peliculas-para-ver-en-familia/brave-indomable/3633391-1-esl-ES/Brave-Indomable.jpg?resize=980:*" 
                height="300px" width="auto" alt="ERROR">
            <h3>Brave</h3>
        </div>
        <div>
            <img src="https://lumiere-a.akamaihd.net/v1/images/image_33cbada0.jpeg?region=0,0,540,810&width=480" 
                height="300px" width="auto" alt="ERROR">
            <h3>Del revés 2</h3>
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