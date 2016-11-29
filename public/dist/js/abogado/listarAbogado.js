/**
 * Created by McBro on 22/11/2016.
 */
/**
 * we list the lawyers registered
 */
$("#listarAbogado").on("click",function () {
    $("#contenido-cabecera").html("<h1>Abogados Registrados</h1>");
    abrirVista("abogado/listadoAbogados");
});
