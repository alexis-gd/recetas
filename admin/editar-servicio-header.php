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
          <h1>Modificar sección principal <small>Edita el formulario para cambiar el contenido</small></h1>
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

          $sql = "SELECT * FROM lista_servicios_header WHERE id_lista_servicio_header = $id";
          $resultado = $con->query($sql);
          $banner = $resultado->fetch_assoc();
          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-servicio-header.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="text" class="form-control" name="titulo" id="titulo"
                    placeholder="Titulo máx. 25 caracteres" maxlength="25" value="<?php echo $banner['titulo'];?>">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea name="descripcion" id="descripcion" class="form-control"
                    placeholder="Descripción máx. 255 caracteres" cols="30" rows="3"
                    maxlength="255"><?php echo $banner['descripcion'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="txt_boton">Texto del botón</label>
                  <input type="text" class="form-control" name="txt_boton" id="txt_boton"
                    placeholder="Texto máx. 25 caracteres" maxlength="25" value="<?php echo $banner['txt_boton'];?>">
                </div>
                <div class="form-group">
                  <label for="num_boton">Número de WhatsApp</label>
                  <input type="text" class="form-control" name="num_boton" id="num_boton"
                    placeholder="Número máx. 10 caracteres" maxlength="10" value="<?php echo $banner['num_boton'];?>">
                </div>
                <div class="form-group">
                  <label for="msj_boton">Mensaje de WhatsApp</label>
                  <input type="text" class="form-control" name="msj_boton" id="msj_boton"
                    placeholder="Mensaje máx. 500 caracteres" maxlength="500"
                    value="<?php echo $banner['msj_boton'];?>">
                </div>
                <div class="form-group">
                  <label for="banner_actual">Banner Actual</label>
                  <br>
                  <img src="img/servicios/header/<?php echo $banner['url_imagen'];?>" alt="" width="200">
                </div>


                <div class="form-group">
                  <label for="customFile">Imagen</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Actualiza el banner aquí</p>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $banner['id_lista_servicio_header'];?>">
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