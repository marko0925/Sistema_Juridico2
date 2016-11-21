/**
 * Created by miguel on 16/11/2016.
 */

/**
 * @param url
 * @param etiqueta
 */
function abrirVista(url) {

    $.get(url, function () {
        console.log('envio solicitud')
    })
    //inicia el proceso de lectura o descarga
        .done(function (data) {
            insertHtml('.content', data);
        })
        .fail(function () {

        })
        //termina todos los proceso de $.get
        //sirve para cargar js a las etiquetas agregadas dinamicamente
        .always(function () {


        });
}
// agregar codigo javascript en ejecucion
function insertHtml(id, html) {
    var ele = document.querySelector(id);
    ele.innerHTML = html;

    var codes = ele.getElementsByTagName("script");
    for (var i = 0; i < codes.length; i++) {
        eval(codes[i].text);
    }
}
/**
 * We load the html content of registrar abogado
 */
$("#registrarAbogado").on("click", function () {
    $(".content-header").html("<h1>Registro de Abogado</h1>");
    abrirVista("abogado/registrarAbogado");
});
/**
 * we list the lawyers registered
 */
$("#listarAbogado").on("click",function () {
   $(".content-header").html("<h1>Abogados Registrados</h1>");
    abrirVista("abogado/listarAbogados");
});

$("listarProcesos").on("click",function () {
    $(".content-header").html("<h1>Procesos Existentes</h1>");
    abrirVista("proceso/listadoProcesos");
});

/**
 * formulario de registrar cliente
 */
$("#registrarCliente").on("click",function () {
    alert("xD");
    $(".content-header").html("<h1>Registrar Cliente</h1>");
    abrirVista("cliente/registrarCliente");
});

/**
 * formulario de listar clientes
 */
$("#listarCliente").on("click",function () {
    $(".content-header").html("<h1>Clientes registrados</h1>");
    abrirVista("cliente/listarClientes");
});

/**
 * Controla los form de registrar abogado (Registro informacion y registro de especialidad)
 */
$("#ctrl-tabs").on("click",function () {
    $("#tab-abogado").removeClass("active");
    $("#tab-especialidad").addClass("active");
});