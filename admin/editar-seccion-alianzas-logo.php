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
          <h1>Editar Logos <small>llena el formulario para editar un Logo</small></h1>
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
            <h3 class="card-title">Editar Logos</h3>
          </div>

          <div class="card-body">
            <?php
          $sql = "SELECT * FROM lista_alianzas_logos WHERE id_lista_alianzas_logo = $id";
          $resultado = $con->query($sql);
          $lista_alianzas_logos = $resultado->fetch_assoc();
          // echo "<pre>";
          // var_dump($lista_alianzas_logos);
          // echo "</pre>";

          ?>

            <!-- form start -->
            <form method="POST" action="funciones/modelo-seccion-alianzas-logo.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                                
                <div class="form-group">
                  <label for="seo">Nombre[SEO]</label>
                  <input type="text" class="form-control" name="seo" id="seo"
                    placeholder="SEO" value="<?php echo $lista_alianzas_logos['seo'];?>" maxlength="50" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="url_cliente">URL cliente</label>
                  <input type="text" class="form-control" name="url_cliente" id="url_cliente"
                    placeholder="https://grupogbp.mx/" value="<?php echo $lista_alianzas_logos['url_cliente'];?>" maxlength="100" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label>
                  <br>
                  <img src="img/seccion_alianzas_logos/<?php echo $lista_alianzas_logos['url_logo'];?>" alt="" width="200">
                </div>

                <div class="form-group">
                  <label for="customFile">Imagen</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Actualiza la imagen del curso aquí</p>
                  </div>
                </div>

                <?php
                  if ($lista_alianzas_logos['band_eliminar'] == 1) {
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
                  <input type="hidden" name="id_registro" value="<?php echo $lista_alianzas_logos['id_lista_alianzas_logo'];?>">
                  <button type="submit" class="btn btn-primary" id="crear_registro">Guardar cambios</button>
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