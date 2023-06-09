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
              <table id="registros" class="table table-bordered table-condensed table-sm table-striped" data-order='[[ 1, "asc" ]]'>
                <thead>
                  <tr>
                    <th>Editar</th>
                    <th>Título</th>
                    <th>Texto del botón</th>
                    <th>Url del botón</th>
                    <th>Imagen del banner</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {
                            $sql = "SELECT * FROM seccion_banner";
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          while ($seccion1 = $resultado->fetch_assoc()) {?>
                  <tr>
                    <td><a href="editar-banner.php?id=<?php echo $seccion1['id_sec_banner'];?>" class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a> </td>
                    <td><?php echo $seccion1['titulo'];?></td>
                    <td><?php echo $seccion1['boton_text'];?></td>
                    <td><?php echo $seccion1['boton_link'];?></td>
                    <td><img src="img/banner/<?php echo $seccion1['img_banner_url'];?>" alt="" width="150"></td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Editar</th>
                    <th>Título</th>
                    <th>Texto del botón</th>
                    <th>Url del botón</th>
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