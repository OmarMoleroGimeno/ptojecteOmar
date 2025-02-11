<?php

    include '../config/conexion.php'; // Para poder usar las constantes

    // Verificamos si el método de envio es post y si esta el nombre del usuario y la contraseña
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) 
        && isset($_POST['contrasenya']))
    {
        $username = $_POST['username'];
        $contrasenya = $_POST['contrasenya'];

        $conexion = null;
        try {
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD); // Creamós la conexión con la DB
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'SELECT password FROM users WHERE username = :username'; // Sentencia sql para hacer una consulta a la DB
        
            $sentencia = $conexion->prepare($sql); // Preparamos la sentencia
            $sentencia->bindParam(':username', $username); // Anyadimos los parámetros
        
            $isOk = $sentencia->execute(); // Ejecutamos
            $result = $sentencia->fetch(PDO::FETCH_DEFAULT); // Guardamos el resultado

            $passwordHashed = $result['password']; // Guardamos la contrasenya encriptada de la DB
            
            if ($isOk) // Si la ejecución ha sido exitosa entramos
            {
                // Comprobamos que la contrasenya sea correcta
                if(password_verify($contrasenya, $passwordHashed))
                {
                    session_start(); // Iniciamos sesión
                    $_SESSION['examen45'] = $username; // Guardamos el nombre en la sessión
                    header('Location: ../views/products.php'); // Redirijimos a la vista productos
                }
                else
                {
                    header('Location: ../index.php' );
                }
            }
            else
            {
                echo 'Error en la senténcia';
            }
        
        } catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
        
        $conexion = null;
    }
    else
    {
        header('Location: ../index.php' );
    }
?>