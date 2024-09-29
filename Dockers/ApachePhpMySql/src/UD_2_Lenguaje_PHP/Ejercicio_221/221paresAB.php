<?php
if (!empty($_POST))
{
    $inicio = $_POST["inicio"];
    $fin = $_POST["fin"];

    $listaDePares = "<ul>";
    for ($i = $inicio; $i <= $fin; $i++)
    {   
        if ( $i%2 == 0 )
        {
            $listaDePares .= "<li>" . $i . "</li>";
        }
    }
    $listaDePares .= "</ul>";

    echo($listaDePares);
}
?>