<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
$con = conectar();
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
        <div class="col-sm-6">
          <h1>Apartado de la sección principal</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Administra las opciones de la sección principal aquí</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>Editar</th>
                    <th>Titúlo</th>
                    <th>Descripción</th>
                    <th>Texto del botón</th>
                    <th>Número de WhatsApp</th>
                    <th>Mensaje de WhatsApp</th>
                    <th>Imagen del banner</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {
                            $sql = "SELECT * FROM lista_servicios_header";
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          while ($seccion1 = $resultado->fetch_assoc()) {?>
                  <tr>
                    <td><a href="editar-servicio-header.php?id=<?php echo $seccion1['id_lista_servicio_header'];?>"
                        class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a> </td>
                    <td><?php echo $seccion1['titulo'];?></td>
                    <td><?php echo $seccion1['descripcion'];?></td>
                    <td><?php echo $seccion1['txt_boton'];?></td>
                    <td><?php echo $seccion1['num_boton'];?></td>
                    <td><?php echo $seccion1['msj_boton'];?></td>
                    <td><img src="img/servicios/header/<?php echo $seccion1['url_imagen'];?>" alt="" width="150"></td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Editar</th>
                    <th>Titúlo</th>
                    <th>Descripción</th>
                    <th>Texto del botón</th>
                    <th>Número de WhatsApp</th>
                    <th>Mensaje de WhatsApp</th>
                    <th>Imagen del banner</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
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