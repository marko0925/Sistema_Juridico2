/**
 * formulario de registrar cliente
 */
$("#registrarCliente").on("click",function () {
    alert("xD");
    $(".content-header").html("<h1>Registrar Cliente</h1>");
    abrirVista("cliente/formularioRegistrarCliente");
});
/**
 * Created by McBro on 22/11/2016.
 */

function RCliente() {
    var dni = $("input[name=txtDniCliente]").val();
    var nombre = $("input[name=txtNombreCliente]").val();
    var apellido = $("input[name=txtApellidoCliente]").val();
    var correo = $("input[name=txtCorreoCliente]").val();
    var clave = $("input[name=txtPassCliente]").val();
    var fechaNac = $("input[name=txtFechaNacimientoCliente]").val();
    var telefono = $("input[name=txtTelefonoCliente]").val();
    $.ajax({
        type: "POST",
        url: "cliente/registrar",
        data: {dni: dni, nombre: nombre, apellido: apellido, correo: correo, clave: clave,fechaNac : fechaNac,telefono : telefono},
        success: function (data) {
            alert(data);
        },
        error : function (err) {
            alert("¡Ups! Algo ha ido mal.");
        }
    });
}