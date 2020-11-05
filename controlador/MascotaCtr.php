<?php
include_once(__DIR__ . '/../modelo/Mascota.php');
include_once(__DIR__ . '/../modelo/Usuario.php');
include_once(__DIR__ . '/../core/Mensaje.php');
include_once(__DIR__ . '/../core/Configuracion.php');

//Instancia de la clase Mascota
$mascota = new Mascota();

$mascota->setCodigo(isset($_POST['codigoMascota']) ? $_POST['codigoMascota'] : '');
$mascota->setNombre(isset($_POST['nombre']) ? $_POST['nombre'] : '');
$mascota->setCodigoMonitor(isset($_POST['codigoMonitor']) ? $_POST['codigoMonitor'] : '');
$mascota->setFoto(isset($_POST['foto']) ? $_POST['foto'] : '');
$mascota->setRaza(isset($_POST['raza']) ? $_POST['raza'] : '');
$mascota->setPeso(isset($_POST['peso']) ? $_POST['peso'] : '');
$mascota->setEdad(isset($_POST['edad']) ? $_POST['edad'] : '');
$mascota->setCodigoUsuario($codigoUsuario = 2);



if (isset($_GET[OPERACION])) {
    $operacion = $_GET[OPERACION];
    if ($operacion == LISTAR_MASCOTAS) {

        $filas = $mascota->listarMascotas();
        if (isset($filas)) {

            $contador = 1;
            foreach ($filas as $f):
                ?>
                <tr>
                    <td scope="row"><?php echo $f->getCodigo() ?></td>
                    <td scope="row"><?php echo $f->getNombre() ?></td>
                    <td><a href="#" onclick='mascotaEliminar(<?php echo $f->getCodigo() ?>)'><img src="../../recurso/imagen/icono/borrar.png"> </a></td>                
                    <td scope="row"><a href='../mascota/mascotaMonitor.php?codigoMonitor=<?php echo $f->getCodigoMonitor() ?>'><img src="../../recurso/imagen/icono/lupa.png"> </a></td>";

                </tr>   
                <?php
                $contador += 1;
            endforeach;
        }
    } else if ($operacion == REGISTRAR) {
        if ($mascota->getCodigo() ==0) {
            $respuesta = $mascota->ejecutar($mascota, 'C');
            echo $respuesta ? EXITO_REGISTRO : ERROR_REGISTRO;
        } else {
            echo $mascota->getCodigo();
            $respuesta = $mascota->ejecutar($mascota, 'U');
            echo $respuesta ? EXITO_ACTUALIZAR : ERROR_ACTUALIZAR;
        }
    } else if ($operacion == ELIMINAR) {
        $respuesta = $mascota->ejecutar($mascota, 'D');
        echo $respuesta ? EXITO_ELIMINAR : ERROR_ELIMINAR;
    } else {
        echo SIN_SELECCION;
    }
}


