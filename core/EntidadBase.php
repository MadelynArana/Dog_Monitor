<?php

include_once(__DIR__ . '/Conexion.php');

class EntidadBase {

    private $tabla;

    public function __construct($tabla) {
        $this->tabla = $tabla;
    }

    public function execute($query, $parametros) {
        try {
            $db = BD::conectar();
            $consulta = $db->prepare($query);
            $consulta->execute($parametros);
            return $consulta;
        } catch (Exception $ex) {
            echo "Error al ejcutar " + $ex;
        }
    }

    public function listar() {
        $query = "select * from $this->tabla";
        $parametros = array();
        return $this->execute($query, $parametros);
    }

    public function buscarID($codigo) {
        $query = "select * from $this->tabla where codigo=?";
        $parametros = array($codigo);
        return $this->execute($query, $parametros);
    }

}
