<?php
require 'setting.php';

class conexion{
    private $conector = null;

    public function getConexion(){
        $this->$conector = new PDO("sqlsrv:server=".SERVIDOR.";database=".DATABASE,USUARIO,PASSWORD);
        return $this->$conector;
    }
}