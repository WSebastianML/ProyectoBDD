<?php
require '../conexion.php';
$con = new Conexion();
$consulta = "SELECT * FROM Socio";
$query = $con->getConexion()->prepare($consulta);
$query->execute();
if(!$query){
    echo "Error";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $socioId = $_POST['socio_id'];
    $agencia_id = $_POST['agencia_id'];
    
    if($agencia_id == 1){
        $borrar = "DELETE Socios_01 WHERE socio_id = $socioId";
        $query = $con->getConexion()->prepare($borrar);
        $query->execute();

    }else if($agencia_id == 2){
        $borrar = "DELETE [WIN-D5TV30MDGGJ].[BaseGuayaquil].dbo.Socios_02 WHERE socio_id = $socioId";
        $query = $con->getConexion()->prepare($borrar);
        $query->execute();
    }
    
    
    //echo $borrar;
    header('Location: socio.php');


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socios</title>
    <link rel="stylesheet" href="../interfaz.css">
</head>
<body>

    <main class="contenedor">
        <h1>Socios</h1>
        <a href="crearSocio.php">Crear</a>
        <a href="actualizarSocio.php">Actualizar</a>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Avalado Por</th>
                    <th>Agencia</th>
                    <th>Operaciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>" . $row['socio_id'] . "</td>";
                    echo "<td>" . $row['cc'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['apellido'] . "</td>";
                    echo "<td>" . $row['direccion'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "<td>" . $row['avaladoPor'] . "</td>";
                    echo "<td>" . $row['agencia_id'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='socio_id' value='" . $row['socio_id'] . "'>";
                    echo "<input type='hidden' name='agencia_id' value='" . $row['agencia_id'] . "'>";
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