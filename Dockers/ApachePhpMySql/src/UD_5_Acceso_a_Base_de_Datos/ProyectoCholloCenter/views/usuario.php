<?php
    include '../config/conexion.php';

    if ($_COOKIE['username'] && $_COOKIE['role'])
    {
        if ($_COOKIE['role'] === 'user')
        {
            $conexion = null;
            try {
            
                $conexion = new PDO($DSN, $USUARIO, $PASSWORD);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = 'SELECT * FROM chollos';
            
                $sentencia = $conexion->prepare($sql);

                $isOk = $sentencia->execute();
                
                if ($isOk) 
                {
                    $success = true;
                    $chollos = $sentencia->fetchAll();
                }
                else
                {
                    $success = false;
                }
                
            
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            $conexion = null;
        }
        else
        {
            header('Location: ./login.php');
            exit;
        }
    }
    else
    {
        header('Location: ./login.php');
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
    <div class="container">
        <h1>Bienvenido <?= htmlspecialchars($_COOKIE['username']) ?>  a chollocenter</h1>
    </div>
    <div class="container">
        <form action="../controllers/chollo/createController.php" method="post">
            <button class="btnCreate noselect" type="submit">
                <span class="text">Add</span>
                <span class="icon"><svg viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"></svg>
                <span class="buttonSpan">+</span>
            </button>
        </form>
        <form action="">
            <button class="btnDelete noselect"><span class="text" type="submit">Delete</span>
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                    </svg>
                </span>
            </button>
        </form>
    </div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body{
        font-family: "Poppins", serif;
    }
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
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