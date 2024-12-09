<?php
   // dsn (Nombre del Origen de Datos, DSN)
   $dsn = 'mysql:dbname=lol; host=127.0.0.1';
   $usuario = 'root';
   $contrasenya = '';

   try 
   {
     $conexion = new PDO($dsn, $usuario, $contrasenya);
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "SELECT * FROM campeon";
     $sentencia = $conexion->prepare($sql);
     $sentencia->setFetchMode(PDO::FETCH_ASSOC);
     $isOk = $sentencia->execute();
     $campeones = $sentencia->fetchAll();
   } 
   catch (PDOException $e) 
   {
     echo 'Fallo en la conexión: ' . $e->getMessage();
   }

   if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) 
   {
     $idGet = $_GET['id'];
     try 
     {
         $conexion = new PDO($dsn, $usuario, $contrasenya);
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $sql = "DELETE FROM campeon WHERE id = :id";
         $sentencia = $conexion->prepare($sql);
         $sentencia->bindParam(':id', $idGet);
         $isOk = $sentencia->execute();

         if ($isOk) 
         {
             header('Location: 505campeones.php');
             exit;
         } 
         else 
         {
             echo 'Error al eliminar el campeón.';
         }
     }
      catch (PDOException $e) 
     {
         echo 'Error al conectar con la base de datos: ' . $e->getMessage();
     }
   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Campeones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .campeones-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 10px;
        }

        .campeon-card {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .campeon-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .campeon-card p {
            margin: 10px 0;
            font-size: 16px;
        }

        .campeon-card strong {
            color: #333;
        }

        .edit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #45a049;
        }

        .elim-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .elim-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="campeones-container">
        <?php foreach ($campeones as $campeon): ?>
            <div class="campeon-card">
               <p><strong>Id:</strong> <?= htmlspecialchars($campeon["id"]) ?></p>
               <p><strong>Nombre:</strong> <?= htmlspecialchars($campeon["nombre"]) ?></p>
               <p><strong>Rol:</strong> <?= htmlspecialchars($campeon["rol"]) ?></p>
               <p><strong>Dificultad:</strong> <?= htmlspecialchars($campeon["dificultad"]) ?></p>
               <p><strong>Descripción:</strong> <?= htmlspecialchars($campeon["descripcion"]) ?></p>
               <button class="edit-button" onclick="window.location.href='505editando.php?id=<?= $campeon['id'] ?>'">Editar</button>
               <button class="elim-button" onclick="eliminarCampeon(<?= $campeon['id'] ?>)">Eliminar</button>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function eliminarCampeon(id) 
        {
          if (confirm('¿Estás seguro de que quieres eliminar este campeón?')) 
          {
          window.location.href = '505campeones.php?id=' + id;// Get del ID 
          }
        }
    </script>
</body>
</html>
