<?php
require '../conexion.php';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["socio_id"];
    $cc = $_POST["cc"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST['telefono'];
    $avaladoPor = $_POST['avaladoPor'];
    $agencia_id = $_POST['agencia_id'];

    if($agencia_id == 1){
        //echo $consulta;
        $consulta = "UPDATE Socios_01 SET cc=$cc, nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono=$telefono, avaladoPor=$avaladoPor, agencia_id=$agencia_id WHERE socio_id=$id";
        //echo $consulta;
        $query = $con->getConexion()->prepare($consulta);
        $query->execute();
        header('Location: socio.php');

        if(!$query){
            echo "Error";
        }
    } else if($agencia_id == 2){
        $consulta = "UPDATE [WIN-D5TV30MDGGJ].[BaseGuayaquil].dbo.Socios_02 SET cc=$cc, nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono=$telefono, avaladoPor=$avaladoPor, agencia_id=$agencia_id WHERE socio_id=$id";
        //echo $consulta;
        $query = $con->getConexion()->prepare($consulta);
        $query->execute();
        header('Location: socio.php');
    }

    
}else{
    echo "no";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glob Gusters</title>
    <link rel="stylesheet" href="../interfaz.css">
</head>
<body>
    <header>
        <h1>Glob Gusters</h1>
    </header>

    <main class="contenedor">
        <h2>Actualizar socio</h2>
        <a href="socio.php">Regresar</a>
        <form method="POST">
            <fieldset>
                <legend>Ingrese los datos</legend>
                <div>
                    <label for="socio_id">ID</label> 
                    <input type="text" name="socio_id">
                </div>

                <div>
                    <label for="cc">Cedula</label> 
                    <input type="text" name="cc">
                </div>

                <div>
                    <label for="nombre">Nombre</label> 
                    <input type="text" name="nombre">
                </div>

                <div>
                    <label for="apellido">Apellido</label> 
                    <input type="text" name="apellido">
                </div>

                <div>
                    <label for="direccion">Direccion</label> 
                    <input type="text" name="direccion"> 
                </div>

                <div>
                    <label for="telefono">Telefono</label> 
                    <input type="text" name="telefono"> 
                </div>

                <div>
                    <label for="avaladoPor">Avalado Por</label> 
                    <input type="text" name="avaladoPor"> 
                </div>

                <div>
                    <label for="agencia_id">Agencia</label> 
                    <input type="text" name="agencia_id"> 
                </div>
            </fieldset> 
            <input type="submit" value="Aceptar"> 
        </form> 
    </main> 
</body> 
</html> 