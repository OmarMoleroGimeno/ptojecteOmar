<?php
    ob_start();
    include '../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['username'] && $_POST['password'])
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $conexion = null;
        try {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'SELECT password, role FROM users WHERE username = :username';
        
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':username', $username);

            $isOk = $sentencia->execute();

            $result = $sentencia->fetch(PDO::FETCH_ASSOC);
            $passwordHashed = $result['password'];
            $role = $result['role'];
            
            if (password_verify($password, $passwordHashed))
            {
                setcookie('username', $username, time() + 3600, '/', '', false, true);
                setcookie('role', $role, time() + 3600, '/', '', false, true);
                header('Location: ../views/index.php');
                exit;
            }
            else
            {
                header('Location: ../views/login.php');
            }
            
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        $conexion = null;

    }
    ob_end_flush();
?>