<?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if (isset($_FILES['file'])) 
        {
            $altura = $_POST['anchura'];
            $anchura = $_POST['altura'];

            $file = $_FILES['file']; // Fichero subido
            $fileType = $file['type']; // Tipo del fichero subido

            if (strpos($fileType, 'image/') === 0)
            {
                $fileName = $file['name']; // Nombre del fichero
                $fileTmpName = $file['tmp_name']; // Ruta temporal

                $uploads = './uploads/'; // Carpeta donde se guardaran las fotos
                $uploadPath = $uploads . basename($fileName); // Anyadimos la ruta a la que ira el fichero

                if (move_uploaded_file($fileTmpName, $uploadPath)) // Cambiamos de ruta el fichero
                {
                    echo "<p>El archivo se ha guardado en: $uploadPath</p>";
                    echo "<img src='$uploadPath' alt='ERROR' height='$altura px' width='$anchura px'>";
                } 
                else 
                {
                    echo "<p>Error al guardar el archivo.</p>";
                }
            }
            else
            {
                echo "<p>El archido subido no es una imagen</p>";
            }

            
        }
        else
        {
            echo "<p>error2</p>";
        }   
    }
    else
    {
        echo "<p>error</p>";
    }
?>