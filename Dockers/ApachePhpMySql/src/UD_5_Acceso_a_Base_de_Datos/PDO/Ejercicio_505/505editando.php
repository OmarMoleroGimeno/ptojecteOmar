<?php
    if ($_SERVER["REQUEST_METHOD"] === "GET") 
    {
        $idGet = $_GET['id'];

        $dsn = 'mysql:dbname=lol; host=127.0.0.1';
        $usuario = 'root';
        $contrasenya = '';

        try {
            $conexion = new PDO($dsn, $usuario, $contrasenya);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Sentencia SQL
            $sql = "SELECT * FROM campeon WHERE id = :id";

            // La preparamos y le decimos que va a ser asociativa
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_ASSOC);

            // Le pasamos el parámetro
            $sentencia->bindParam(':id', $idGet);

            // La ejecutamos
            $isOk = $sentencia -> execute();

            // Guardamos el resultado en una variable
            $campeon = $sentencia->fetch();

        } 
        catch (PDOException $e) 
        {
            echo 'Fallo en la conexión: ' . $e->getMessage();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        $idPost = $_POST['id'];
        $nombre = $_POST['nombre'];
        $rol = $_POST['rol'];
        $dificultad = $_POST['dificultad'];
        $descripcion = $_POST['descripcion'];

        $dsn = 'mysql:dbname=lol; host=127.0.0.1';
        $usuario = 'root';
        $contrasenya = '';

        try {
            $conexion = new PDO($dsn, $usuario, $contrasenya);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Sentencia SQL
            $sql = "UPDATE campeon SET nombre = :nombre, rol = :rol, dificultad = :dificultad, descripcion = :descripcion WHERE id = :id";

            // La preparamos y le decimos que va a ser asociativa
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_ASSOC);

            // Le pasamos el parámetro
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':rol', $rol);
            $sentencia->bindParam(':dificultad', $dificultad);
            $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->bindParam(':id', $idPost, PDO::PARAM_INT);

            // La ejecutamos
            $isOk = $sentencia -> execute();

            // Guardamos el resultado en una variable
            $campeon = $sentencia->fetch();

            if ($isOk)
            {
                header('Location: ./505campeones.php');
                exit;
            }
            else
            {
                echo 'todo ko';
            }

        } 
        catch (PDOException $e) 
        {
            echo 'Fallo en la conexión: ' . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar un personaje</title>
    <style>
        /* Estilo básico para el cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        /* Estilo para el formulario */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para los labels y inputs */
        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        /* Estilo para el botón */
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Espaciado extra entre elementos */
        br {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post">
        <h1>Editar campeon</h1>
        <input type="hidden" name="id" value="<?= htmlspecialchars($campeon['id']) ?>">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($campeon['nombre']) ?>" required>
        <br/><br/>

        <label for="rol">Rol</label>
        <input type="text" id="rol" name="rol" value="<?= htmlspecialchars($campeon['rol']) ?>" required>
        <br/><br/>

        <label for="dificultad">Dificultad</label>
        <input type="text" id="dificultad" name="dificultad" value="<?= htmlspecialchars($campeon['dificultad']) ?>" required>
        <br/><br/>

        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value="<?= htmlspecialchars($campeon['descripcion']) ?>" required>
        <br/><br/>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
