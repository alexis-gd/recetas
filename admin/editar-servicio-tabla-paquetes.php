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
          <h1>Editar Tabla de Paquetes <small>llena el formulario para editar la tabla de paquetes</small></h1>
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
            <h3 class="card-title">Editar Tabla</h3>
          </div>

          <div class="card-body">
            <?php
          $sql = "SELECT * FROM lista_servicios_tabla_paquetes WHERE id_lista_servicio = $id";
          $resultado = $con->query($sql);
          $lista_servicios = $resultado->fetch_assoc();

          ?>

            <!-- form start -->
            <form method="POST" action="funciones/modelo-servicio-tabla-paquetes.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label>
                  <br>
                  <!-- <img src="img/seccion_servicios/<?php echo $lista_servicios['url_imagen'];?>" alt="" width="200"> -->
                  <?php if($lista_servicios['url_imagen'] != ""){ ?>
                    <!-- <div class="tabla-paquetes"> -->
                      <img src="img/seccion_servicios/tabla_paquetes/<?php echo $lista_servicios['url_imagen'];?>" alt="tabla de paquetes" class="w-100">
                    <!-- </div> -->
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
                
                <!-- /.card-body -->

                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $lista_servicios['id_lista_servicio_tabla_paquetes'];?>">
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