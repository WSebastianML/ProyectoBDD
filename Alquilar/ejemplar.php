<?php

require '../conexion.php';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $peliculaId = $_POST['pelicula_id'];
    $consulta = "SELECT * FROM Ejemplar WHERE pelicula_id=$peliculaId";
    //echo $consulta;
    $query = $con->getConexion()->prepare($consulta);
    $query->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplar</title>
    <link rel="stylesheet" href="../interfaz.css">
</head>
<body>

    <main class="contenedor">
        <h1>Ejemplares</h1>
        <a href="pelicula.php">Regresar</a>
        <a href="alquilar.php">Alquilar</a>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Conservacion</th>
                    <th>Numero</th>
                    <th>pelicula_id</th>
                    <th>agencia_id</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>" . $row['ejemplar_id'] . "</td>";
                    echo "<td>" . $row['conservacion'] . "</td>";
                    echo "<td>" . $row['numeroEjemplar'] . "</td>";
                    echo "<td>" . $row['pelicula_id'] . "</td>";
                    echo "<td>" . $row['agencia_id'] . "</td>";
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>