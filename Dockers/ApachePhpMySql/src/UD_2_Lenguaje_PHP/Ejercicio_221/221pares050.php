<?php
    $numPares = [];
    for ($i = 1; $i <= 50; $i++)
    {
        if ( $i%2 == 0 )
        {
           $numPares [] = $i;
        }
    }

    $listaDePares = "<ul>";
    for ($i = 0; $i < count($numPares); $i++)
    {
        $listaDePares .= "<li>" . $numPares[$i] . "</li>";
    }
    $listaDePares .= "</ul>";

    echo($listaDePares);
?>