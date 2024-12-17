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

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['csv']))
        {
            if ($_GET['csv'] == true) {
                $fp = fopen('510campeones.csv', 'w');

                foreach ($campeones as $campeon)
                {
                    fputcsv($fp, $campeon, "|");
                    
                }

                fclose($fp);
            }   
        }
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
 
        .generarCSV {
        padding: 0;
        margin: 0;
        border: none;
        background: none;
        cursor: pointer;
        }

        .generarCSV {
        --primary-color: #111;
        --hovered-color: #c84747;
        position: relative;
        display: flex;
        font-weight: 600;
        font-size: 20px;
        gap: 0.5rem;
        align-items: center;
        }

        .generarCSV p {
        margin: 0;
        position: relative;
        font-size: 20px;
        color: var(--primary-color);
        }

        .generarCSV::after {
        position: absolute;
        content: "";
        width: 0;
        left: 0;
        bottom: -7px;
        background: var(--hovered-color);
        height: 2px;
        transition: 0.3s ease-out;
        }

        .generarCSV p::before {
        position: absolute;
        /*   box-sizing: border-box; */
        content: "Generar_CSV";
        width: 0%;
        inset: 0;
        color: var(--hovered-color);
        overflow: hidden;
        transition: 0.3s ease-out;
        }

        .generarCSV:hover::after {
        width: 100%;
        }

        .generarCSV:hover p::before {
        width: 100%;
        }

        .generarCSV:hover svg {
        transform: translateX(4px);
        color: var(--hovered-color);
        }

        .generarCSV svg {
        color: var(--primary-color);
        transition: 0.2s;
        position: relative;
        width: 15px;
        transition-delay: 0.2s;
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
               <button class="elim-button" onclick="eliminarCampeon('<?= $campeon['nombre'] ?>', <?= $campeon['id'] ?>)">Eliminar</button>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <button class="generarCSV" onclick="generarCSV()">
            <p>Generar_CSV</p>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="4"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M14 5l7 7m0 0l-7 7m7-7H3"
                ></path>
            </svg>
        </button>
    </div>

    <script>
        function eliminarCampeon(campeon, id) 
        {
          if (confirm(`¿Estás seguro de que quieres eliminar ${campeon}?`))
          {
            window.location.href = '505campeones.php?id=' + id;
          }
        }

        function generarCSV() {
            window.location.href = '?csv=true';
        }
    </script>
</body>
</html>