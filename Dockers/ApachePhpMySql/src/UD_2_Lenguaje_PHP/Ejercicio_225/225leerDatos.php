<?php

    if (!empty($_POST))
    {
        $numero  = $_POST["numero"];
        $cadena = "<form action=". "./225sumarDatos.php" . " method=" . "post" . ">";
        for ($i = 0; $i < $numero; $i++)
        {
            $cadena .= "
                        <label for=" . $i . ">Introduce el número:</label>
                        <input type=" . "text" . " name=" . $i . " id=" . $i . ">
                    ";
                
        }
        $cadena .= "    <input type=". "submit" .">
                    </form>";
        echo($cadena);
    }
?>