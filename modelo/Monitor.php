<?php

include_once(__DIR__ . '/../core/EntidadBase.php');

class Monitor extends EntidadBase {

    private $tabla = 'monitor';
    private $codigoMonitor=null;
    private $fecha;
    private $temperatura=0;
    private $pulso = 0;
    private $humedad = 0;
    private $latitud = null;
    private $longitud = null;
    private $veloidad = null;
    private $nombreMascota = null;
    private $raza = null;
    private $edad = null;
    private $peso = 0;
    private $codigoMascota = 0;
    private $fotoMascota = null;
    private $nombreUsuario = null;

    public function __construct() {
        parent::__construct($this->tabla);
    }

    public function getCodigoMonitor() {
        return $this->codigoMonitor;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getTemperatura() {
        return $this->temperatura;
    }

    public function getPulso() {
        return $this->pulso;
    }

    public function getHumedad() {
        return $this->humedad;
    }

    public function getLatitud() {
        return $this->latitud;
    }

    public function getLongitud() {
        return $this->longitud;
    }

    public function getVeloidad() {
        return $this->veloidad;
    }

    public function getNombreMascota() {
        return $this->nombreMascota;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getCodigoMascota() {
        return $this->codigoMascota;
    }

    public function getFotoMascota() {
        return $this->fotoMascota;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setCodigoMonitor($codigoMonitor) {
        $this->codigoMonitor = $codigoMonitor;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }

    public function setPulso($pulso) {
        $this->pulso = $pulso;
    }

    public function setHumedad($humedad) {
        $this->humedad = $humedad;
    }

    public function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    public function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    public function setVeloidad($veloidad) {
        $this->veloidad = $veloidad;
    }

    public function setNombreMascota($nombreMascota) {
        $this->nombreMascota = $nombreMascota;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setCodigoMascota($codigoMascota) {
        $this->codigoMascota = $codigoMascota;
    }

    public function setFotoMascota($fotoMascota) {
        $this->fotoMascota = $fotoMascota;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function arregloMonitorID($codigo) {
        $consulta = parent::buscarID($codigo);
        while ($fila = $consulta->fetch()) {
            $monitor = new Monitor();
            $monitor->setFecha($fila["FECHA"]);
            $monitor->setCodigoMascota($fila["CODIGO"]);
            $monitor->setTemperatura($fila["TEMPERATURA"]);
            $monitor->setPulso($fila['PULSO_CARDIACO']);
            $monitor->setLatitud($fila['LATITUD']);
            $monitor->setLongitud($fila['LONGITUD']);
            $monitores[] = $monitor;
        }
        return $monitores;
    }

    public function monstrarMonitorID($codigo) {
        $query = "CALL PS_MONITOR_VISTA(?)";
        $parametro = array($codigo);
        $consulta = parent::execute($query, $parametro);
        $fila = $consulta->fetch();
        $monitor = new Monitor();
        $monitor->setCodigoMonitor($fila['MONITOR_CODIGO']);
        $monitor->setFecha($fila['MONITOR_FECHA']);
        $monitor->setHumedad($fila['MONITOR_HUMEDAD']);
        $monitor->setLatitud($fila['MONITOR_LATITUD']);
        $monitor->setLongitud($fila['MONITOR_LONGITUD']);
        $monitor->setPulso($fila['MONITOR_PULSO']);
        $monitor->setTemperatura($fila['MONITOR_TEMPERATURA']);
        $monitor->setNombreMascota($fila['MASCOTA_NOMBRE']);
        $monitor->setPeso($fila['MASCOTA_PESO']);
        $monitor->setcodigoMascota($fila['MASCOTA_CODIGO']);
        $monitor->setRaza($fila['MASCOTA_RAZA']);
        $monitor->setEdad($fila['MASCOTA_EDAD']);
        $monitor->setFotoMascota($fila['MASCOTA_FOTO']);
        $monitor->setNombreUsuario($fila['NOMBRE_USUARIO']);
        return $monitor;
    }

}
