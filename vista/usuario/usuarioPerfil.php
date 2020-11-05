<?php
include '../header.php';
require '../seguridad/seguridad.php';
require '../../modelo/Usuario.php';

$usuarioSession = $_SESSION["USUARIO"];

$codigoUsuario = $_SESSION["CODIGO_USUARIO"];
?>


<center>

    <div class="container">



        <div class="row">
            <div class="col-md"><a href="../seguridad/salir.php"><img src="../../recurso/imagen/icono/salida.png"></a></div>
        </div>
    </div>


    <div class="container">

        <div class="col-md-12 tituloBienvenida">
            <p>Bienvenida:  <?php echo '<b>  ' . $usuarioSession . '</b>'; ?>
        </div>

        <div class="row">
            <div class="col-sm mascotaRegistro">
                <a href="../mascota/mascotaRegistro.php"><b>Registar Mascota</b><br><img src="../../recurso/imagen/icono/registrarMascota.png"></a>
            </div>
            <div class="col-sm mascotaLista">
                <a href="../mascota/mascota.php"><b>Ver Mascotas</b><br><img src="../../recurso/imagen/icono/perros.png"></a>
            </div>
        </div>
    </div>



</div>
</center>



