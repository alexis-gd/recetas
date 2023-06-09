<?php
// include_once 'funciones/conexion.php';
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
          <h1>Crear Servicio <small>llena el formulario para crear un servicio</small></h1>
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
            <h3 class="card-title">Crear Servicio</h3>
          </div>
          <div class="card-body">
            <!-- form start -->
            <form method="POST" action="funciones/modelo-invitado.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_invitado">Nombre del servicio</label>
                  <input type="text" class="form-control" name="nombre_invitado" id="nombre_invitado"
                    placeholder="Nombre corto máx. 30 caracteres" maxlength="30">
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="text" class="form-control" name="precio" id="precio" placeholder="149.99" maxlength="10">
                </div>
                <div class="form-group">
                  <label for="biografia_invitado">Descripción</label>
                  <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" rows="8"
                    placeholder="Descripción máx. 100 caracteres" maxlength="100"></textarea>
                </div>
                <div class="form-group">
                  <label for="customFile">Imagen</label>

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Añada la imagen del servicio aquí</p>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="">
                  <input type="hidden" name="registro" value="nuevo">
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