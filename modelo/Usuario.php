<?php

include_once(__DIR__ . '/../core/EntidadBase.php');

class Usuario extends EntidadBase {

    private $usuario = null;
    private $nombre = null;
    private $contrasena = null;
    private $tipo = null;
    private $codigo = 0;
    private $tabla = 'usuario';

    public function __construct() {
        parent::__construct($this->tabla);
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function ejecutar($usuario, $opcion) {
        $sql = "CALL CRUD_USUARIO(?,?,?,?,?,?)";
        $parametro = array($usuario->getCodigo(), $opcion, $usuario->getUsuario(), $usuario->getContrasena(), $usuario->getNombre(), $usuario->getTipo());
        parent::execute($sql, $parametro);
    }

    public function buscarUsuario($nombreUsuario) {
        $sql = "SELECT * FROM $this->tabla WHERE usuario=?";
        $parametro = array($nombreUsuario);
        $consulta = parent::execute($sql, $parametro);
        $fila = $consulta->fetch();
        $usuario = new Usuario();
        $usuario->setCodigo($fila['USUARIO']);
        $usuario->setNombre($fila['NOMBRE_COMPLETO']);
        $usuario->setContrasena($fila['CONTRASENA']);
        $usuario->setTipo($fila['TIPO']);
        $usuario->setCodigo($fila['CODIGO']);
        return $usuario;
    }

    public function ingresar($usuario) {
        $sql = "select * from $this->tabla WHERE usuario=? and contrasena=?";
        $parametro = array($usuario->getUsuario(), $usuario->getContrasena());
        $arreglo = parent::execute($sql, $parametro);
        return $arreglo->rowCount();
    }

}
