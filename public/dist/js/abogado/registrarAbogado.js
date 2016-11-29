/**
 * Created by McBro on 22/11/2016.
 */
/**
 * We load the html content of registrar abogado
 */
$("#registrarAbogado").on("click", function () {
    $("#contenido-cabecera").html("<h1>Registro de Abogado</h1>");
    abrirVista("abogado/formularioRegistrarAbogado");
});


/**
 * Controla los form de registrar abogado (Registro informacion y registro de especialidad)
 */
$("#ctrl-tabs").on("click", function () {
    $("#tab-abogado").removeClass("active");
    $("#tab-especialidad").addClass("active");
});
/**
 * Se encarga de añadir especializacion a la tabla
 */
function anadirEspec() {
    var nombre = $("input[name=txtEspecialidadAbogado]").val();
    var fecha = $("input[name=txtFechaActaAbogado]").val();
    var universidad = $("input[name= txtUniversidadActaAbogado]").val();
    var acta = $("input[name=acta]").val();
    console.log(nombre);
    var t = $('#tabla-especialidades').DataTable();
    t.row.add([
        nombre,
        fecha,
        universidad,
        acta
    ]).draw();


}
function tomarInfo() {
    var dni = $("input[name=txtDniAbogado]").val();
    var nombre = $("input[name=txtNombreAbogado]").val();
    var apellido = $("input[name=txtApellidoAbogado]").val();
    var correo = $("input[name=txtCorreoAbogado]").val();
    var clave = $("input[name=txtPassAbogado]").val();
    var fechaNac = $("input[name=txtFechaNacimientoAbogado]").val();
    var telefono = $("input[name=txtTelefonoAbogado]").val();
    var alma = $("input[name=txtAlmamaterAbogado]").val();
    var especialidades = $("#tabla-especialidades").dataTable().fnGetData();
    especialidades = JSON.stringify(especialidades);
    return {
        dni: dni,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        clave: clave,
        fechaNac: fechaNac,
        telefono: telefono,
        almamater: alma,
        especialidades: especialidades
    };
}
function actualizarA() {

    var info = tomarInfo();
    $.ajax({
        type: "POST",
        url: "abogado/actualizar",
        data: info,
        success:  function(){
            $("#msj").html('<div class="alert alert-success alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
                '<h4><i class="icon fa fa-check"></i>Actualizado correctamente</h4>' +
                'Se ha actualizado con exito el abogado '+info.nombre+"." +
                '</div>');
            limpiarTextAbogado();
        },
        error:function(err){
            $("#msj").html('<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-ban"></i> ¡Ups!</h4>' +
                'Algo ha ido mal, comprueba tu conexion a internet.' +
                '</div>');
        }
    });
}
function RAbogado() {

    var info = tomarInfo();
    if (info.dni == "" || info.nombre == "" || info.apellido == "" || info.correo == "" || info.clave == "" || info.fechaNac == "" || info.telefono == "" ||
        info.almamater == "" || info.especialidades == undefined) {

    }
    $.ajax({
        type: "POST",
        url: "abogado/registrar",
        data: info,
        success: function (data) {
            $("#msj").html('<div class="alert alert-success alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' +
                '<h4><i class="icon fa fa-check"></i>Registro correctamente</h4>' +
                'Se ha registrado con exito el abogado '+info.nombre+"." +
                '</div>');
            limpiarTextAbogado();
        },
        error: function (err) {
            $("#msj").html('<div class="alert alert-danger alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-ban"></i> ¡Ups!</h4>' +
                'Algo ha ido mal, comprueba tu conexion a internet.' +
                '</div>');


        }
    });
}

function limpiarTextAbogado() {
    $("input[name=txtDniAbogado]").val("");
    $("input[name=txtNombreAbogado]").val("");
     $("input[name=txtApellidoAbogado]").val("");
     $("input[name=txtCorreoAbogado]").val("");
     $("input[name=txtPassAbogado]").val("");
     $("input[name=txtFechaNacimientoAbogado]").val("");
     $("input[name=txtTelefonoAbogado]").val("");
    $("input[name=txtAlmamaterAbogado]").val("");
    $("#tabla-especialidades").dataTable().clear().draw();
}