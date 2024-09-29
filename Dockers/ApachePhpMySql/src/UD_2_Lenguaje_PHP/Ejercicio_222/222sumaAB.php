<?php
$inicio = $_POST["inicio"];
$fin = $_POST["fin"];

for ($i=$inicio; $i <= $fin ; $i++) { 
    echo($i . "</br>");
}
?>