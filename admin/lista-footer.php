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
          <h1>Apartado del pie de página</h1>
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
              <h3 class="card-title">Administra las opciones de la sección pie de página aquí</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-condensed table-sm table-striped" data-order='[[ 1, "asc" ]]'>
                <thead>
                  <tr>
                    <th>Editar</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Dirección Url</th>
                    <th>Teléfono</th>
                    <th>Título de WhatsApp</th>
                    <th>Mensaje de WhatsApp</th>
                    <th>Número de WhatsApp</th>
                    <th>Twitter Url</th>
                    <th>Facebook Url</th>
                    <th>Instagram Url</th>
                    <th>Linkedin Url</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {                            
                            $sql = "SELECT * FROM seccion_footer";
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          // $admin = $resultado->fetch_assoc();
                          while ($footer = $resultado->fetch_assoc()) {?>
                  <tr>
                    <td><a href="editar-footer.php?id=<?php echo $footer['id_sec_footer'];?>" class="btn bg-lightblue margin"> <i class="fas fa-pen text-white"></i> </a></td>
                    <td><?php echo $footer['correo'];?></td>
                    <td><?php echo $footer['direccion'];?></td>
                    <td><?php echo $footer['direccion_url'];?></td>
                    <td><?php echo $footer['telefono'];?></td>
                    <td><?php echo $footer['whats_titulo'];?></td>
                    <td><?php echo $footer['whats_msj'];?></td>
                    <td><?php echo $footer['whats_num'];?></td>
                    <td><?php echo $footer['twitter'];?></td>
                    <td><?php echo $footer['facebook'];?></td>
                    <td><?php echo $footer['instagram'];?></td>
                    <td><?php echo $footer['linkedin'];?></td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Editar</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Dirección Url</th>
                    <th>Teléfono</th>
                    <th>Título de WhatsApp</th>
                    <th>Mensaje de WhatsApp</th>
                    <th>Número de WhatsApp</th>
                    <th>Twitter Url</th>
                    <th>Facebook Url</th>
                    <th>Instagram Url</th>
                    <th>Linkedin Url</th>
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