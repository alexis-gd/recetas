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
          <h1>Listado de Usuarios</h1>
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
              <h3 class="card-title">Maneja los usuarios en esta sección</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Acciones</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {
                            $sql = "SELECT * FROM admins";
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          // $admin = $resultado->fetch_assoc();
                          while ($admin = $resultado->fetch_assoc()) {?>
                  <tr>
                    <td><a href="editar-admin.php?id=<?php echo $admin['id_admin'];?>" class="btn bg-lightblue margin">
                        <i class="fas fa-pen text-white"></i>
                      </a>
                      <a href="" data-id="<?php echo $admin['id_admin'];?>" data-tipo="admin"
                        class="btn bg-danger margin borrar_registro">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                    <td><?php echo $admin['usuario'];?></td>
                    <td><?php echo $admin['nombre'];?></td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Acciones</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
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