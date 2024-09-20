<?php
if (!empty($_POST))
{
    $inicio = 1; //$_POST["inicio"]
    $fin = 20;//$_POST["fin"]

    $listaDePares = "<ul>";
    for ($inicio < $fin; $inicio++;)
    {   
        if ( $inicio%2 == 0 )
        {
            $listaDePares .= "<li>" . $inicio . "</li>";
        }
    }
    $listaDePares .= "</ul>";

    echo($listaDePares);
}
?>