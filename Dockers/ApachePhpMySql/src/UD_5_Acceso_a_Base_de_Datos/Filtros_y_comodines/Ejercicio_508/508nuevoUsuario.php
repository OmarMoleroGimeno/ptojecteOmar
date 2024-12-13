<?php
    include '../../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['nombre'] && $_POST['usuario'] &&
        $_POST['contrasenha'] && $_POST['email'])
    {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contrasenha = password_hash($_POST['contrasenha'],PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $conexion = null;
        try {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'INSERT INTO usuario (nombre, usuario, contrasenha, email) VALUES (:nombre, :usuario, :contrasenha, :email)';
        
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':usuario', $usuario);
            $sentencia->bindParam(':contrasenha', $contrasenha);
            $sentencia->bindParam(':email', $email);

            $isOk = $sentencia->execute();
            $cantidadAfectada = $sentencia->rowCount();
            
            if ($isOk) 
            {
                $success = true; 
            }
            else
            {
                $success = false; 
            }
        
            // $isOk = $sentencia->execute([
            //     'nombre' => $nombre,
            //     'usuario' => $usuario,
            //     'contrasenha' => $contrasenha,
            //     'email' => $email
            // ]);
            
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        $conexion = null;

    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Modal */
        .modal {
            display: none; 
            position: fixed;
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #90EE90;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            text-align: center;
            border-radius: 10px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalMessage"></p>
            <p id="modalMessage2"></p>
        </div>
    </div>

    <script>
        // Mostrar el modal si la inserción fue exitosa
        <?php if ($success): ?>
            // Mostrar el mensaje en el modal
            document.getElementById("modalMessage").innerText = "¡Registro exitoso!";
            document.getElementById("modalMessage2").innerText = "El usuario <?= htmlspecialchars($nombre) ?> ha sido introducido en el sistema con la contrasenya <?= htmlspecialchars($contrasenha) ?>";
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            
            // Mostrar el modal
            modal.style.display = "block";

            // Redirigir automáticamente después de 4 segundos
            setTimeout(function() {
                modal.style.display = "none";
                window.location.href = "./508registro.php"; // Redirigir al registro
            }, 4000);
        <?php elseif (!$success): ?>
            alert("No se pudo insertar los datos. Inténtalo nuevamente.");
        <?php endif; ?>
    </script>
</body>
</html>