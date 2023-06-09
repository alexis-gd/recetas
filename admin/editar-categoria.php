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
          <h1>Editar Categorías de Eventos <small>llena el formulario para editar una categoría</small></h1>
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
            <h3 class="card-title">Editar Categorías</h3>
          </div>
          <div class="card-body">
            <?php
          $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id";
          $resultado = $con->query($sql);
          $categoria = $resultado->fetch_assoc();
          // echo "<pre>";
          // var_dump($categoria);
          // echo "</pre>";
          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-categoria.php" name="guardar-registro" id="guardar-registro">
              <div class="card-body">
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria"
                    placeholder="Categoría" value="<?php echo $categoria['cat_evento'];?>">
                </div>
                <div class="form-group">
                  <label for="">Icono</label>
                  <div class="input-group-prepend">
                    <div class="input-group-addon input-group-text">
                      <!-- <i class="fa fa-address-book"></i> -->
                    </div>
                    <input type="text" name="icono" id="icono" class="form-control col-11" placeholder="fa-icon"
                      value="<?php echo $categoria['icono'];?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id;?>">
                  <button type="submit" class="btn btn-primary" id="crear_registro">Agregar</button>
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