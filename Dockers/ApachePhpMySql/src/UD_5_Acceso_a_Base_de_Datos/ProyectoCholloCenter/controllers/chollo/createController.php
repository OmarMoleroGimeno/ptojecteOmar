<?php
    ob_start();
    include '../../config/conexion.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_COOKIE['username'])
    {
        $username = trim($_COOKIE['username']);

        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Imagen
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Ubicación de la carpeta donde guardaremos las imágenes + nombre de la imagen
        $uploadFileDir = '../../assets/';
        $fileName = (uniqid() . '.' . $fileExtension);
        $dest_path = $uploadFileDir . $fileName;

        

        move_uploaded_file($fileTmpPath, $dest_path);

        $conexion = null;
        try 
        {
        
            $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $sql = 'SELECT id FROM users WHERE username = :username';
        
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':username', $username);

            $isOk = $sentencia->execute();
            
            if ($isOk) {
                $result = $sentencia->fetch(PDO::FETCH_ASSOC);
                $created_by = $result['id'];

                try
                {
                    $sql = 'INSERT INTO chollos (title, description, image, price, created_by) VALUES (:title, :description, :image, :price, :created_by)';

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':title', $title);
                    $sentencia->bindParam(':description', $description);
                    $sentencia->bindParam(':image', $fileName);
                    $sentencia->bindParam(':price', $price);
                    $sentencia->bindParam(':created_by', $created_by);

                    $isOk = $sentencia->execute();
                    if ($isOk) 
                    {
                        if ($_COOKIE['role'] === 'admin') 
                        {
                            header("Location: ../../views/admin/admin.php");
                        }
                        else
                        {
                            header("Location: ../../views/usuario/usuario.php");
                        }
                    }
                    else 
                    {

                    }
                }
                catch (PDOException $e) 
                {
                    echo $e->getMessage();
                }
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
        header('Location: ../views/login.php');
    }
    ob_end_flush();
?>