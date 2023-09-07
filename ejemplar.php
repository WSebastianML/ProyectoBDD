<?php
require 'conexion.php';
$con = new Conexion();
$consultaPelicula = "SELECT * FROM Ejemplar";
$queryPelicula = $con->getConexion()->prepare($consultaPelicula);
$queryPelicula->execute();
if(!$queryPelicula){
    echo "Error";
}

if (isset($_POST['ejemplar_id'])) {
    $peliculaId = $_POST['ejemplar_id'];
    
    // Realiza la función deseada con el ID de la película aquí
    //$borrar = "DELETE * FROM Pelicula WHERE pelicula_id = $peliculaId";
    //$query = $con->getConexion()->prepare($borrar);
    //$query->execute();
    // Por ejemplo, puedes hacer una consulta adicional usando $peliculaId
    
    // Luego, puedes mostrar el resultado o redirigir al usuario
    $resultado = "Función ejecutada con éxito para el ejemplar ID: " . $peliculaId;
    echo $resultado;
}
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
        <h1>Ejemplares</h1>
        <a href="crearEjemplar.php">Crear</a>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Conservacion</th>
                    <th>Numero</th>
                    <th>pelicula_id</th>
                    <th>agencia_id</th>
                    <th>Operaciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                while($row = $queryPelicula->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>" . $row['ejemplar_id'] . "</td>";
                    echo "<td>" . $row['conservacion'] . "</td>";
                    echo "<td>" . $row['numeroEjemplar'] . "</td>";
                    echo "<td>" . $row['pelicula_id'] . "</td>";
                    echo "<td>" . $row['agencia_id'] . "</td>";
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='ejemplar_id' value='" . $row['ejemplar_id'] . "'>";
                    echo "<input type='submit' value='Borrar'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>