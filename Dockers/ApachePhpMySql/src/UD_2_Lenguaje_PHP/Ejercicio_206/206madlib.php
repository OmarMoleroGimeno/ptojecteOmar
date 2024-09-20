<?php
    if (!empty($_POST))
    {
        $nombre = $_POST["nombre"];
        $verbo = $_POST["verbo"];
        $adjetivo = $_POST["adjetivo"];
        $adverbio = $_POST["adverbio"];

        echo("Te gusta $verbo con tu $nombre $adjetivo $adverbio.");
    }
?>