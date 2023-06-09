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
          <h1>Modificar sección servicios <small>Edita el formulario para cambiar el contenido</small></h1>
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

          $sql = "SELECT * FROM seccion_servicios WHERE id_sec_servicios = $id";
          $resultado = $con->query($sql);
          $servicios = $resultado->fetch_assoc();
          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-servicios.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="seccion">Sección</label>
                  <input type="text" class="form-control" name="seccion" id="seccion" placeholder="Sección"
                    value="<?php echo $servicios['seccion'];?>" maxlength="45">
                </div>
                <div class="form-group">
                  <label for="titulo">Título</label>
                    <textarea name="titulo" id="titulo" class="form-control" placeholder="Título" cols="30" rows="2" maxlength="100"><?php echo $servicios['titulo'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="subtitulo">Subtítulo</label>                  
                  <textarea name="subtitulo" id="subtitulo" class="form-control" placeholder="Subtítulo" cols="30" rows="2" maxlength="200"><?php echo $servicios['subtitulo'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="boton_text">Texto del botón</label>
                  <input type="text" class="form-control" name="boton_text" id="boton_text"
                    placeholder="Texto que va dentro del botón" value="<?php echo $servicios['boton_text'];?>" maxlength="30">
                </div>
                <div class="form-group">
                  <label for="archivo">Archivo</label>
                  <input type="text" class="form-control" name="archivo" id="archivo"
                    placeholder="Dirección url a la que redirigira" value="<?php echo $servicios['url_archivo'];?>" maxlength="100" readonly="">
                </div>
                <div class="form-group">
                  <label for="fondo_actual">Archivo Actual</label>
                  <br>
                  <img src="img/banner/<?php echo $servicios['url_archivo'];?>" alt="" width="200">
                </div>


                <div class="form-group">
                  <label for="customFile">Solo Imagenes</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen" lang="es" accept="image/*">
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Actualiza el archivo aquí</p>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $servicios['id_sec_servicios'];?>">
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