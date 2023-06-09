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
          <h1>Modificar servicios <small>selecciona el servicio para editar un servicio</small></h1>
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
            <h3 class="card-title">Modificar Servicio</h3>
          </div>
          <div class="card-body">
            <!-- form start -->
            <form method="POST" action="funciones/modelo-servicios-pag.php" name="guardar-registro"
              id="guardar-registro">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Servicios</label>
                  <select name="servicio" class="custom-select">
                    <option value="">Selecciona un servicio</option>
                    <?php
                      try {
                        $sql = "SELECT id_lista_servicio, nombre_servicio FROM lista_servicios";
                        $resultado = $conexion->query($sql);
                        while($lista_servicio = $resultado->fetch_assoc()){ 
                    ?>

                    <option value="<?php echo $lista_servicio['id_lista_servicio']; ?>">
                      <?php echo $lista_servicio['nombre_servicio']; ?>
                    </option>

                    <?php }
                      } catch (Exception $e) {
                        echo "Error: ".$e->getMessage();
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre"
                    placeholder="Nombre máx. 100 caracteres" maxlength="100" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password"
                    placeholder="Password máx. 60 caracteres" autocomplete="off" maxlength="60">
                </div>
                <div class="form-group">
                  <label for="repetir_password">Repetir Password</label>
                  <input type="password" class="form-control" name="repetir_password" id="repetir_password"
                    placeholder="Password máx. 60 caracteres" autocomplete="off">
                  <span id="resultado_password" class=""></span>
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