/**
 * Created by McBro on 16/11/2016.
 */
(function () {
    /**
     * When we click on registrarAbogado button
     */

    $("#registrarAbogado").on("click", function () {
        var formRegistryLawyer = `<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Abogado</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="txtNombreAbogado" placeholder="Digita el nombre">
                    </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="txtApellidoAbogado"  placeholder="Digita el apellido">
                 </div>
                </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Correo</label>
                          <input type="email" class="form-control" name="txtCorreoAbogado" id="exampleInputEmail1" placeholder="Digita el correo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                
                                    <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" id="datepicker">
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
                                      <input type="text" class="form-control" class="phone_us">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
              </div>
               <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">                  	    
                    <option>Texas</option>
                    <option>Washington</option>
                </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 518px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
`;
        $(".content-header").html("<h1>Registro de Abogados</h1>");
        $(".content").html(formRegistryLawyer);
    });
})();