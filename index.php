<?php
session_start();
session_destroy();
header("Location:vista/usuario/iniciarSesion.php");

?>
