<?php
    ob_start();
    include '../../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_COOKIE['username']))
    {
        $username = trim($_COOKIE['username']);
        $id_chollo = $_POST['id'];

        $conexion = null;
        try 
        {
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Primero, recuperamos la información de la imagen
            $sql = 'SELECT image FROM chollos WHERE id = :id_chollo';
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id_chollo', $id_chollo);
            $sentencia->execute();

            $result = $sentencia->fetch(PDO::FETCH_ASSOC);
            
            if ($result && isset($result['image'])) 
            {
                $fileName = $result['image'];
                $filePath = "../../assets/$fileName";

                // Eliminamos primero el archivo físico
                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        echo "Archivo eliminado correctamente.<br>";
                    } else {
                        echo "No se pudo eliminar el archivo.<br>";
                    }
                } else {
                    echo "El archivo no existe en la ubicación especificada.<br>";
                }

                // Ahora eliminamos el registro de la base de datos
                $sql = 'DELETE FROM chollos WHERE id = :id_chollo';
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_chollo', $id_chollo);

                if ($sentencia->execute()) {
                    echo "Registro eliminado correctamente.<br>";
                    header("Location: ../../views/usuario/usuario.php");
                } else {
                    echo "No se pudo eliminar el registro de la base de datos.<br>";
                }
            } 
            else 
            {
                echo "No se encontró la imagen asociada al registro.<br>";
            }
        
        } 
        catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        
        $conexion = null;

    }
    else
    {
        header('Location: ../../views/login.php');
    }
    ob_end_flush();
?>