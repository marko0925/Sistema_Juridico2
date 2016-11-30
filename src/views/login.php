<!DOCTYPE html>
<!-- saved from url=(0033)http://localhost/disgap/index.php -->
<html lang="es" xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">




<title>OficinaVirtual - BoxMedia</title>
         <!-- ESTILO-->
  <script src="./plugins/animate/jquery.js"></script>
  <script src="./plugins/animate/index.js"></script>
  <link rel="stylesheet prefetch" href="./plugins/animate/animate.min.css">
  <link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700">
  <link rel="stylesheet" href="./plugins/animate/style.css" media="screen" type="text/css">
</head>

<body>
    <div class="form animated flipInX" >
      <h2 style="text-align: center"><img src="./dist/img/logo_ingsistemas.png" width="133" height="105"  alt=""></h2>
      <h2 style="text-align: center">SISJUR</h2><h4 style="text-align: center">Sistema Jusridico de la Universidad Francisco de Paula Santander</h4><p></p>
      <div id="wrapper">


          <div id="content-login">

            <form action="#" enctype="multipart/form-data" method="post">
                <label>
                    <input placeholder="Usuario" name="usuario" type="text" required>
                </label>
            	<label>
                    <input placeholder="Contraseña" name="contrasena" type="password" required>
                </label>
                <input type="submit" value="Entrar">
            </form>
          <div >
          	<span style="text-align: center">
            	<?php if(isset($mens))echo $mens; ?>
            </span>
          </div>
      </div>
    </div>




</body></html>
