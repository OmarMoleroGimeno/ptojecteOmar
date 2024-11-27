<?php
function validateMenu($menu)
{
    $validOptions = ["arroz", "tallarines", "hamburguesa", "pizza"];
    if (is_array($menu) && !empty($menu)) 
    {
        foreach ($menu as $item) 
        {
            if (!in_array($item, $validOptions)) 
            {
                return false;
            }
        }
        return true;
    }
    return false;
}

function validateAficiones($aficiones)
{
    $validOptions = ["basquet", "futbol", "mma", "bjj"];
    if (is_array($aficiones) && !empty($aficiones)) 
    {
        foreach ($aficiones as $item) 
        {
            if (!in_array($item, $validOptions)) 
            {
                return false;
            }
        }
        return true;
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $nombre = $_POST["nombre"] ?? null;
    $email = $_POST["email"] ?? null;
    $sexo = $_POST["sexo"] ?? null;
    $convivientes = $_POST["convivientes"] ?? null;
    $menu = $_POST["menu"] ?? [];
    $aficiones = $_POST["aficiones"] ?? [];


    if ($nombre && filter_var($email, FILTER_VALIDATE_EMAIL) 
        && $sexo && $convivientes !== null 
        && validateMenu($menu) 
        && validateAficiones($aficiones)) 
    {
        foreach ($_POST as $key => $value) 
        {
            if (is_array($value)) 
            {
                echo $key . " -> " . implode(", ", $value) . "<br/>";
            } 
            else 
            {
                echo $key . " -> " . $value . "<br/>";
            }
        }
    } 
    else 
    {
        echo "Campos no válidos";
    }
}
?>
