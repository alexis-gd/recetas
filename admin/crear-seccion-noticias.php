<?php
// include_once 'funciones/conexion.php';
include_once 'funciones/sesiones.php';
include_once 'templates/header1.php';
include_once 'templates/header2_5.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<?php
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
          <h1>Crear Noticia <small>llena el formulario para crear una Noticia</small></h1>
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
            <h3 class="card-title">Crear Noticia</h3>
          </div>
          <div class="card-body">
            <!-- form start -->
            <form method="POST" action="funciones/modelo-noticias.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <input type="hidden" name="autor" value="<?php echo $_SESSION['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="titulo">Título de la noticia</label>
                  <input type="text" class="form-control" name="titulo" id="titulo"
                    placeholder="Nombre corto máx. 255 caracteres" maxlength="255" required>
                </div>
                <div class="form-group">
                  <label for="subtitulo">SubTítulo de la noticia</label>
                  <input type="text" class="form-control" name="subtitulo" id="subtitulo"
                    placeholder="Subtitulo máx. 500 caracteres" maxlength="500" required>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción o contenido</label>
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="8"
                    placeholder="Descripción máx. 1000 caracteres" maxlength="1000"></textarea>
                </div>  
                <div class="form-group">
                  <label for="customFile">Imagen</label>

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen" required>
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
include_once 'templates/footer7.php';
?>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
  <script>
    var simplemde = new SimpleMDE({ 
      element: document.getElementById("descripcion") 
    });
  </script>

</body>

</html>