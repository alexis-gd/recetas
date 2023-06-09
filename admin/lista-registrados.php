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
          <h1>Listado de Personas Registradas</h1>
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
              <h3 class="card-title">Maneja los visitantes registrados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Artículos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                          try {
                            $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados";
                            $sql .= " JOIN regalos";
                            $sql .= " ON registrados.regalo = regalos.ID_regalo";
                            
                            $resultado = $con->query($sql);                            
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                          }
                          // $categoria = $resultado->fetch_assoc();
                          while ($registrado = $resultado->fetch_assoc()) {?>
                  <tr>
                    <td><?php echo $registrado['nombre_registrado'] ." " . $registrado['apellido_registrado'];
                    $pagado = $registrado['pagado'];
                    if ($pagado) {
                      echo '<span class="badge bg-green">Pagado</span>';
                    }else{
                      echo '<span class="badge bg-red">No Pagado</span>';
                    }
                    ?>
                    </td>
                    <td><?php echo $registrado['email_registrado'];?></td>
                    <td><?php echo $registrado['fecha_registro'];?></td>
                    <td>
                      <?php 
                                    $articulos = json_decode($registrado['pases_articulos'], true);
                                    $arreglo_articulos = array(
                                        'un_dia' => 'Pase 1 día',
                                        'pase_2dias' => 'Pase 2 días',
                                        'pase_completo' => 'Pase 3 días',
                                        'camisas' => 'Camisas',
                                        'etiquetas' => 'Etiquetas'
                                    );
                                    foreach($articulos as $llave => $articulo) {
                    
                                       if(array_key_exists('cantidad', $articulo)) {
                                          
                                         echo $articulo['cantidad'] . " " .  $arreglo_articulos[$llave] . "<br>";
                                       } else {
                                        echo $articulo . " " .  $arreglo_articulos[$llave] . "<br>";
                                       }
                                    }
                                ?>
                    </td>
                    <td>
                      <?php 
                                    $eventos_resultado = $registrado['talleres_registrados'];
                                    $talleres = json_decode( $eventos_resultado, true);
                               
                                    $talleres = implode("', '", $talleres['eventos']);
                                   

                                    $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE evento_id IN  ('$talleres') OR clave IN ('$talleres')  " ;
                                    // echo $sql_talleres;
                                    $resultado_talleres =  $con->query($sql_talleres);
                                    
                                    
                                    
                                    while($eventos = $resultado_talleres->fetch_assoc()){
                                          echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>";
                                    }
                                ?>
                    </td>
                    <td><?php echo $registrado['nombre_regalo'];?></td>
                    <td><?php echo $registrado['total_pagado'];?></td>
                    <td><a href="editar-categoria.php?id=<?php echo $registrado['ID_Registrado'];?>"
                        class="btn bg-lightblue margin">
                        <i class="fas fa-pen text-white"></i>
                      </a>
                      <a href="" data-id="<?php echo $registrado['ID_Registrado'];?>" data-tipo="categoria"
                        class="btn bg-danger margin borrar_registro">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>

                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Artículos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Compra</th>
                    <th>Acciones</th>
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