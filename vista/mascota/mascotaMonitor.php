<?php
include '../header.php';
include_once(__DIR__ . '/../../modelo/Monitor.php');



$codigoMonitor = $_GET['codigoMonitor'];

if (empty($codigoMonitor)) {
    echo 'Sin registros';
} else {



    $monitor = new Monitor();
    $datos = $monitor->monstrarMonitorID($codigoMonitor);
    $mapa = $monitor->arregloMonitorID($codigoMonitor);



    $coordinates = array();
    $latitudes = array();
    $longitudes = array();

    foreach ($mapa as $l) {
        $latitudes[] = $l->getLatitud();
        $longitudes[] = $l->getLongitud();
        $coordinates[] = 'new google.maps.LatLng(' . $l->getLatitud() . ',' . $l->getLongitud() . '),';
    }
    $lastcount = count($coordinates) - 1;
    $coordinates[$lastcount] = trim($coordinates[$lastcount], ",");
    ?>     


    <div class="container">
        <a href="../usuario/usuarioPerfil.php"><img src="../../recurso/imagen/icono/regresar.png"></a>
        <a href="../seguridad/salir.php"><img src="../../recurso/imagen/icono/salida.png"></a>
    </div>
    <br>

    <div class="container">


        <div class="row">
            <div class="col-md">       


                <div id="imagenMascota">
                    <img src="../../recurso/imagen/foto/zuma.jpg" style=" width: 241px; border-radius: 161px;">
                </div>


                <div class="cabeceraMonitor">
                <div class="nombreMascota">
                    <?php echo '<b>' . $datos->getNombreMascota() . '</b>'; ?>
                </div>

                <div class="codigoMascota">
                    <?php echo '<b>' . $datos->getCodigoMonitor() . '</b>'; ?>
                </div>

            </div>

                <div class="pulso">       
                    <img src="../../recurso/imagen/icono/cardiograma.png"style="width: 40px;"></td>
                    <?php echo $datos->getPulso() . ' bpm'; ?>

                </div>

                <div class="temperatura">           
                    <img src="../../recurso/imagen/icono/temperatura.png" style="width: 40px;">
                    <?php echo $datos->getTemperatura() . ' °C'; ?>
                </div>



                <div class="humedad"> 
                    <img src="../../recurso/imagen/icono/humedad.png" style="width: 40px;">
                    <?php echo $datos->getHumedad() . ' °C'; ?></td>

                </div>
            </div>
            <div class="col-md">
                <div  class="btn btn-info">
                    <a href='../reporte/reporteMascota.php?codigoMascota=<?php echo $datos->getCodigoMascota(); ?>'>IMPRIMIR</a>
                </div>
            </div>
            <div class="mapaMascota">
                <div class="tituloMapa">Ubicación Mascota</div>
                <b>Latitud:</b> <span id="latitud" ><?php echo $datos->getLatitud(); ?></span> </p>
                <b>Longitud:</b> <span id="longitud"><?php echo $datos->getLongitud(); ?></span> 
                <p></p>



                <div id="map" style="width: 100%; height: 80vh;"></div>

                <script>
                    function initMap() {
                        var mapOptions = {
                            zoom: 14,
                            center: {<?php echo'lat:' . $latitudes[0] . ', lng:' . $longitudes[0]; ?>}, //{lat: --- , lng: ....}
                            mapTypeId: google.maps.MapTypeId.SATELITE
                        };

                        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

                        var RouteCoordinates = [
    <?php
    $i = 0;
    while ($i < count($coordinates)) {
        echo $coordinates[$i];
        $i++;
    }
    ?>
                        ];

                        var RoutePath = new google.maps.Polyline({
                            path: RouteCoordinates,
                            geodesic: true,
                            strokeColor: '#FF448A',
                            strokeOpacity: 1.0,
                            strokeWeight: 10
                        });

                        mark = '../../recurso/imagen/icono/mark.png';
                        flag = '../../recurso/imagen/icono/flag.png';

                        puntoInicial = {<?php echo'lat:' . $latitudes[0] . ', lng:' . $longitudes[0]; ?>};
                        puntoFinal = {<?php echo'lat:' . $latitudes[$lastcount] . ', lng:' . $longitudes[$lastcount]; ?>};

                        var marker = new google.maps.Marker({
                            position: puntoInicial,
                            map: map,
                            icon: mark,
                            title: "Punto de partida",
                            animation: google.maps.Animation.DROP
                        });

                        var marker = new google.maps.Marker({
                            position: puntoFinal,
                            map: map,
                            icon: flag,
                            title: "Punto final",
                            animation: google.maps.Animation.BOUNCE
                        });

                        RoutePath.setMap(map);
                    }


                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=initMap"></script>

            </div>
        </div>
    </div>
<?php } ?>