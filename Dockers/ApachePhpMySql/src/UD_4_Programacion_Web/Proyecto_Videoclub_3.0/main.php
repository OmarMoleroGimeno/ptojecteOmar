<?php 
    session_start();

    if (!isset($_SESSION['usuario']) || !isset($_SESSION['contrasenha'])) 
    {
        header('Location: index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <form method="post">
        <button type="submit">Log out</button>
    </form>
</body>
</html>