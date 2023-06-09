<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';       
    $con = conectar(); 
    $id_registro = $_POST['id_registro'];
    

  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
 //  die(json_encode($_POST));

    $directorio = "../img/seccion_servicios/iconos/";
    // si el directorio(carpeta) no existe lo creamos
    if (!is_dir($directorio)) {
      mkdir($directorio, 0755, true);
    }

    $ext = $_FILES['archivo_imagen']['type']; // nombre temporal del archivo = ruta temporal
    $ext = strpbrk($ext, '/'); // obtenemos todo despues de --> /
    $ext = substr($ext, 1);     // quitamos --> /    
    $imagen_url = $id_registro . "_lss_icono." . $ext;

    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'],  $directorio . $imagen_url)){
    // if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
      // $imagen_url = $_FILES['archivo_imagen']['name'];
      $imagen_resultado = "Se subió correctamente";
    }else {
      $respuesta = array (
        'respuesta' => error_get_last()
      );
    }

  try {
    // Con imagen
    $stmt= $con->prepare('UPDATE lista_servicios_servicios SET icono = ?, editado = NOW() WHERE id_lista_servicio_servicio = ? ');
    $stmt->bind_param('si', $imagen_url, $id_registro);      
    
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