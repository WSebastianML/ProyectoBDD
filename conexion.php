<?php
require 'setting.php';

class conexion{
    private $conector = null;

    public function getConexion(){
        $this->$conector = new PDO("sqlsrv:server=".SERVIDOR.";database=".DATABASE,USUARIO,PASSWORD);
        return $this->$conector;
    }
}

$con = new Conexion();

if($con->getConexion() != null){
    echo "Conexion exitosa";
    $consulta = $con->getConexion()->prepare("SELECT * FROM Actor");
    $consulta->execute();
    echo json_encode(['actor'=>$consulta->fetchAll(PDO::FETCH_ASSOC)]);
}else{
    echo "Error";
}