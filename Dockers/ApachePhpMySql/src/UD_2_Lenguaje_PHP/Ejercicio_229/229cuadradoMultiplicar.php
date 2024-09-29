<?php
    $altura  = 12;
    $anchura  = 12;

    $tabla = "
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
        }

        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 40px;
            height: 40px;
        }

        tr:first-child td {
            background-color: #0051cf;
            color: white;
        }

        td:first-child {
            background-color: #f47421;
            color: white;
        }

        td {
            background-color: white;
        }
    </style>";
    $tabla .= "<table><tbody>";
    for ($i = 0; $i < $altura; $i++) 
    {
        
        $tabla .= "<tr>";
        for ($j = 0; $j < $anchura; $j++) 
        {

            if ($i == 0 && $j == 0) 
            {
                $tabla .= "
                            <td> x </td>";
            } else if ($i == 0) 
            {
                $tabla .= " <td> ". ($j-1) . "</td>";
            } else if ($j == 0) {
                $tabla .= " <td> ". ($i-1) . "</td>";
            } else if ($i == 1) {
                $tabla .= " <td> 0 </td>";
            } else if ($j == 1) {
                $tabla .= " <td> 0 </td>";
            }
            else
            {
                $tabla .= "<td> " . ($i - 1)*($j - 1) . "</td>";
            }
        }
    }
    $tabla .= "</tbody></table>";    

    echo($tabla);
?>