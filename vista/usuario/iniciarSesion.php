<?php  include '../header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md">

            <form class="center">
                <center><div class="logo"><img src="../../recurso/imagen/foto/logo.png"></div></center>
                <div class="form-group">             
                    <input class="form-control form-control-lg" id="txtUsuario" type="text" placeholder="Usuario">
                </div>
                <p>
                <div class="form-group">  
                    <input class="form-control form-control-lg" id="txtContrasena" type="password" placeholder="Contraseña">
                </div>
                <p>
                <div class="form-group">
                    <center><input type="button" class="btn btn-info"  type="button" onclick='ingresoUsuario()' value="INGRESAR"/>
                        <input type="button" class="btn  btn-danger" value="REGISTRAR"/></center>
                </div>

                <div class="mensaje"></div>
            </form>
        </div>
    </div>
</div>



