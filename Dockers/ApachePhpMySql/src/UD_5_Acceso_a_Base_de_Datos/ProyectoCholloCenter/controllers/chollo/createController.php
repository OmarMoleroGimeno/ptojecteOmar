<?php
    ob_start();
    include '../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['username'])
    {
        $username = trim($_COOKIE['username']);

        $conexion = null;
        try 
        {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'SELECT id FROM users WHERE username = :username';
        
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':username', $username);

            $isOk = $sentencia->execute();
            
            if ($isOk) {
                $result = $sentencia->fetch(PDO::FETCH_ASSOC);
                $created_by = $result['id'];

                try
                {
                    $sql = 'INSERT INTO chollos (title, description, image, price, created_by) VALUES (:title, :description, :image, :price, :created_by)';

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':title', $title);
                    $sentencia->bindParam(':description', $description);
                    $sentencia->bindParam(':image', $image);
                    $sentencia->bindParam(':price', $price);
                    $sentencia->bindParam(':created_by', $created_by);
                }
                catch (PDOException $e) 
                {
                    echo $e->getMessage();
                }
            }
            
        
        } 
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
        
        $conexion = null;

    }
    else
    {
        header('Location: ../views/login.php');
    }
    ob_end_flush();
?>