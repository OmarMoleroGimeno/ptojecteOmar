<?php
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            echo($key . " -> " . $value . "<br/>");
        }
    }
?>