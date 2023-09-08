<?php
require '../conexion.php';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["ejemplar_id"];
    $conservacion = $_POST["conservacion"];
    $numeroEjemplar = $_POST["numeroEjemplar"];
    $pelicula_id = $_POST["pelicula_id"];
    $agencia_id = $_POST["agencia_id"];

    $consulta2 = "UPDATE Ejemplar_Conservacion SET conservacion='$conservacion', agencia_id=$agencia_id WHERE ejemplar_id=$id";
    $query2 = $con->getConexion()->prepare($consulta2);
    $query2->execute();

    if($agencia_id == 1){
        $consulta = "UPDATE Ejemplares_info_01 SET numeroEjemplar=$numeroEjemplar, pelicula_id=$pelicula_id, agencia_id=$agencia_id WHERE ejemplar_id=$id";
        $query = $con->getConexion()->prepare($consulta);
        $query->execute();
        header('Location: ejemplar.php');
        
    }else if($agencia_id == 2){
        $consulta = "UPDATE [WIN-D5TV30MDGGJ].[BaseGuayaquil].dbo.Ejemplares_info_02 SET numeroEjemplar=$numeroEjemplar, pelicula_id=$pelicula_id, agencia_id=$agencia_id WHERE ejemplar_id=$id";
        $query = $con->getConexion()->prepare($consulta);
        $query->execute();
        header('Location: ejemplar.php');
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
        <h2>Actualizar ejemplar</h2>
        <a href="ejemplar.php">Regresar</a>
        <form method="POST">
            <fieldset>
                <legend>Ingrese los datos</legend>
                <div>
                    <label for="ejemplar_id">ejemplar_id</label> 
                    <input type="text" name="ejemplar_id">
                </div>

                <div>
                    <label for="conservacion">Conservacion</label> 
                    <input type="text" name="conservacion">
                </div>

                <div>
                    <label for="Numero de ejemplar">Numero de ejemplar</label> 
                    <input type="text" name="numeroEjemplar">
                </div>

                <div>
                    <label for="Pelicula_id">Pelicula_id</label> 
                    <input type="text" name="pelicula_id">
                </div>

                <div>
                    <label for="Agencia">Agencia</label> 
                    <input type="text" name="agencia_id"> 
                </div>
            </fieldset> 
            <input type="submit" value="Aceptar"> 
        </form> 
    </main> 
</body> 
</html> 