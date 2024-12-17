<?php
    include '../config/conexion.php';

    if ($_COOKIE['username'] && $_COOKIE['role'])
    {
        if ($_COOKIE['role'] === 'admin') 
        {
            $conexion = null;
            try {
            
                $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = 'SELECT * FROM chollos';
            
                $sentencia = $conexion->prepare($sql);

                $isOk = $sentencia->execute();
                
                if ($isOk) 
                {
                    $success = true;
                    $chollos = $sentencia->fetchAll();
                }
                else
                {
                    $success = false;
                }
                
            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            $conexion = null;
        }
    }
    else
    {
        header('Location: ./login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Bienvenido a chollocenter</h1>
</body>
</html>