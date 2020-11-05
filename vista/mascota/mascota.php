<?php 
include '../header.php';

?>


<div class="container">
    <a href="../usuario/usuarioPerfil.php"><img src="../../recurso/imagen/icono/regresar.png"></a>
    <a href="../seguridad/salir.php"><img src="../../recurso/imagen/icono/salida.png"></a>
</div>
<br>

<div class="container">


    <div class="row">
        <div class="col-md  center-block">   
<div class="tituloListadoMascotas"><h3>Listado de Mascotas </h3>
<form action="../mascota/mascotaMonitor.php" method="POST">
<table  class="table">
    <thead>
        <tr>

            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
             <th colspan="2">Operación</th>
        </tr>               
    </thead>
    <tbody id="listarMascotas">


    </tbody>
    
    
    
</table>
<div class="respuestaformMascota"></div>

</form>
</div>
        </div>
    </div>