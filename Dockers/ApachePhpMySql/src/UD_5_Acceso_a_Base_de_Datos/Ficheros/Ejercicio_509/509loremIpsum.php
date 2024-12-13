<?php
    $file_path = "./509loremIpsum.txt";

    $file_size = filesize($file_path) / 1024; // Tamaño en KB
    $file_modified = date("F d Y H:i:s.", filemtime($file_path)); // Fecha de última modificación
    $file_owner = fileowner($file_path); // ID de usuario

    echo "Tamaño del archivo: " . round($file_size, 2) . " KB<br/>";
    echo "Última modificación: $file_modified<br/>";
    echo "ID de usuario que creó el archivo: $file_owner<br/>";
?>