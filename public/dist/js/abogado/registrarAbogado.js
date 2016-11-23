/**
 * Created by McBro on 22/11/2016.
 */
/**
 * We load the html content of registrar abogado
 */
$("#registrarAbogado").on("click", function () {
    $(".content-header").html("<h1>Registro de Abogado</h1>");
    abrirVista("abogado/registrarAbogado");
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
function anadirEspec(){
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


    // Automatically add a first row of data
}

function RAbogado() {
    var dni = $("input[name=txtDniAbogado]").val();
    var nombre = $("input[name=txtNombreAbogado]").val();
    var apellido = $("input[name=txtApellidoAbogado]").val();
    var correo = $("input[name=txtCorreoAbogado]").val();
    var clave = $("input[name=txtPassAbogado]").val();
    console.log(clave);
    var fechaNac = $("input[name=txtFechaNacimientoAbogado]").val();
    var telefono = $("input[name=txtTelefonoAbogado]").val();
    var alma = $("input[name=txtAlmamaterAbogado]").val();
    var especialidades = $("#tabla-especialidades").dataTable().fnGetData();
    console.log(especialidades);
}
