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
                            style="width: 177px;">Radicado
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending" style="width: 224px;">Cliente
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending" style="width: 205px;">
                            Descripción
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending" style="width: 152px;">
                            Estado
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="width: 110px;">Acciones
                        </th>

                    </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>

<script>

    var tableP = $("#table-procesos").DataTable({
        ajax: "proceso/listarProcesos",
        columns: [
            {data: "_id_caso", visible: false},
            {data: "_dni"},
            {data: "_radicado"},
            {data: "_descripcion"},
            {data: "_fecha_fin"}
        ]
    });


</script>
