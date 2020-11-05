<?php
if ($_SESSION["autentica"] != "SIP") {
    header("Location: ../usuario/iniciarSesion.php");
    exit();
}

