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
          <h1>Modificar el pie de página <small>Edita el formulario para cambiar el contenido</small></h1>
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
            <h3 class="card-title">Modificar contenido</h3>
          </div>
          <div class="card-body">
            <?php            
          $sql = "SELECT * FROM seccion_footer WHERE id_sec_footer = $id";
          $resultado = $con->query($sql);
          $admin = $resultado->fetch_assoc();
          // echo "<pre>";
          // var_dump($admin);
          // echo "</pre>";
          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-footer.php" name="guardar-registro" id="guardar-registro">
              <div class="card-body">
                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo"
                    value="<?php echo $admin['correo'];?>" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección"
                    value="<?php echo $admin['direccion'];?>" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="direccion_url">Dirección Url</label>
                  <input type="text" class="form-control" name="direccion_url" id="direccion_url" placeholder="Dirección Url"
                    value="<?php echo $admin['direccion_url'];?>" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono"
                    value="<?php echo $admin['telefono'];?>" maxlength="10">
                </div>
                <div class="form-group">
                  <label for="whats_titulo">Titulo de WhatsApp</label>
                  <input type="text" class="form-control" name="whats_titulo" id="whats_titulo"
                    placeholder="Escribe el mensaje de contacto" value="<?php echo $admin['whats_titulo'];?>" maxlength="30">
                </div>
                <div class="form-group">
                  <label for="whats_msj">Mensaje de WhatsApp</label>
                  <input type="text" class="form-control" name="whats_msj" id="whats_msj"
                    placeholder="Escribe el mensaje de contacto" value="<?php echo $admin['whats_msj'];?>" maxlength="80">
                </div>
                <div class="form-group">
                  <label for="whats_num">Número de WhatsApp</label>
                  <input type="text" class="form-control" name="whats_num" id="whats_num"
                    placeholder="Número de whatsapp" value="<?php echo $admin['whats_num'];?>" maxlength="10">
                </div>
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Url de Twitter"
                    value="<?php echo $admin['twitter'];?>" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Url de Facebook"
                    value="<?php echo $admin['facebook'];?>" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Url de Instagram"
                    value="<?php echo $admin['instagram'];?>" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="linkedin">Linkedin</label>
                  <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Url de Linkedin"
                    value="<?php echo $admin['linkedin'];?>" maxlength="100">
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