<?php
    include '../../config/conexion.php';

    if ($_COOKIE['username'] && $_COOKIE['role']) // Vemos que contenga el username y el role
    {
        if ($_COOKIE['role'] === 'user') // Comprovamos que sea un usuario
        {
            $conexion = null;
            $username = $_COOKIE['username'];
            try {
            
                $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'SELECT id FROM users WHERE username = :username'; // Sentencia para obtener el id del usuario
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':username', $username);

                $isOk = $sentencia->execute();

                if ($isOk) // Si se completa la sentencia entra
                {
                    $result = $sentencia->fetch(PDO::FETCH_ASSOC);
                    $created_by = $result['id']; // Guardamos el id en una variable

                    $sql = 'SELECT * FROM chollos WHERE created_by = :created_by'; // Obtenemos todos los chollos de un usuario a través del id
            
                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':created_by', $created_by);

                    $isOk = $sentencia->execute();
                    
                    if ($isOk) 
                    {
                        $chollos = $sentencia->fetchAll(); // Guardamos los chollos
                    }
                    else
                    {
                        $success = false;
                    }
                }
                else
                {
                    echo 'Error en la sentencia';
                }
            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            $conexion = null;
        }
        else
        {
            header('Location: ../login.php');
            exit;
        }
    }
    else
    {
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="right">
        <p><a href="../../views/login.php">Logout</a></p>
    </div>
    <div class="container">
        <h1>Bienvenido <?= htmlspecialchars($_COOKIE['username']) ?>  a chollocenter</h1>
    </div>
    <div class="container">
        <form action="../formCreateChollo.php" method="post">
            <button class="btnCreate noselect" type="submit">
                <span class="text">Add</span>
                <span class="icon"><svg viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"></svg>
                <span class="buttonSpan">+</span>
            </button>
        </form>
    </div>
    <div class="container">
        <div class="chollos-container">
            <?php foreach ($chollos as $chollo): ?>
                <div class="chollo-card">
                    <img class="chollo-image" src="../../assets/<?= htmlspecialchars($chollo['image']) ?>" alt="<?= htmlspecialchars($chollo['title']) ?>">
                    <div class="chollo-content">
                        <h2 class="chollo-title"><?= htmlspecialchars($chollo['title']) ?></h2>
                        <p class="chollo-description"><?= htmlspecialchars($chollo['description']) ?></p>
                        <p class="chollo-price">Price: <?= htmlspecialchars($chollo['price']) ?>€</p>
                        <p class="chollo-author">Author: <?= htmlspecialchars($username) ?></p>
                    </div>
                    <form action="../../controllers/chollo/deleteController.php" method="post">
                        <input type="text" name="id" hidden value="<?= htmlspecialchars($chollo['id']) ?>">
                        <button class="btnDelete noselect"><span class="text" type="submit">Delete</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body{
        font-family: "Poppins", serif;
        background: #1f4037;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #99f2c8, #1f4037);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #99f2c8, #1f4037); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
    }

    .container{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .right {
        display: flex;
        justify-content: right;
        align-items: right;
        padding-right: 80px;
    }

    .right p a {
        color: white;
        text-decoration: none;
    }

    /* Contenedor principal */
    .chollos-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    /* Card principal */
    .chollo-card {
        display: flex;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .chollo-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* Imagen */
    .chollo-image {
        width: 40%;
        object-fit: cover;
    }

    /* Contenido */
    .chollo-content {
        width: 60%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        margin: 0;
    }

    .chollo-title {
        font-size: 1.8rem;
        color: #333;
        margin-bottom: 10px;
    }

    .chollo-description {
        font-size: 1rem;
        color: #666;
        margin-bottom: 15px;
    }

    .chollo-price {
        font-size: 1.2rem;
        color: #e74c3c;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .chollo-author {
        font-size: 0.9rem;
        color: #777;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .chollo-card {
            flex-direction: column;
        }

        .chollo-image {
            width: 100%;
            max-height: 200px;
        }

        .chollo-content {
            width: 100%;
        }
    }

    /* From Uiverse.io by andrew-demchenk0 */ 
    /* From Uiverse.io by UtariD86 */ 
    .btnCreate {
        width: 150px;
        height: 50px;
        cursor: pointer;
        display: flex;
        align-items: center;
        background: #00a600;
        border: none;
        border-radius: 5px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
        background: #00a600;
        margin: 10px;
    }

    .btnCreate,
    .btnCreate span {
        transition: 200ms;
    }

    .btnCreate .text {
        transform: translateX(35px);
        color: white;
        font-weight: bold;
    }

    .btnCreate .icon {
        position: absolute;
        border-left: 1px solid #007300;
        transform: translateX(110px);
        height: 40px;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btnCreate svg {
        width: 15px;
        fill: #eee;
    }

    .btnCreate:hover {
        background: #00a600;
    }

    .btnCreate:active {
        background: #00cc00;
    }

    .btnCreate:hover .text {
        color: transparent;
    }

    .btnCreate:hover .icon {
        width: 150px;
        border-left: none;
        transform: translateX(0);
    }

    .btnCreate:focus {
        outline: none;
    }

    .btnCreate:active .icon svg {
        transform: scale(0.8);
    }

    .buttonSpan {
        color: white;
        margin: 150px;
        font-size: 30px;
    }
    /* From Uiverse.io by cssbuttons-io */ 
    .btnDelete {
        width: 150px;
        height: 50px;
        cursor: pointer;
        display: flex;
        align-items: center;
        background: red;
        border: none;
        border-radius: 5px;
        box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
        background: #e62222;
        margin: 10px;
    }

    .btnDelete, button span {
        transition: 200ms;
    }

    .btnDelete .text {
        transform: translateX(35px);
        color: white;
        font-weight: bold;
    }

    .btnDelete .icon {
        position: absolute;
        border-left: 1px solid #c41b1b;
        transform: translateX(110px);
        height: 40px;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btnDelete svg {
        width: 15px;
        fill: #eee;
    }

    .btnDelete:hover {
        background: #ff3636;
    }

    .btnDelete:hover .text {
        color: transparent;
    }

    .btnDelete:hover .icon {
        width: 150px;
        border-left: none;
        transform: translateX(0);
    }

    .btnDelete:focus {
        outline: none;
    }

    .btnDelete:active .icon svg {
        transform: scale(0.8);
    }

</style>
</html>