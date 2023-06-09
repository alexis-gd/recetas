<?php
include_once 'funciones/sesiones.php';
include_once 'templates/header1.php';
include_once 'templates/header2.php';
include_once 'templates/barra3.php';
include_once 'templates/navegacion4.php';
?>

<?php
include_once 'funciones/calculos_dashboard.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header pt-4 pb-1">
    <div class="container-fluid">
      <h1>Búzon de Contacto</h1>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container">
    <div class="table-responsive p-2">
      <table id="tablaContacto" class="table tab-hov table-bordered table-condensed table-sm table-striped"
        style="width: 100%;" data-order='[[ 0, "desc" ]]'>
        <thead class="text-center thead-dark">
          <tr>
            <th>Id</th>
            <!-- <th><i class="fas fa-check-square pr-0"></i></th> -->
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Compañia</th>
            <th>Servicio</th>
            <th>Comentarios</th>
            <th>Fecha</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once 'templates/footer_tablas.php';
?>