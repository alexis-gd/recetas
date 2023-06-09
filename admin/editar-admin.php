<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
$con = conectar();
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("Error");
}
include_once 'templates/header1.php';
include_once 'templates/header2.php';
include_once 'templates/barra3.php';
include_once 'templates/navegacion4.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1>Editar Usuarios <small>puedes editar los datos del usuario aquí</small></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-8">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Editar Usuario</h3>
          </div>
          <div class="card-body">
            <?php
          $sql = "SELECT * FROM admins WHERE id_admin = $id";
          $resultado = $con->query($sql);
          $admin = $resultado->fetch_assoc();
          // echo "<pre>";
          // var_dump($admin);
          // echo "</pre>";
          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-admin.php" name="guardar-registro" id="guardar-registro">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Usuario</label>
                  <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario"
                    value="<?php echo $admin['usuario'];?>" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                    value="<?php echo $admin['nombre'];?>" maxlength="100">
                </div>
                <!-- <div class="form-group">
                  <label for="nivel">Nivel</label>
                  <select name="nivel" id="nivel" class="custom-select" required>
                    <option value="">Selecciona una opción</option>
                    <option value="1" selected>Admin</option>
                  </select>
                </div> -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                    autocomplete="" maxlength="60">
                </div>
                <!-- /.card-body -->
                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id;?>">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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