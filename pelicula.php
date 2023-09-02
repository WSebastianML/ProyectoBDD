<?php
require 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="interfaz.css">
</head>
<body>

    <main class="contenedor">
        <h1>Peliculas</h1>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Título</th>
                    <th>Nacionalidad</th>
                    <th>Productor</th>
                    <th>Director_id</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                while($row = $queryPelicula->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>" . $row['pelicula_id'] . "</td>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "<td>" . $row['titulo'] . "</td>";
                    echo "<td>" . $row['nacionalidad'] . "</td>";
                    echo "<td>" . $row['productor'] . "</td>";
                    echo "<td>" . $row['director_id'] . "</td>";
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>