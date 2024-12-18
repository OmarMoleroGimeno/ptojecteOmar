<?php
    ob_start();
    include '../../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['username'])
    {
        $username = trim($_COOKIE['username']);

        $id_chollo = $_POST['id'];

        $conexion = null;
        try 
        {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'DELETE FROM chollos WHERE id = :id_chollo';
        
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id_chollo', $id_chollo);

            $isOk = $sentencia->execute();
            
            if ($isOk) {
                header("Location: ../../views/usuario/usuario.php");
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
        header('Location: ../../views/login.php');
    }
    ob_end_flush();
?>