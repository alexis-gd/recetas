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
          <h1>Editar Miembro <small>llena el formulario para editar un miembro del equipo</small></h1>
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
            <h3 class="card-title">Editar Miembro</h3>
          </div>

          <div class="card-body">
            <?php
          $sql = "SELECT * FROM lista_servicios_equipo WHERE id_lista_servicio_equipo = $id";
          $resultado = $con->query($sql);
          $lista_servicios = $resultado->fetch_assoc();

          ?>

            <!-- form start -->
            <form method="POST" action="funciones/modelo-servicio-equipo.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre"
                    placeholder="Nombre del Miembro" value="<?php echo $lista_servicios['nombre'];?>" maxlength="30">
                </div>
                <div class="form-group">
                  <label for="puesto">Puesto</label>
                  <input type="text" class="form-control" name="puesto" id="puesto" placeholder="Puesto del Miembro"
                    value="<?php echo $lista_servicios['puesto'];?>">
                </div>
                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label>
                  <br>
                  <!-- <img src="img/seccion_servicios/<?php echo $lista_servicios['url_imagen'];?>" alt="" width="200"> -->
                  <?php if($lista_servicios['url_imagen'] != ""){ ?>
                      <img src="img/seccion_servicios/equipo/<?php echo $lista_servicios['url_imagen'];?>" alt="" width="150">
                    <?php }else{ ?>
                      <img src="img/default.svg" alt="" width="150">
                    <?php } ?>
                </div>

                <div class="form-group">
                  <label for="customFile">Imagen</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Actualiza la imagen aquí</p>
                  </div>
                </div>

                <?php
                  if ($lista_servicios['band_eliminar'] == 1) {
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
                  <input type="hidden" name="id_registro" value="<?php echo $lista_servicios['id_lista_servicio_equipo'];?>">
                  <button type="submit" class="btn btn-primary" id="crear_registro">Guardar</button>
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