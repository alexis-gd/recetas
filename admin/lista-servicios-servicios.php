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
          <h1>Apartado de la sección de servicios</h1>
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
              <h3 class="card-title">Administra las opciones de la sección servicios aquí</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>Editar Servicios</th>
                    <th>Editar Paquetes</th>
                    <th>Editar Tabla Paquetes</th>
                    <!-- <th>Editar Footer</th> -->
                    <th>Id</th>
                    <th>Titulo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {
                            $sql = "SELECT * FROM lista_servicios_header WHERE band_eliminar = 1 ";
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          while ($seccion1 = $resultado->fetch_assoc()) {?>
                  <tr>
                    <td><a href="editar-servicio-servicio.php?id=<?php echo $seccion1['id_lista_servicio'];?>"
                        class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a> </td>
                    <td><a href="lista-servicios-equipo.php?id=<?php echo $seccion1['id_lista_servicio'];?>"
                        class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a> </td>
                    <td><a href="editar-servicio-tabla-paquetes.php?id=<?php echo $seccion1['id_lista_servicio'];?>"
                        class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a> </td>
                    <!-- <td><a href="editar-servicio-servicio.php?id=<?php // echo $seccion1['id_lista_servicio'];?>"
                        class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a> </td> -->
                    <td><?php echo $seccion1['id_lista_servicio'];?></td>
                    <td><?php echo $seccion1['titulo'];?></td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Editar Servicios</th>
                    <th>Editar Equipo</th>
                    <th>Editar Tabla Paquetes</th>
                    <!-- <th>Editar Footer</th> -->
                    <th>Id</th>
                    <th>Titulo</th>
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