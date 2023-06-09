<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';    
    $con = conectar();
    $titulo = $_POST['titulo_evento'];
    $fecha = $_POST['fecha_evento'];
    $hora = $_POST['hora_evento'];
    $categoria_id = $_POST['categoria_evento'];
    $invitado_id = $_POST['invitado'];
    $id_registro = $_POST['id_registro'];
    
  // Crear nuevo evento
if ($_POST['registro'] == 'nuevo') {
  
  try {
    $stmt = $con->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssii", $titulo, $fecha, $hora, $categoria_id, $invitado_id );
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array (
        'respuesta' => 'exito',
        'id_insertado' => $id_insertado
      );
      
    }else{
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
  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
 // die(json_encode($_POST));
  try {
    $stmt= $con->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ?, editado = NOW() WHERE evento_id = ? ');
    $stmt->bind_param('sssiii', $titulo, $fecha, $hora, $categoria_id, $invitado_id, $id_registro);
    $stmt->execute();
    if ($stmt->affected_rows) {
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
  // Eliminar admin
if ($_POST['registro'] == 'eliminar') {
  //  die(json_encode($_POST));
   
  $id_borrar = $_POST['id'];
  try {
    $stmt = $con->prepare('DELETE FROM eventos WHERE evento_id = ?');
    $stmt->bind_param('i', $id_borrar);
    $stmt->execute();
    if ($stmt->affected_rows) {
      $respuesta = array(
        'respuesta' => 'exito',
        'id_eliminado' => $id_borrar
      );
    }else {
      $respuesta = array(
        'respuesta' => 'error'        
      );
    }
  } catch (Exception $e) {
    $respuesta = array(
      'respuesta' => $e->getMessage()        
    );
  }

  die(json_encode($respuesta)); 
}
?>