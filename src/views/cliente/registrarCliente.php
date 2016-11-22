<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="cliente/registrar" method="post">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>DNI</label>
                            <input required type="number" class="form-control" name="txtDniCliente"
                                   placeholder="Digita la identifiacion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input required type="text" class="form-control" name="txtNombreCliente"
                                   placeholder="Digita el nombre">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Apellido</label>
                            <input required type="text" class="form-control" name="txtApellidoCliente"
                                   placeholder="Digita el apellido">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo</label>
                            <input required type="email" class="form-control" name="txtCorreoCliente"
                                   id="exampleInputEmail1"
                                   placeholder="Digita el correo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Digita la contraseña">
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input required type="text" class="form-control pull-right"
                                       name="txtFechaNacimientoCliente" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Celular:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input required type="text" class="form-control"
                                       name="txtTelefonoCliente"
                                       class="phone_us">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
    </div>
</div>
