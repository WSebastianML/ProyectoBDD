<?php
require '../conexion.php';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $socio_id = $_POST["socio_id"];
    $ejemplar_id = $_POST["ejemplar_id"];
    $fechaAlquiler = $_POST['fechaAlquiler'];
    $fechaDevolucion = $_POST['fechaDevolucion'];

    $consulta = "SELECT agencia_id FROM Ejemplar WHERE ejemplar_id=$ejemplar_id";
    $query = $con->getConexion()->prepare($consulta);
    $query->execute();
    $id = $query->fetch(PDO::FETCH_ASSOC);
    $res = $id['agencia_id'];
    echo $res;


    if($res == 1){
        $consulta = "INSERT INTO Alquilados_01 VALUES ($socio_id, $ejemplar_id, '$fechaAlquiler', '$fechaDevolucion')";
        $query = $con->getConexion()->prepare($consulta);
        $query->execute();
        header('Location: pelicula.php');
        //echo $consulta;
        
    }else if($res == 2){
        $consulta = "INSERT INTO [WIN-D5TV30MDGGJ].[BaseGuayaquil].dbo.Alquilados_02 VALUES($socio_id, $ejemplar_id, '$fechaAlquiler', '$fechaDevolucion')";
        $query = $con->getConexion()->prepare($consulta);
        $query->execute();
        header('Location: pelicula.php');
        //echo $consulta;
    }

    
    if(!$query){
        echo "Error";
    }
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
    <header>
        <h1>Glob Gusters</h1>
    </header>

    <main class="contenedor">
        <h2>Alquilar Ejemplar</h2>
        <a href="pelicula.php">Regresar</a>
        <form method="POST">
            <fieldset>
                <legend>Ingrese los datos</legend>

                <div>
                    <label for="socio_id">Socio_id</label> 
                    <input type="text" name="socio_id">
                </div>

                <div>
                    <label for="ejemplar_id">ejemplar_id</label> 
                    <input type="text" name="ejemplar_id">
                </div>

                

                <div>
                    <label for="Fecha Alquiler">Fecha Alquiler</label> 
                    <input type="text" name="fechaAlquiler">
                </div>

                <div>
                    <label for="Fecha Devolucion">Fecha Devolucion</label> 
                    <input type="text" name="fechaDevolucion">
                </div>

            </fieldset> 
            <input type="submit" value="Aceptar"> 
        </form> 
    </main> 
</body> 
</html> 