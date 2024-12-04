<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $_SESSION["nombre"] = $_POST['nombre'];
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["sexo"] = $_POST['sexo'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./409formulario3.php" method="post">
        <label for="convivientes">Número de convivientes en el domicilio</label>
        <input type="number" name="convivientes" id="convivientes" required>
        <br/><br/>

        <label for="menu">Menú favorito</label>
        <br/>
        <input type="checkbox" name="menu[]" id="arroz" value="arroz"> Arroz
        <br/>
        <input type="checkbox" name="menu[]" id="tallarines" value="tallarines"> Tallarines
        <br/>
        <input type="checkbox" name="menu[]" id="hamburguesa" value="hamburguesa"> Hamburguesa
        <br/>
        <input type="checkbox" name="menu[]" id="pizza" value="pizza"> Pizza
        <br/><br/>

        <label for="aficiones">Aficiones</label>
        </br>
        <select name="aficiones[]" id="aficiones" multiple required>
            <option value="basquet">Basquet</option>
            <option value="futbol">Fútbol</option>
            <option value="mma">MMA</option>
            <option value="bjj">BJJ</option>
        </select>
        <br>
        <button type="submit">Enviar</button>
    </form>
</select>
</body>
</html>