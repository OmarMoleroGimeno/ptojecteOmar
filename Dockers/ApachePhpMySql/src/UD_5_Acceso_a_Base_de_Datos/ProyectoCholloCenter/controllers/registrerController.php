<?php
    ob_start();
    include '../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['username'] && $_POST['password'] && $_POST['email'])
    {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];
        $role = 'user';

        $conexion = null;
        try {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)';
        
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':username', $username);
            $sentencia->bindParam(':password', $password);
            $sentencia->bindParam(':email', $email);
            $sentencia->bindParam(':role', $role);

            $isOk = $sentencia->execute();
            $cantidadAfectada = $sentencia->rowCount();
            
            if ($isOk)
            {
                $success = true;
                setcookie('username', $username);
                setcookie('role', $role);
                header('Location: ../views/login.php');
                exit;
            }
            else
            {
                $success = false;
                header('Location: ../views/registrar.php');
            }
            
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        $conexion = null;

    }
    ob_end_flush();
?>