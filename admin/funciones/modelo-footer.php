<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php'; 
    $con = conectar();   
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion']; 
    $direccion_url = $_POST['direccion_url']; 
    $telefono = $_POST['telefono'];
    $whats_titulo = $_POST['whats_titulo'];
    $whats_msj = $_POST['whats_msj'];
    $whats_num = $_POST['whats_num'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];    
    $id_registro = $_POST['id_registro'];
    
  // Actualizar footer
if ($_POST['registro'] == 'actualizar') {
  try {


    $stmt = $con->prepare('UPDATE seccion_footer SET correo = ?, direccion = ?, direccion_url = ?, telefono = ?, whats_titulo = ?, whats_msj = ?, whats_num = ?, twitter = ?, facebook = ?, instagram = ?, linkedin = ?, editado = NOW() WHERE id_sec_footer = ?');
    $stmt->bind_param("sssssssssssi", $correo, $direccion, $direccion_url, $telefono, $whats_titulo, $whats_msj, $whats_num, $twitter, $facebook, $instagram, $linkedin, $id_registro);
    
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
?>