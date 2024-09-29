<?php

    if (!empty($_POST))
    {
        $altura  = $_POST["altura"];
        $anchura  = $_POST["anchura"];

        $tabla = "
    <style>
        table {
            width: 75%;
            height: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #343a40;
            color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #dee2e6;
        }

        th {
            font-weight: bold;
            font-size: 1.2em;
        }

        td {
            font-size: 1em;
            color: #495057;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>";
    $tabla .= "<table>";
    for ($i = 0; $i < $altura; $i++) {
        if ($i == 0) {
            $tabla .= "<thead>
                        <tr>
                          <th colspan='$anchura'> Tabla </th>
                        </tr>
                       </thead>";
        }
    
        if ($i == 1) {
            $tabla .= "<tbody>";
        }
    
        for ($j = 0; $j < $anchura; $j++) {
            if ($j == 0) {
                $tabla .= "<tr>";
            }
    
            if ($i == $j) {
                $tabla .= "<td> x: $j y: $i </td>";
            } else {
                $tabla .= "<td></td>";
            }
    
            if ($j == ($anchura - 1)) {
                $tabla .= "</tr>";
            }
        }
    }
    $tabla .= "</tbody></table>";    

        echo($tabla);
    }
?>