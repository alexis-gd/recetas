<?php
include_once 'funciones/conexion.php';
$con = conectar();
include_once 'funciones/sesiones.php';
include_once 'templates/header1.php';
$id = $_GET['id'];

if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("Error");
}
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
          <h1>Editar Sector <small>llena el formulario para editar un sector</small></h1>
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
            <h3 class="card-title">Editar Sector</h3>
          </div>

          <div class="card-body">
            <?php
          $sql = "SELECT * FROM lista_clientes_sector WHERE id_lista_cliente_sector = $id ";
          $resultado = $con->query($sql);
          $lista_clientes_sector = $resultado->fetch_assoc();
          // echo "<pre>";
          // var_dump($lista_clientes_sector);
          // echo "</pre>";

          ?>

            <!-- form start -->
            <form method="POST" action="funciones/modelo-seccion-clientes.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="sector">Sector</label>
                  <input type="text" class="form-control" name="sector" id="sector"
                    placeholder="Sector" value="<?php echo $lista_clientes_sector['sector'];?>" maxlength="30">
                </div>
                <?php
                  if ($lista_clientes_sector['band_eliminar'] == 1) {
                    $data_switch = true;
                    $status_switch = "checked";
                  }else{
                    $data_switch = false;
                    $status_switch = "";
                  }
                ?>                
                <div class="card-body px-0">
                  <label for="" class="pr-2">Visible</label>
                  <input type="checkbox" id="check_visible" name="check_visible" data-switch-value="<?php echo $data_switch; ?>" <?php echo $status_switch; ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Si" data-off-text="No">
                </div>
                
                <!-- /.card-body -->

                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $lista_clientes_sector['id_lista_cliente_sector'];?>">
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
include_once 'templates/footer7.php';
?>
<script src="js/bootstrap-switch.min.js"></script>
<script>
        $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
</script>
</body>

</html>