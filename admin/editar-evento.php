<?php
$id = $_GET['id'];
if (!filter_var($id, FILTER_VALIDATE_INT)): 
die("Error");
else:
include_once 'funciones/conexion.php';
$con = conectar();
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
          <h1>Editar Evento <small>llena el formulario para editar un evento</small></h1>
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
            <h3 class="card-title">Editar Evento</h3>
          </div>
          <div class="card-body">
            <?php
                    $sql = "SELECT * FROM eventos WHERE evento_id = $id";
                    $resultado = $con->query($sql);
                    $evento = $resultado->fetch_assoc();

          ?>
            <!-- form start -->
            <form method="POST" action="funciones/modelo-evento.php" name="guardar-registro" id="guardar-registro">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Titulo Evento</label>
                  <input type="text" class="form-control" name="titulo_evento" id="titulo_evento"
                    value="<?php echo $evento['nombre_evento'];?>">
                </div>
                <div class="form-group">
                  <label>Categoría</label>
                  <select name="categoria_evento" class="custom-select">
                    <option value="0">- Seleccione -</option>
                    <?php
                  try {
                    $categoria_actual = $evento['id_cat_evento'];
                    $sql = "SELECT * FROM categoria_evento";
                    $resultado = $con->query($sql);
                    while($cat_evento = $resultado->fetch_assoc()) {
                    if($cat_evento['id_categoria'] == $categoria_actual) {?>

                    <option value="<?php echo $cat_evento['id_categoria']; ?>" selected>
                      <?php echo $cat_evento['cat_evento']; ?>
                    </option>
                    <?php } else { ?>
                    <option value="<?php echo $cat_evento['id_categoria']; ?>">
                      <?php echo $cat_evento['cat_evento']; ?>
                    </option>
                    <?php }
                    }
                  } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                  }
                  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Fecha Evento:</label>
                  <input type="date" class="form-control" name="fecha_evento"
                    value="<?php echo $evento['fecha_evento']; ?>" />
                </div>
                <div class="form-group">
                  <label for="hora">Hora</label>
                  <input type="time" class="form-control" name="hora_evento" id="hora"
                    value="<?php echo $evento['hora_evento']; ?>">
                </div>

                <div class="form-group">
                  <label>Invitado o Ponente:</label>
                  <select name="invitado" class="custom-select">
                    <option value="0">- Seleccione -</option>
                    <?php
                  try {
                    $invitado_actual = $evento['id_inv'];
                    $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM seccion_servicios";
                    $resultado = $con->query($sql);
                      while($seccion_servicios = $resultado->fetch_assoc()){ 
                        if($seccion_servicios['invitado_id'] == $invitado_actual) {?>

                    <option value="<?php echo $seccion_servicios['invitado_id']; ?>" selected>
                      <?php echo $seccion_servicios['nombre_invitado'] . " " . $seccion_servicios['apellido_invitado']; ?>
                    </option>
                    <?php } else{ ?>
                    <option value="<?php echo $seccion_servicios['invitado_id']; ?>">
                      <?php echo $seccion_servicios['nombre_invitado'] . " " . $seccion_servicios['apellido_invitado']; ?>
                    </option>
                    <?php } // fin del if
                      } // fin del while
                  } catch (Exception $e) {
                    echo "Error: ".$e->getMessage();
                  }
                  ?>
                  </select>
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
                endif;
?>