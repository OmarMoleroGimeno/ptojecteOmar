<?php 
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];

    if ($a > $b) {
        if ($a > $c) {
            echo("El valor mas alto es $a");
        } else {
            echo("El valor mas alto es $c");
        }
    } elseif ($b > $c) {
        echo("El valor mas alto es $b");
    } else {
        echo("El valor mas alto es $c");
    }
?>