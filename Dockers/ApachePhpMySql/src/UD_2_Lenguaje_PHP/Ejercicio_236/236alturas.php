<?php
    if (!empty($_POST))
    {
        $tabla = "
    <style>
        table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin: 20px 0;
        font-size: 16px;
        font-family: 'Arial', sans-serif;
        color: #333;
        background-color: #f9f9f9;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
        background-color: #66bb6a; /* Color verde suave */
        color: white;
        }

        th, td {
        padding: 15px;
        text-align: center; /* Centramos el texto en las celdas */
        }

        tbody tr {
        transition: background-color 0.3s ease;
        }

        tbody tr:hover {
        background-color: #f1f1f1; /* Color de fondo más claro al pasar el mouse */
        }

        tbody tr:nth-child(even) {
        background-color: #f7f7f7; /* Coloreado suave para filas pares */
        }

        th {
        font-weight: bold;
        }

        td {
        border-bottom: 1px solid #ddd;
        }
    </style>";

        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $a3 = $_POST['a3'];

        $nombreAltura = [
            $p1 => $a1,
            $p2 => $a2,
            $p3 => $a3,
        ];
        $tabla .= "<table>
                    <thead>
                        <tr>
                            <th> Nombre </th>
                            <th> Altura </th>
                        </tr>
                    </thead>
                    <tbody>";
        foreach ($nombreAltura as $nombre => $altura)
        {
            $tabla .= " <tr>
                            <td>$nombre</td>
                            <td>$altura</td>
                        </tr>";
        }
        $tabla .= "</tbody>";
        $tabla .= "</table>";
        echo($tabla);
    }
?>