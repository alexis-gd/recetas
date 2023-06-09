<?php
include_once 'funciones/conexion.php';
$conexion = conectar();
include_once 'funciones/sesiones.php';
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
          <h1>Apartado de la sección principal</h1>
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
            <h3 class="card-title">Administra las opciones de la sección principal aquí</h3>
          </div>
          <div class="card-body">
            <!-- form start -->
            <form method="POST" action="funciones/modelo-servicios-header.php" name="guardar-registro"
              id="guardar-registro">
              <div class="card-body">
                <?php
                $sql = "SELECT * FROM seccion_banner WHERE id_sec_banner = $id";
                $resultado = $con->query($sql);
                $banner = $resultado->fetch_assoc();
              ?>
                <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" class="form-control" name="titulo" id="titulo"
                    placeholder="Titulo máx. 25 caracteres" maxlength="25">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control" name="descripcion" id="descripcion"
                    placeholder="Descripción máx. 255 caracteres" maxlength="255">
                </div>
                <div class="form-group">
                  <label for="txt_boton">Texto del botón</label>
                  <input type="text" class="form-control" name="txt_boton" id="txt_boton"
                    placeholder="Texto máx. 25 caracteres" maxlength="25">
                </div>
                <div class="form-group">
                  <label for="txt_boton">Número de WhatsApp</label>
                  <input type="text" class="form-control" name="txt_boton" id="txt_boton"
                    placeholder="Número máx. 10 caracteres" maxlength="10">
                </div>
                <div class="form-group">
                  <label for="msj_boton">Mensaje de WhatsApp</label>
                  <input type="text" class="form-control" name="msj_boton" id="msj_boton"
                    placeholder="Mensaje máx. 500 caracteres" maxlength="500">
                </div>
                <div class="form-group">
                  <label for="banner_actual">Banner Actual</label>
                  <br>
                  <img src="img/banner/<?php echo $banner['img_banner_url'];?>" alt="" width="200">
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
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary" id="crear_registro_admin">Agregar</button>
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