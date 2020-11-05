<?php

include '../header.php';
?>

<div class="menuRegistro">
    <ul>
        <li class="active">Registro</li>
        <a href="iniciarSesion.php"><li >Iniciar Sesion</li></a>
    </ul>
</div>




<div>
    <img  src="../recurso/imagen/usuarioRegistro.php"/>
    <form>
        <input class="form-control" type="text" id="nombreCompleto" placeholder="Nombre completo"/>
        <input class="form-control" type="text" id="nombreUsuario" placeholder="Nombre usuario"/>
        <input class="form-control" type="password" id="contrasena" placeholder="Contraseña"/>
        <input class="btn btn-info" type="button" onclick='registrarUsuario()' value="GUARDAR"/>
    </form>

    <div class="respuesta">

    </div>
</div>

