<div class="col-md-12">
    <!-- general form elements -->
    <form role="form" action="abogado/registrar" method="post">
        <div class="nav-tabs-custom">
            <!--
            <ul id="ml-tah" class="nav nav-tabs">
                <li class="active" id="tab-abogado">
                    <a href="#Abogado" data-toggle="tab" id="temp" aria-expanded="true">Abogado</a>
                </li>
                <li class="" id="tab-especialidad">
                    <a href="#Especializacion" data-toggle="tab" aria-expanded="false">EspecializaciÃ³n</a>
                </li>
            </ul>

            
               -->

        

    
    <!-- /.box -->


  <!-- Nav tabs -->
  <ul id="ml-tah" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#abogado" aria-controls="home" role="tab" data-toggle="tab">Abogado</a></li>
    <li role="presentation"  id="tab_especialidad"><a href="#especializacion" aria-controls="profile" role="tab" data-toggle="tab">Especializacion</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
          
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input required type="number" class="form-control" name="txtDniAbogado"
                                           placeholder="Digita tu identifiacion">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required type="text" class="form-control" name="txtNombreAbogado"
                                           placeholder="Digita el nombre">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input required type="text" class="form-control" name="txtApellidoAbogado"
                                           placeholder="Digita el apellido">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Correo</label>
                                    <input required type="email" class="form-control" name="txtCorreoAbogado"
                                           id="exampleInputEmail1"
                                           placeholder="Digita el correo">
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">ContraseÃ±a</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           placeholder="Digita la contraseÃ±a">
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
                                               name="txtFechaNacimientoAbogado" id="datepicker">
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
                                               name="txtTelefonoAbogado"
                                               class="phone_us">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Almamater</label>
                                    <input required type="text" class="form-control"
                                           placeholder="Universidad de pregrado" name="txtAlmamaterAbogado">
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="#id_especializacion" class="btn btn-primary" data-toggle="tab" aria-expanded="true"
                           id="ctrl-tabs">Continuar</a>
                    </div>
      </div> 
      
      
      
      <div role="tabpanel" class="tab-pane" id="profile">
          <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre de la especializaciÃ³n</label>
                                    <input required type="text" placeholder="Nombre de la especializacion hecha."
                                           class="form-control" name="txtEspecialidadAbogado">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de entrega del acta:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required type="text" class="form-control pull-right"
                                               name="txtFechaActaAbogado" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Universidad/Instituto</label>
                            <input required type="text" class="form-control"
                                   placeholder="Universidad/Instituto de la especializaciÃ³n."
                                   name="txtUniversidadActaAbogado">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Subir Acta</label>
                            <input required type="file" id="exampleInputFile">

                            <p class="help-block">Sube una copia de tu acta.</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
      </div>
  </div>
    </div>
  </form>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        console.log("dffd");
        //$(".tabs").tabs();
        $("#Especializacion").tab("show");
        console.log("defd");
    });

</script>
