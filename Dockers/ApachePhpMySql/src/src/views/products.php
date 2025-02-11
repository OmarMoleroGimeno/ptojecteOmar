<?php
    session_start(); // Iniciamos sessión

    if (isset($_SESSION['examen45'])) // Comprobamos que el usuario sea legítimo
    {
        include '../config/conexion.php';
        $conexion = null;
        try {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD); // Creamós la conexión con la DB
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'SELECT * FROM products';  // Sentencia sql para hacer una consulta a la DB
        
            $sentencia = $conexion->prepare($sql); // Preparamos la sentencia
        
            $isOk = $sentencia->execute(); // Ejecutamos
            
            if ($isOk) // Si la ejecución ha sido exitosa entramos
            {
                $products = $sentencia->fetchAll(); // Guardamos el resultado

                // echo('<table>
                //         <thead>
                //             <tr>
                //                 <th>ID</th>
                //                 <th>Descripción</th>
                //                 <th>Precio</th>
                //                 <th>Stock</th>
                //                 <th>Acción</th>
                //             </tr>
                //         </thead>
                //         <tbody>');
                //                 foreach ($products as $product) {
                //                     echo '<tr>';
                //                     echo('<td>' . $product['id'] . '</td>');
                //                     echo('<td>' . $product['description'] . '</td>');
                //                     echo('<td>' . $product['prize'] . '</td>');
                //                     echo('<td>' . $product['stock'] . '</td>');
                //                     echo(
                //                         '<td>
                //                             <form action="./products.php" method="post">
                //                                 <input type="text" name="idProduct" id="idProduct" hidden value="' . $product['id'] . '">
                //                                 <button type="submit">Eliminar</button>
                //                             </form>
                //                         </td>'
                //                     );
                //                     echo('</tr>');
                //                 }
                //         echo('</tbody>
                //     </table>');
            }
        
        } catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
        
        $conexion = null;
    }
    else
    {
        header('Location: ../index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProduct']))
    {
        if (isset($_SESSION['examen45'])) // Comprobamos que el usuario sea legítimo
        {
            $idProduct = $_POST['idProduct'];
            include '../config/conexion.php';
            $conexion = null;
            try {
            
                $conexion = new PDO($DSN, $USUARIO, $PASSWORD); // Creamós la conexión con la DB
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = 'DELETE FROM products WHERE id=:idProduct';  // Sentencia sql para hacer una consulta a la DB
                
                $sentencia = $conexion->prepare($sql); // Preparamos la sentencia
                $sentencia->bindParam(':idProduct', $idProduct);
            
                $isOk = $sentencia->execute(); // Ejecutamos
            
            } catch (PDOException $e) 
            {
                echo $e->getMessage();
            }
            
            $conexion = null;
        }
        else
        {
            header('Location: ../index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['id']) ?></td>
                        <td><?= htmlspecialchars($product['description']) ?></td>
                        <td><?= htmlspecialchars($product['prize']) ?>$</td>
                        <td><?= htmlspecialchars($product['stock']) ?></td>
                        <td>
                        <form action="./products.php" method="post">
                            <input type="text" name="idProduct" id="idProduct" hidden value="<?= htmlspecialchars($product['id'])?>">
                            <button type="submit">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</html>