<div class="box">
    <div class="box-header">
        <h3 class="box-title">Abogados</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">


            <div class="col-sm-12">

                <table id="lista-abogados" class="table table-bordered table-striped dataTable" role="grid"
                       aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                            style="width: 177px;">DNI
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nombre
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending" style="width: 205px;">
                            Apellido
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending" style="width: 152px;">
                            Correo
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Telefono
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Fecha
                            Nacimiento
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">
                            Almamater
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                            style="width: 210px;">Actualizar
                        </th>
                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>

            <!--<div class="row">
                 <div class="col-sm-5">
                     <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of
                         57 entries
                     </div>
                 </div>
                 <div class="col-sm-7">
                     <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                         <ul class="pagination">
                             <li class="paginate_button previous disabled" id="example1_previous"><a href="#"
                                                                                                     aria-controls="example1"
                                                                                                     data-dt-idx="0"
                                                                                                     tabindex="0">Previous</a>
                             </li>
                             <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1"
                                                                   tabindex="0">1</a></li>
                             <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2"
                                                             tabindex="0">2</a></li>
                             <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3"
                                                             tabindex="0">3</a></li>
                             <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4"
                                                             tabindex="0">4</a></li>
                             <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5"
                                                             tabindex="0">5</a></li>
                             <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6"
                                                             tabindex="0">6</a></li>
                             <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1"
                                                                                    data-dt-idx="7" tabindex="0">Next</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>-->
        </div>
    </div>
    <!-- /.box-body -->
</div>

<script>
    $(document).ready(function () {
        var tabla = $("#lista-abogados").DataTable({
            ajax: "abogado/listarAbogados",
            columns: [{data: "dni"}, {data: "nombre"}, {data: "apellido"}, {data: "fechaNacimiento"}, {data: "telefono"}, {data: "email"}, {data: "almamater"}, {
                data: null,
                className: "center",
                defaultContent: '<button id="modAbogado" class="btn btn-primary btn-sm" >Modificar</button> &nbsp; <button  class="btn btn-danger btn-sm" >Eliminar</button>'
            }, {data: "especialidad", visible: false}]
        });

        $('#lista-abogados tbody').on('click', '.btn-primary', function () {
            var data = tabla.row($(this).parents('tr')).data();
            $(".content-header").html("<h1>Actualizar Abogado</h1>");
            $.get("abogado/formularioRegistrarAbogado", function () {
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
                    $("input[name=txtDniAbogado]").add("disabled", "disabled");
                    $("input[name=txtDniAbogado]").val(data.dni);
                    $("input[name=txtNombreAbogado]").val(data.nombre);
                    $("input[name=txtApellidoAbogado]").val(data.apellido);
                    $("input[name=txtCorreoAbogado]").val(data.email);
                    $("input[name=txtPassAbogado").val();
                    $("input[name=txtFechaNacimientoAbogado]").val(data.fechaNacimiento);
                    $("input[name=txtTelefonoAbogado]").val(data.telefono);
                    $("input[name=txtAlmamaterAbogado]").val(data.almamater);
                    var t = $("#tabla-especialidades").DataTable().rows().data();
                    console.log(t[0][1]);
                    for (var i = 0; i < t.length; i++) {
                        t.row.add([t[i][0], t[i][1], t[i][2], t[i][3]]).draw();
                    }
                });

        });

    });

</script>