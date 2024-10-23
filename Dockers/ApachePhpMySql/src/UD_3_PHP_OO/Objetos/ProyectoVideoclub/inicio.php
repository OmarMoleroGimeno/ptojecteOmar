<?php
namespace UD_3_PHP_OO\Objetos\ProyectoVideoclub;
use Src\UD_3_PHP_OO\Objetos\ProyectoVideoclub\Soporte;
    include "./EJERCICIO_321/Soporte.php";

    echo('<div class="centrado">
            <img height="300em"  src="./Assets/JPnAV2HBlz6VHh92gjcviUq39JrPvnJNbtti56xDgS9Aza6E-removebg-preview.png" alt="Feo">
        </div>');

    $soporte1 = new Soporte("Tenet", 22); 
    // echo "<strong>" . $soporte1->titulo . "</strong>"; 
    // echo "<br>Precio: " . $soporte1->getPrecio() . " €"; 
    // echo "<br>Precio con IVA: " . $soporte1->getPrecioConIVA() . " €";
    echo("<div class='container'>");
    echo("<div>");
    echo $soporte1->muestraResumen();
    echo("</div>");

    use UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_322\CintaVideo;
    include "./EJERCICIO_322/cintaVideo.php";

    $miCinta = new CintaVideo("Los cazafantasmas", 3.5, 107); 
    // echo "</br></br><strong>" . $miCinta->titulo . "</strong>"; 
    // echo "<br>Precio: " . $miCinta->getPrecio() . " €"; 
    // echo "<br>Precio con IVA: " . $miCinta->getPrecioConIva() . " €";
    echo("<div>");
    echo $miCinta->muestraResumen();
    echo("</div>");

    use UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_323\Dvd;
    include "./EJERCICIO_323/dvd.php";

    $miDvd = new Dvd("Origen", 15, "es,en,fr", "16:9");
    // echo "<strong>" . $miDvd->titulo . "</strong>"; 
    // echo "<br>Precio: " . $miDvd->getPrecio() . " €"; 
    // echo "<br>Precio con IVA: " . $miDvd->getPrecioConIva() . " €";
    echo("<div>");
    echo $miDvd->muestraResumen();
    echo("</div>");

    use UD_3_PHP_OO\Objetos\ProyectoVideoclub\EJERCICIO_324\Juego;
    include "./EJERCICIO_324/juego.php";
    echo("<div>");
    $miJuego = new Juego("The Last of Us Part II", 49.99, "PS4", 1, 1);
    echo $miJuego->muestraResumen();
    echo("</div>");

    echo("</div>");

?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-image: url("Assets/fondo-halloween.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
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
        background-color: rgba(0, 0, 0, 0.3); /* Ajusta la opacidad del overlay */
        z-index: -1;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }

    div>div {
        border-radius: 8px;
        position: relative;   /* Para que el pseudo-elemento ::before esté en el mismo contexto */
        width: 300px;
        height: 200px;
        background-color: rgba(255, 165, 0, 0.3);  /* Color naranja semitransparente */
        backdrop-filter: blur(10px);  /* Aplica el desenfoque al fondo del div */
        border-radius: 10px;  /* Opcional: bordes redondeados */
        overflow: hidden;
        padding: 10px;
    }

    .div>div::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(#ffb40d, 0.6);
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
        font-size: 16px;
        color: #b9a2da;
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
</style>