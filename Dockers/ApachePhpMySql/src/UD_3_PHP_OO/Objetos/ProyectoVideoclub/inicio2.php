<?php
    namespace Objetos\ProyectoVideoclub;
    use Objetos\ProyectoVideoclub\CintaVideo;
    use Objetos\ProyectoVideoclub\Dvd;
    use Objetos\ProyectoVideoclub\Juego;
    use Objetos\ProyectoVideoclub\Cliente;
    use Objetos\ProyectoVideoclub\Videoclub;
    include_once "./cintaVideo.php";
    include_once "./dvd.php";
    include_once "./juego.php";
    include_once "./cliente.php";
    include_once "./videoClub.php";

    echo('<div class="centrado">
            <img height="300em"  src="./Assets/JPnAV2HBlz6VHh92gjcviUq39JrPvnJNbtti56xDgS9Aza6E-removebg-preview.png" alt="Feo">
        </div>');

        $vc = new Videoclub("Severo 8A");
        $vc->incluirJuego("God of War", 19.99, "PS4", 1, 1); 
        $vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
        $vc->incluirDvd("Torrente", 4.5, "es","16:9"); 
        $vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9"); 
        $vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9");
        $vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107); 
        $vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

    echo("<div class='container'>");
        echo("<div>");
            echo $vc->listarProductos();
        echo("</div>");

    echo("</div>");

    $vc->incluirSocio("Amancio Ortega"); 
    $vc->incluirSocio("Pablo Picasso", 2);
    echo ("<p>Alquilar producto</p>");
    $vc->alquilaSocioProducto(1,2);
    $vc->alquilaSocioProducto(4,3); 
    

?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-image: url("Assets/fondo-halloween.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin: 0;
        padding: 20px;
        position: relative;
        z-index: 1;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: -1;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .container div{
        border-radius: 8px;
        position: relative;
        background-color: rgba(255, 165, 0, 0.3);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        overflow: hidden;
        padding: 10px;
    }

    .container div::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 180, 13, 0.6);
        filter: blur(30px);
        z-index: -1;
    }

    .centrado {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    h2 {
        font-size: 24px;
        color: #d4cfc9;
        margin-bottom: 5px;
        text-align: center;
    }

    p {
        font-size: 20px;
        color: #ae4832;
        margin: 5px 0;
        text-align: center;
    }

    strong {
        font-size: 18px;
        color: #333;
    }

    br {
        margin-bottom: 10px;
    }
    
    .error p{
        padding: 10px; 
        background-color: #f8d7da;
        border: 1px solid #f44336;
        border-radius: 5px;
        margin: 10px 0;
        text-align: center;
        color: #721c24;
    }

    .success p{
        padding: 10px;
        background-color: #d4edda;
        border: 1px solid #28a745;
        border-radius: 5px;
        margin: 10px 0;
        text-align: center;
        color: #155724;
    }
</style>