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
    <?php
          $sql_ls = "SELECT id_lista_servicio, nombre_servicio FROM lista_servicios WHERE id_lista_servicio = $id AND band_eliminar = 1";
          $resultado_ls = $con->query($sql_ls);    
          $ls = $resultado_ls->fetch_assoc();

          $sql_lss = "SELECT * FROM lista_servicios_servicios WHERE id_lista_servicio = $id AND band_eliminar = 1";
          $resultado_lss = $con->query($sql_lss);         
          ?>

    <input type="hidden" name="id_servicio" id="id_servicio" value="<?php echo $id; ?>">
    <input type="hidden" name="nombre_servicio" id="nombre_servicio" value="<?php echo $ls['nombre_servicio']; ?>">
    <div class="row">
      <div class="col-md-8">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Las listas a continuación pertenecen al siguiente servicio:</h3>
            <br>
            <h2><?php echo $ls['nombre_servicio']; ?></h2>
          </div>
          <div class="card-body">
            <!-- form start -->
            <div class="card-body">

              <div class="form-group">
                <div id="box_servicio_general" class="mb-1">
                  <label for="titulo" class="mb-0">Servicio General</label>
                  <button type="button" class="btn btn-primary ml-2 p-1" id="btn_modal_add1" data-toggle="modal"
                    data-target="#modal_add1">Agregar</button>
                  <button type="button" class="btn btn-success ml-2 p-1" id="btn_modal_es1_2" data-toggle="modal"
                    data-target="#modal_es1_2" disabled>Editar</button>
                </div>
                <select name="titulo" id="titulo" class="custom-select">
                  <option value="">Selecciona un Servicio General para editar</option>
                  <?php while ($lss = $resultado_lss->fetch_assoc()) { ?>
                  <option value="<?php echo $lss['id_lista_servicio_servicio']; ?>"><?php echo $lss['nivel_1']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>

              <form method="POST" action="funciones/modelo-servicio-servicio.php" name="guardar-registro" id="guardar-registro-archivo" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="icono_actual">Icono Actual</label>
                  <br>
                  <img src="img/default.svg" id="img_icono" alt="" width="150">
                </div>
                <div class="form-group mb-4">                  
                  <div class="mb-1">
                    <label for="customFile">Cambiar Icono</label>
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" id="id_icono">
                    <button type="submit" class="btn btn-primary ml-2 p-1" id="guardar_icono" disabled>Guardar</button>
                    <button type="button" class="btn btn-danger ml-2 py-1 px-3" id="borrar_icono" disabled><i class="fas fa-trash-alt"></i></button>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen" required>
                    <label class="custom-file-label" for="customFile" data-browse="Elegir">Seleccionar Archivo</label>
                    <p>Actualiza el icono aquí</p>
                  </div>
                </div>
              </form>

              <hr>              
              <div class="form-group">
                <div id="box_servicio_general2" class="mb-1">
                  <label for="servicio">Servicio</label>
                  <button type="button" class="btn btn-primary ml-2 p-1" id="btn_modal_add2" data-toggle="modal"
                    data-target="#modal_add2" disabled>Agregar</button>
                  <button type="button" class="btn btn-success ml-2 p-1" id="btn_modal_es2_2" data-toggle="modal"
                    data-target="#modal_es2_2" disabled>Editar</button>
                </div>
                <select name="servicio" id="servicio" class="custom-select" disabled>
                  <option value=""><i>Selecciona primero un Servicio General</i></option>
                </select>
              </div>

              <div class="form-group">
                <div id="box_servicio_general3" class="mb-1">
                  <label for="subservicio">SubServicio</label>
                  <button type="button" class="btn btn-primary ml-2 p-1" id="btn_modal_add3" data-toggle="modal"
                    data-target="#modal_add3" disabled>Agregar</button>
                  <button type="button" class="btn btn-success ml-2 p-1" id="btn_modal_es3_2" data-toggle="modal"
                    data-target="#modal_es3_2" disabled>Editar</button>
                </div>
                <select name="subservicio" id="subservicio" class="custom-select" disabled>
                  <option value="">Selecciona primero un Servicio</option>
                </select>
              </div>

              <div class="form-group">
                <div id="box_servicio_general4" class="mb-1">
                  <label for="num_boton">Opción de SubServicio</label>
                  <button type="button" class="btn btn-primary ml-2 p-1" id="btn_modal_add4" data-toggle="modal"
                    data-target="#modal_add4" disabled>Agregar</button>
                  <button type="button" class="btn btn-success ml-2 p-1" id="btn_modal_es4_2" data-toggle="modal"
                    data-target="#modal_es4_2" disabled>Editar</button>
                </div>
                <select name="op_subservicio" id="op_subservicio" class="custom-select" disabled>
                  <option value="">Selecciona primero un SubServicio</option>
                </select>
              </div>

              <!-- /.card-body -->
              <!-- <div class="">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $banner['id_lista_servicio_header'];?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<?php
    include_once 'templates/modals/modal-agregar-servicio-1.php';
    include_once 'templates/modals/modal-agregar-servicio-2.php';
    include_once 'templates/modals/modal-agregar-servicio-3.php';
    include_once 'templates/modals/modal-agregar-servicio-4.php';
    include_once 'templates/modals/modal-editar-servicio-1.php';
    include_once 'templates/modals/modal-editar-servicio-2.php';
    include_once 'templates/modals/modal-editar-servicio-3.php';
    include_once 'templates/modals/modal-editar-servicio-4.php';
?>
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
<script src="js/editar_ss.js"></script>
</body>

</html>