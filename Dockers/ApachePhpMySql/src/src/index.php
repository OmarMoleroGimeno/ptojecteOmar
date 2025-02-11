<?php
    include 'config/conexion.php';
    $conexion = null;
    try {
        $cantidad = $_GET['cantidad'] ?? 0;
    
        $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT * FROM products';
    
        $sentencia = $conexion->prepare($sql);
    
        $isOk = $sentencia->execute();
    
        $cantidadAfectada = $sentencia->rowCount();
    
        echo $cantidadAfectada . ' fila(s) afectada(s).';
    
    } catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
    
    $conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1 class="container">Login</h1>
    <div class="container">
        <form action="./controllers/verificar.php" method="post">
            <label for="username">Usuaio</label><br/>
            <input type="text" name="username" id="username" required>
            <br/><br/>
            <label for="contrasenya">Contraseña</label><br/>
            <input type="text" name="contrasenya" id="contrasenya" required>
            <br/><br/>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</html>