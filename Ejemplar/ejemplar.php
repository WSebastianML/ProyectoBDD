<?php
require '../conexion.php';
$con = new Conexion();
$consultaPelicula = "SELECT * FROM Ejemplar";
$queryPelicula = $con->getConexion()->prepare($consultaPelicula);
$queryPelicula->execute();
if(!$queryPelicula){
    echo "Error";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ejemplarId = $_POST['ejemplar_id'];
    $agencia_id = $_POST['agencia_id'];

    $borrar = "DELETE Ejemplar_Conservacion WHERE ejemplar_id = $ejemplarId";
    $query = $con->getConexion()->prepare($borrar);
    $query->execute();
    
    if($agencia_id == 1){
       
        $borrar2 = "DELETE Ejemplares_info_01 WHERE ejemplar_id = $ejemplarId";
        $query2 = $con->getConexion()->prepare($borrar2);
        $query2->execute();

    }else if($agencia_id == 2){
        $borrar = "DELETE [WIN-D5TV30MDGGJ].[BaseGuayaquil].dbo.Ejemplares_info_02 WHERE ejemplar_id = $ejemplarId";
        $query = $con->getConexion()->prepare($borrar);
        $query->execute();
    }
    
    
    //echo $borrar;
    header('Location: ejemplar.php');


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
        <a href="crearEjemplar.php">Crear</a>
        <a href="actualizarEjemplar.php">Actualizar</a>
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