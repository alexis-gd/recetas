<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';        
    $con = conectar();
    $sector = $_POST['sector'];
    $check_visible = $_POST['check_visible'] ? 1 : 0;
    $id_registro = $_POST['id_registro'];
  // Crear nuevo evento

if ($_POST['registro'] == 'nuevo') {

  try {
    $stmt = $con->prepare("INSERT INTO lista_clientes_sector (sector) VALUES (?)");
    $stmt->bind_param("s", $sector );
    $stmt->execute();
    $id_insertado = $stmt->insert_id;
    if ($stmt->affected_rows) {
      $respuesta = array (
        'respuesta' => 'exito',
        'id_insertado' => $id_insertado,
        'resultado_imagen' => $imagen_resultado
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
// die(json_encode($check_visible));
  try {
    $stmt= $con->prepare('UPDATE lista_clientes_sector SET sector = ?, band_eliminar = ?, editado = NOW() WHERE id_lista_cliente_sector = ? ');
    $stmt->bind_param('sii', $sector, $check_visible, $id_registro);      
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

  // Eliminar admin
if ($_POST['registro'] == 'eliminar') {
  //  die(json_encode($_POST));  
  $id_borrar = $_POST['id'];
  try {
    $stmt = $con->prepare('DELETE FROM lista_clientes_sector WHERE id_lista_cliente_sector = ?');
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