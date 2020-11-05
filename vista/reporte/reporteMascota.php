<?php

include_once(__DIR__ . '/../../recurso/fpdf/fpdf.php');
include_once(__DIR__ . '/../../modelo/Monitor.php');
include_once(__DIR__ . '/../../modelo/Mascota.php');
include_once(__DIR__ . '/../../core/Funcion.php');

class MiReporte extends FPDF {

    function Header() {
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(80);
        $this->Cell(30, 10, 'Reporte General', 0, 0, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->addLink();
        $this->Cell(5, 10, 'www.madelynarana.com', 0, 0);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, utf8_decode('Página ' ). $this->PageNo(), 0, 0, 'C');
    }

}

$pdf = new MiReporte();


$codigo = $_GET['codigoMascota'];
$monitor = new Monitor();
$funcion = new Funcion();


$mascota = new Mascota();
$codigoMonitor = $mascota->getCodigoMonitor();
$datos = $mascota->buscarMascota($codigo);
$tabla = $monitor->arregloMonitorID($datos->getCodigoMonitor());

$edad = $funcion->edad($datos->getEdad());

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Ln(6);
//encabezado de la tabla

$pdf->Cell(40, 10, 'Nombre de la mascota: ' . utf8_decode($datos->getNombre()));
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Edad: ' . $edad . utf8_decode(' años'));
$pdf->Ln(8);
$pdf->Cell(40, 10, 'Peso aproximado: ' . $datos->getPeso() . ' LB');
$pdf->Ln(10);
$pdf->Cell(40, 10,utf8_decode('Gráfica de ritmo cardíaco'));
$pdf->Ln(15);
$pdf->Cell(1, 20, $pdf->Image('../../recurso/imagen/foto/graficaRitmo.png'), 1, 0, 'C', 1);
$pdf->Ln(2);
$pdf->setFillColor(0, 202, 250);
$pdf->SetFont("Times", 'B', 14);
$pdf->Cell(70, 12, 'FECHA', 1, 0, 'C', 1);
$pdf->Cell(60, 12, 'TEMPERATURA', 1, 0, 'C', 1);
$pdf->Cell(60, 12, utf8_decode('RÍTMO CARDÍACO'), 1, 1, 'C', 1);
$pdf->setFillColor(255, 255, 255);
$pdf->SetFont("Times", '', 14);
foreach ($tabla as $t) {
    $pdf->Cell(70, 12, $t->getFecha(), 1, 0, 'C', 1);
    $pdf->Cell(60, 12, $t->getTemperatura() . ' C', 1, 0, 'C', 1);
    $pdf->Cell(60, 12, $t->getPulso() . ' bpm', 1, 1, 'C', 1);
}
$pdf->Output();
?>
