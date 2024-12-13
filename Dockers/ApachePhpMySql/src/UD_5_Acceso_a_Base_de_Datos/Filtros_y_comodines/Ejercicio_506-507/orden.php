<?php
    include '../config/conexion.php';
    $conexion = null;
    try {
        $orden = $_GET['orden'] ?? 0;
    
        $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT * FROM campeon ORDER BY nombre ' . $orden;
    
        $sentencia = $conexion->prepare($sql);
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $isOk = $sentencia -> execute();
        $campeones = $sentencia -> fetchAll();
    
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Campeones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        th, td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #007BFF;
            color: white;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        th {
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre 
                    <svg onclick="window.location.href='orden.php?orden=ASC'" width="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#0F0F0F"></path> </g></svg>
                    <svg onclick="window.location.href='orden.php?orden=DESC'" width="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.2929 15.2893C18.6834 14.8988 18.6834 14.2656 18.2929 13.8751L13.4007 8.98766C12.6195 8.20726 11.3537 8.20757 10.5729 8.98835L5.68257 13.8787C5.29205 14.2692 5.29205 14.9024 5.68257 15.2929C6.0731 15.6835 6.70626 15.6835 7.09679 15.2929L11.2824 11.1073C11.673 10.7168 12.3061 10.7168 12.6966 11.1073L16.8787 15.2893C17.2692 15.6798 17.9024 15.6798 18.2929 15.2893Z" fill="#0F0F0F"></path> </g></svg>
                </th>
                <th>Rol</th>
                <th>Dificultad</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campeones as $campeon): ?>
                <tr>
                    <td><?= htmlspecialchars($campeon["id"]) ?></td>
                    <td><?= htmlspecialchars($campeon["nombre"]) ?></td>
                    <td><?= htmlspecialchars($campeon["rol"]) ?></td>
                    <td><?= htmlspecialchars($campeon["dificultad"]) ?></td>
                    <td><?= htmlspecialchars($campeon["descripcion"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>