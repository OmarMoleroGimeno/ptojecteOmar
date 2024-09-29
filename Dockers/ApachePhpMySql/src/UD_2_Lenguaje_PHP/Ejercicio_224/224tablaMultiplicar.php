<?php

if (!empty($_POST))
{
    $numero = $_POST["numero"];
    $tabla = "<style>
        table {
            width: 50%;
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

        tr:nth-child(even) {
            background-color: #e9ecef;
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
            border: none;
        }
    </style>";

    $tabla .= "<table>
                <thead>
                    <tr>
                        <th> a </th>
                        <th> * </th>
                        <th> b </th>
                        <th> = </th>
                        <th> a*b </th>
                    </tr>
                </thead>
                <tbody>";
    for ($i=1; $i <= 10; $i++) { 
        $tabla .=  "<tr>
                        <td> $numero </td>
                        <td> * </td>
                        <td> $i </td>
                        <td> = </td>
                        <td> " . ($numero * $i) . " </td>
                    </tr>";
    }
    $tabla .= "     </tbody>
                </table>";
    echo($tabla);
}

?>