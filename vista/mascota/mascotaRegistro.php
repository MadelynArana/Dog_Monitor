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

            <form  action="<?php $_PHP_SELF ?>" method="post" id="formMascota">
                <input type="button" class="btn btn-info" onclick='limpiar()' value="LIMPIAR"/>
                <input type="text" class="form-control"  id="codigoMascota"  placeholder="Código" />
                <div class="form-group">
                    <label>Número Monitor </label> <input type="text" class="form-control"  id="codigoMonitor" placeholder="Código Monitor" />
                </div>

                <div class="form-group">
                    <label>Nombre </label><input type="text" class="form-control"  id="nombreMascota" placeholder="Nombre Mascota"/>
                </div>
                <label>Raza </label><input class="form-control"  type="text" id="raza" placeholder="Raza"/>
                <label>Fotográfia </label><input type="text" class="form-control"  id="fotoMascota" placeholder="Foto mascota"/>
                <label>Fecha nacimiento  </label><input type="date" class="form-control"  id="edadMascota"  />
                <label>Peso aproximado </label><input type="text" class="form-control"  id="pesoMascota" placeholder="Peso en LB"/>
                <div class="form-group">
                    <br>

                    <input type="button" class="btn btn-danger" onclick='mascota("REGISTRO")' value="GUARDAR"/>
                    <input type="button" class="btn btn-dark" onclick='mascota("ELIMINAR")' value="ELIMINAR"/>
                </div>
            </form>

            <div class="respuestaformMascota"></div>
        </div>
    </div>
</div>
<?php
include '../footer.php';
