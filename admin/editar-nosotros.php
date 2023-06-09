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
          <h1>Modificar sección nosotros <small>Edita el formulario para cambiar el contenido</small></h1>
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

          $sql = "SELECT * FROM seccion_nosotros WHERE id_sec_nosotros = $id";
          $resultado = $con->query($sql);
          $banner_nosotros = $resultado->fetch_assoc();
          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-banner-nosotros.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="seccion">Sección</label>
                  <input type="text" class="form-control" name="seccion" id="seccion" placeholder="Título"
                    value="<?php echo $banner_nosotros['seccion'];?>" maxlength="45">
                </div>
                <div class="form-group">
                  <label for="titulo">Título</label>
                  <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título"
                    value="<?php echo $banner_nosotros['titulo'];?>" maxlength="50">
                </div>
                <div class="form-group">
                  <label for="subtitulo">Subtítulo</label>                  
                  <textarea name="subtitulo" id="subtitulo" class="form-control" placeholder="Subtítulo" cols="30" rows="6" maxlength="200"><?php echo $banner_nosotros['subtitulo'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="boton_text">Texto del botón</label>
                  <input type="text" class="form-control" name="boton_text" id="boton_text"
                    placeholder="Texto que va dentro del botón" value="<?php echo $banner_nosotros['boton_text'];?>" maxlength="30">
                </div>
                <div class="form-group">
                  <label for="boton_link">Url del botón</label>
                  <input type="text" class="form-control" name="boton_link" id="boton_link"
                    placeholder="Dirección url a la que redirigira" value="<?php echo $banner_nosotros['boton_link'];?>" maxlength="100">
                </div>
                <div class="form-group">
                  <label for="fondo_actual">Fondo Actual</label>
                  <br>
                  <img src="img/banner/<?php echo $banner_nosotros['img_bg_url'];?>" alt="" width="200">
                </div>


                <div class="form-group pb-4">
                  <label for="customFile">Imagen</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen" accept=".jpg, .jpeg, .png, .mp4">
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Actualiza el fondo aquí</p>
                    <span><b><i>*Solo se permiten formatos (.png .jpg .jpeg .mp4)</i></b></span>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $banner_nosotros['id_sec_nosotros'];?>">
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