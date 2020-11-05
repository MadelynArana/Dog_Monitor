$(document).ready(function () {
    mascotaListar();

});
function genericoPost(url, datos, mensaje) {
    $.ajax({
        type: "POST",
        url: url,
        data: datos,
        success: function (respuesta) {
            $(mensaje).html(respuesta);
        }
    });
}
function mascota(opcion) {
    let ruta = "../../controlador/MascotaCtr.php?operacion=";
    let nombre = $('#nombreMascota').val(), edad = $('#edadMascota').val(), codigo = $('#codigoMonitor').val(), peso = $('#pesoMascota').val(), foto = $('#fotoMascota').val(), raza = $("#raza").val(), codigoMascota = $('#codigoMascota').val();
    if (opcion == 'REGISTRO') {
        url = ruta + "registro";
    } else if (opcion == 'ELIMINAR') {
        url = ruta + "eliminar";
    }
    datos = "&nombre=" + nombre + "&edad=" + edad + "&codigo=" + codigo + "&peso=" + peso + "&foto=" + foto + "&raza=" + raza + "&codigoMascota=" + codigoMascota + "";
    mensaje = ".respuestaformMascota";
    genericoPost(url, datos, mensaje);
}



function mascotaEliminar(codigo) {
    url = "../../controlador/MascotaCtr.php?operacion=eliminar";
    datos = "&codigoMascota=" + codigo;
    mensaje = "";
    genericoPost(url, datos, mensaje);
    mascotaListar();
}

function mascotaListar() {
    url = "../../controlador/MascotaCtr.php?operacion=listar",
            datos = '';
    mensaje = "#listarMascotas";
    genericoPost(url, datos, mensaje);
}
function limpiar() {
    $("#formMascota")[0].reset();
}

function ingresoUsuario() {
    let usuario = $("#txtUsuario").val(), contrasena = $("#txtContrasena").val();
    url = "../../controlador/UsuarioCtr.php?operacion=ingresar";
    datos = "&usuario=" + usuario + "&contrasena=" + contrasena;
    mensaje = ".mensaje";
    genericoPost(url, datos, mensaje);
}

 