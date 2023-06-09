<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';   
    $con = conectar(); 
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $nivel = $_POST['nivel'];
    $password = $_POST['password'];
    // if (isset($_POST['id_registro'])) {
      $id_registro = $_POST['id_registro'];
    // }
    
  // Crear nuevo admin
if ($_POST['registro'] == 'nuevo') {
  
  try {
    $stmt = $con->prepare("INSERT INTO admins (usuario, nombre, password, nivel) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $usuario, $nombre, $password, $nivel);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if ($id_registro > 0) {
      $respuesta = array (
        'respuesta' => 'exito',
        'id_admin' => $id_registro
      );
      
    }else{
      $respuesta = array(
        'respuesta' => 'error'
      );
    }
    $stmt->close();
    $con->close();
  } catch (Exception $e) {
    echo "Error: ". $e->getMessage;
  }
  die(json_encode($respuesta)); 
}
  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
  try {

    if (empty($_POST['password'])) {
      $stmt = $con->prepare('UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?');
      $stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
    }else{
      $stmt = $con->prepare('UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ?');
      $stmt->bind_param("sssi", $usuario, $nombre, $password, $id_registro);
    }
    $stmt->execute();
    if($stmt->affected_rows){
      $respuesta = array(
        'respuesta' => 'exito',
        'id_actualizado' => $stmt->insert_id
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
  $id_borrar = $_POST['id'];

  try {
    $stmt = $con->prepare('DELETE FROM admins WHERE id_admin = ?');
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