<?php

include_once(__DIR__ . '/../core/EntidadBase.php');
header("Content-Type: text/html;charset=utf-8");

class Mascota extends EntidadBase {

    private $tabla = 'mascota';
    private $codigo = 0;
    private $nombre = null;
    private $edad = '2020-01-02';
    private $peso = 0;
    private $foto = null;
    private $codigoMonitor = 0;
    private $raza = 0;
    private $codigoUsuario = 0;

    public function __construct() {
        parent::__construct($this->tabla);
    }

    public function toString() {
        echo '<b>Codigo</b> ' . $this->codigo . '<b> Nombre </b> ' . $this->nombre . '<b> Edad</b> ' . $this->edad . '<b> Peso</b> ' . $this->peso . '<b > Foto </b> ' . $this->foto . '<b> Monitor </b> ' . $this->codigoMonitor . '<b> Raza </b> ' . $this->raza . '<b>Código de usuario :</b>' . $this->codigoUsuario;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getCodigoMonitor() {
        return $this->codigoMonitor;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function getCodigoUsuario() {
        return $this->codigoUsuario;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setCodigoMonitor($codigoMonitor) {
        $this->codigoMonitor = $codigoMonitor;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function setCodigoUsuario($codigoUsuario) {
        $this->codigoUsuario = $codigoUsuario;
    }

    // C=Insertar U= actualizar D=eliminar
    public function ejecutar($mascota, $opcion) {
        $sql = "call crud_mascota(?,?,?,?,?,?,?,?,?)";
        $parametro = array($mascota->getCodigo(), $opcion, $mascota->getCodigoMonitor(), $mascota->getFoto(), $mascota->getNombre(), $mascota->getCodigoUsuario(), $mascota->getPeso(), $mascota->getEdad(), $mascota->getRaza());
        return parent::execute($sql, $parametro);
    }

    public function buscarMascota($codigo) {
        $consulta = parent::buscarID($codigo);
        $fila = $consulta->fetch();
        $mascota = new Mascota();
        $mascota->setCodigo($fila['CODIGO']);
        $mascota->setCodigoMonitor($fila['CODIGO_MONITOR']);
        $mascota->setEdad($fila['EDAD']);
        $mascota->setNombre($fila['NOMBRE_MASCOTA']);
        $mascota->setRaza($fila['RAZA']);
        $mascota->setPeso($fila['PESO']);
        $mascota->setFoto($fila['FOTO']);
        return $mascota;
    }

    public function listarMascotas() {
        $consulta = parent::listar();
        $mascotas = [];
        while ($fila = $consulta->fetch()) {
            $mascota = new Mascota();
            $mascota->setCodigo($fila["CODIGO"]);
            $mascota->setNombre($fila["NOMBRE_MASCOTA"]);
            $mascota->setCodigoMonitor($fila["CODIGO_MONITOR"]);
            $mascota->setPeso($fila["PESO"]);
            $mascota->setEdad($fila["EDAD"]);
            $mascota->setRaza($fila["RAZA"]);
            $mascota->setFoto($fila["FOTO"]);
            $mascotas[] = $mascota;
        }

        if (empty($mascotas)) {
            echo 'Sin registros';
        } else {
            return $mascotas;
        }
    }

}
