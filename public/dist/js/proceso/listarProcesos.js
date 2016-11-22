/**
 * Created by McBro on 22/11/2016.
 */

$("listarProcesos").on("click",function () {
    $(".content-header").html("<h1>Procesos Existentes</h1>");
    abrirVista("proceso/listadoProcesos");
});

