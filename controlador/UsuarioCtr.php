<?php

session_start();

include_once(__DIR__ . '/../core/Mensaje.php');
include_once(__DIR__ . '/../core/Configuracion.php');
include_once(__DIR__ . '/../modelo/Usuario.php');


$usuario = new Usuario();

$usuario->setCodigo($codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '');
$usuario->setUsuario(isset($_POST['usuario']) ? $_POST['usuario'] : '');
$usuario->setContrasena($contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '');
$usuario->setNombre($nombre = isset($_POST['nombreCompleto']) ? $_POST['nombreCompleto'] : '');
$usuario->setTipo('U');






if (isset($_GET[OPERACION])) {
    $operacion = $_GET[OPERACION];
    if ($operacion == REGISTRAR) {
        $respuesta = $usuario->ejecutar($usuario, 'C');

        echo $respuesta ? EXITO_REGISTRO : ERROR_REGISTRO;
    }

    if ($operacion == INGRESAR) {
        $respuesta = $usuario->ingresar($usuario);
        if ($respuesta == 1) {
            $_SESSION["autentica"] = "SIP";
            $_SESSION["USUARIO"] = $usuario->getUsuario();
            $perfil = $usuario->buscarUsuario($usuario->getUsuario());
            $_SESSION["CODIGO_USUARIO"] = $perfil->getCodigo();
            echo"<script>window.location.href='usuarioPerfil.php'; </script>";
        } else {
            echo ERROR_USUARIO;
        }
    }
} else {
    echo SIN_SELECCION;
}

    