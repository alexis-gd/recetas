<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';       
    $con = conectar(); 
    $titulo = $_POST['titulo'];
    $id_registro = $_POST['id_registro'];
  
  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
 //  die(json_encode($_POST));

  try {

      $stmt= $con->prepare('UPDATE seccion_clientes SET titulo = ?, editado = NOW() WHERE id_sec_clientes = ? ');
      $stmt->bind_param('si', $titulo, $id_registro);    

    $estado = $stmt->execute();    
    if ($estado == true) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_actualizado' => $id_registro
      );
    }else {
      $respuesta = array(
        'respuesta' => 'error'
      );
    }
    $stmt->close();
    $con->close();
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()
    );
  }
  die(json_encode($respuesta)); 
}
?>