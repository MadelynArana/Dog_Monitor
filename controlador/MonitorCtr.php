<?php

include_once(__DIR__ . '/../core/Configuracion.php');
include_once(__DIR__ . '/../core/Mensaje.php');
include_once(__DIR__ . '/../modelo/Monitor.php');


$codigoMonitor = isset($_GET['codigoMonitor']) ? $_GET['codigoMonitor'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : '';
$pulso = isset($_POST['codigoMonitor']) ? $_POST['codigoMonitor'] : '';
$humedad = isset($_POST['codigoMonitor']) ? $_POST['codigoMonitor'] : '';
$latitud = isset($_POST['codigoMonitor']) ? $_POST['codigoMonitor'] : '';
$longitud = isset($_POST['codigoMonitor']) ? $_POST['codigoMonitor'] : '';
$veloidad = isset($_POST['codigoMonitor']) ? $_POST['codigoMonitor'] : '';

$monitor = new Monitor();

if (isset($_GET[OPERACION])) {
    $operacion = $_GET[OPERACION];
    if ($operacion == 'registrar') {
        $m->setCodigoMonitor($_GET['codigoMonitor']);
        $m->setHumedad($_GET['humedad']);
        $m->setLatitud($_GET['latitud']);
        $m->setLongitud($_GET['longitud']);
        $m->setPulso($_GET['pulso']);
        $m->setTemperatura($_GET['temperatura']);

        echo $BD->insertar($m);
    } else if ($operacion == 'verDatos') {
        $m->setCodigoMonitor("MADELYN");
        $monitor = $BD->verMonitor($m);
        foreach ($monitor as $m) {
            echo $m->getLatitud();
        }
    }
} else {
    echo SIN_SELECCION;
}

