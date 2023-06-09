<?php
session_start();
if (isset($_GET['cerrar_sesion'])) {
  session_destroy();
}
// else{
//   echo "esta vacio";
// }
// $cerrar_sesion = $_GET['cerrar_sesion'];
// if ($cerrar_sesion) {
//   session_destroy();
// }
include_once 'funciones/conexion.php';
$con = conectar();
include_once 'templates/header1.php';
include_once 'templates/header2.php';

?>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../"><img class="sombra-logo" src="../assets/multimedia/logos/gbp-blue.svg" width="180" alt="" /></a>
      <!-- <p>TuProyecto</p> -->
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Acceso al panel de administración</p>

        <form method="POST" action="funciones/login-admin.php" name="login-admin" id="login-admin">
          <div class="input-group mb-3">
            <input type="text" name="usuario" class="form-control" placeholder="Usuario" autofocus="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" autocomplete="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-5">
              <input type="hidden" name="login-admin" value="1">
              <button type="submit" class="btn btn-login btn-block">Iniciar Sesión</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <?php
include_once 'templates/footer5.php';
?>

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
  <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->

  <?php
include_once 'templates/footer6.php';
?>