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
          <h1>Listado de Clientes Sector</h1>
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
              <h3 class="card-title">Administra la lista de sectores y su información aquí</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-condensed table-sm table-striped" data-order='[[ 1, "asc" ]]'>
                <thead>
                  <tr>
                    <th>Acciones</th>
                    <th>Id</th>
                    <th>Sector</th>
                    <th>Visible</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {
                            $sql = "SELECT * FROM lista_clientes_sector";
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          // $categoria = $resultado->fetch_assoc();
                          while ($lista_clientes_sector = $resultado->fetch_assoc()) {?>
                  <tr>                    
                    <td><a href="editar-seccion-clientes-sector.php?id=<?php echo $lista_clientes_sector['id_lista_cliente_sector'];?>"
                        class="btn bg-lightblue btn-sm margin">
                        <i class="fas fa-pen text-white"></i>
                      </a>
                    </td>
                    <td><?php echo $lista_clientes_sector['id_lista_cliente_sector'];?></td>
                    <td><?php echo $lista_clientes_sector['sector'];?></td>
                    <td><?php echo $lista_clientes_sector['band_eliminar']? "Si" : "No";?></td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Acciones</th>
                    <th>Id</th>
                    <th>Sector</th>
                    <th>Visible</th>
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