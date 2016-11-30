
<aside class="main-sidebar ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php
        if(isset($_SESSION['cuenta']['rol'])){
          $tipo=$_SESSION['cuenta']['rol'];
        ?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?=$_SESSION['cuenta']['nombre']?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <?php if($tipo!='cliente') {?>

            <li class="treeview">
                <a href="#">

                    <i class="fa fa-gavel"></i> <span>Procesos</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                  <?php if($tipo=="abogado"){?>
                    <li class="active"><a href="#" id="registrarProceso"><i class="fa fa-circle-o"></i>Registrar</a></li>
                    <?php }?>
                    <li><a href="#" id="listarProcesos"><i class="fa fa-circle-o"></i> Listar</a></li>
                    <?php if($tipo=="abogado"){?>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Observaciones</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Citas</a></li>
                    <?php }?>
                </ul>
            </li>
            <?php }
            if($tipo=="administrador"){
            ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-graduation-cap"></i>
                    <span>Abogados</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" id="registrarAbogado"><i class="fa fa-circle-o"></i> Registrar</a></li>
                    <li><a href="#" id="listarAbogado"><i class="fa fa-circle-o"></i> Listar</a></li>

                </ul>
            </li>
            <?php }
            if($tipo!="cliente"){
            ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Clientes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" id="listarCliente"><i class="fa fa-circle-o"></i> Listar</a></li>
                    <li><a href="#" id="registrarCliente"><i class="fa fa-circle-o"></i> Regitrar</a></li>
                </ul>
            </li>
            <?php }else{?>
              <li><a href="#" id="actualizarPerfil"><i class="fa fa-circle-o"></i> Actualizar Perfil</a></li>
              <li><a href="#" id="avancesProceso"><i class="fa fa-circle-o"></i> Avances de Proceso</a></li>
              <?php }?>
        </ul>
        <?php
        }
        ?>
    </section>
    <!-- /.sidebar -->
</aside>
