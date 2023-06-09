<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';    
    $con = conectar();    
    $nombre_categoria = $_POST['nombre_categoria'];
    $icono = $_POST['icono'];
    $id_registro = $_POST['id_registro'];
    
  // Crear nuevo evento
if ($_POST['registro'] == 'nuevo') {
  //  die(json_encode($_POST));
  try {
    $stmt = $con->prepare("INSERT INTO categoria_evento (cat_evento, icono) VALUES (?,?)");
    $stmt->bind_param("ss", $nombre_categoria, $icono);
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
 //  die(json_encode($_POST));
  try {
    $stmt= $con->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ? ');
    $stmt->bind_param('ssi', $nombre_categoria, $icono, $id_registro);
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
    $stmt = $con->prepare('DELETE FROM categoria_evento WHERE id_categoria = ?');
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