<?php
    $pregunta = $_POST['pregunta'];
    $respuestas = ['Si','no','quizás','claro que sí','por supuesto que no','no lo tengo claro','seguro','yo diría que sí','ni de coña'];
    $posi = rand(0, 7);
    echo("<p>$pregunta</p>");
    echo("<p>" . $respuestas[$posi] . "</p>");
?>