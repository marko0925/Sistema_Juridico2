<?php
include_once __DIR__ . "/../../model/dto/ClienteDTO.php";
?>
<div class="col-md-12">
        <div class="box box-danger">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Radicado</label>
                            <input type="text" class="form-control" name="rad"
                                   placeholder="Digita el radicado (Opcional)" value="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Clientes</label>

                                <select requerid class="form-control" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true" name="cliente">
                                    <option selected></option>
                                    <?php

                                    foreach ($listado as $clie) {
                                        //print_r($clie);
                                        echo '<option value="' . $clie->getDni() . '">' . $clie->getNombre() . '</option>';
                                        //echo "<option value='$clie->getDni()'>$clie->getNombre()</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tipo</label>
                            <input required type="text" class="form-control" name="txtTipo"
                                   placeholder="Digita el tipo de caso" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input required type="text" class="form-control pull-right"
                                       name="txtFecha" id="datepicker"
                                       value="">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre del juez:</label>
                            <input required type="text" class="form-control"
                                   placeholder="Nombre del juez del caso" name="txtJuez">
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="txtArea" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>


                </div>


            </div>
            <div class="box-footer">
                <button onclick="RProceso()" class="btn btn-primary" >Registrar</button>
            </div>
        </div>
    </form>


</div>

</div>
</div>

<!--<input type="submit" class="btn btn-lg btn-primary" value="Registrar">
</form>-->

</div>

<script type="text/javascript">

    $(document).ready(function () {
        //$(".tabs").tabs();
        //$("#Especializacion").tab("show");
    });

</script>
