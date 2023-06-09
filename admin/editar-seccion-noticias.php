<?php
include_once 'funciones/conexion.php';
$con = conectar();
include_once 'funciones/sesiones.php';
include_once 'templates/header1.php';
$id = $_GET['id'];

if (!filter_var($id, FILTER_VALIDATE_INT)) {
  die("Error");
}
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
          <h1>Editar Noticias <small>llena el formulario para editar una noticia</small></h1>
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
            <h3 class="card-title">Editar Noticia</h3>
          </div>

          <div class="card-body">
            <?php
          $sql = "SELECT * FROM lista_noticias WHERE id_noticia = $id";
          $resultado = $con->query($sql);
          $lista_noticias = $resultado->fetch_assoc();

          ?>

            <!-- form start -->
            <form method="POST" action="funciones/modelo-noticias.php" name="guardar-registro"
              id="guardar-registro-archivo" enctype="multipart/form-data">
              <input type="hidden" name="editor" value="<?php echo $_SESSION['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="titulo">Titulo</label>
                  <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nombre corto máx. 255 caracteres" 
                  maxlength="255" value="<?php echo $lista_noticias['titulo'];?>" required>
                </div>
                <div class="form-group">
                  <label for="subtitulo">Descripción</label>
                  <input type="text" class="form-control" name="subtitulo" id="subtitulo" placeholder="Subtitulo máx. 500 caracteres" 
                  maxlength="500" value="<?php echo $lista_noticias['subtitulo'];?>" required>
                </div>
                <div class="form-group">
                  <label for="descripcion">Página</label>
                  <!-- <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción máx. 1000 caracteres" 
                  maxlength="1000" value="<?php echo $lista_noticias['descripcion'];?>" required> -->
                  <textarea class="form-control" name="descripcion" id="descripcion" rows="8"
                    placeholder="Descripción máx. 1000 caracteres" maxlength="1000" required><?php echo $lista_noticias['descripcion'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label>
                  <br>
                  <img src="img/noticias/<?php echo $lista_noticias['url_imagen'];?>" alt="" width="200">
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
                  if ($lista_noticias['band_eliminar'] == 1) {
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
                  <input type="hidden" name="id_registro" value="<?php echo $lista_noticias['id_noticia'];?>">
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
      element: document.getElementById("descripcion"),
      spellChecker: false,
      forceSync: true,
      toolbar: false,
	    toolbarTips: true,
      // toolbar: ["bold", "italic", "strikethrough", "heading", "heading-smaller", "heading-bigger", "heading-1", "heading-2", "heading-3", "|", "code", "quote", "unordered-list", "ordered-list", "clean-block", "link", "image", "table", "horizontal-rule", "preview", "side-by-side", "fullscreen", "guide"],
      toolbar: ["bold", "italic", "strikethrough", "heading-1", "heading-2", "heading-3", "|", "unordered-list", "ordered-list", "link", "table", "horizontal-rule", "|", "preview", "side-by-side", "fullscreen", "guide"],
    });
  </script>
<script src="js/bootstrap-switch.min.js"></script>
<script>
        $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
</script>
</body>

</html>