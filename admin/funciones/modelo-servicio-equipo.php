<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';       
    $con = conectar(); 
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto'];
    $check_visible = $_POST['check_visible'] ? 1 : 0;
    $id_registro = $_POST['id_registro'];
    

  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
 //  die(json_encode($_POST));

    $directorio = "../img/seccion_servicios/equipo/";
    // si el directorio(carpeta) no existe lo creamos
    if (!is_dir($directorio)) {
      mkdir($directorio, 0755, true);
    }

    $ext = $_FILES['archivo_imagen']['type']; // nombre temporal del archivo = ruta temporal
    $ext = strpbrk($ext, '/'); // obtenemos todo despues de --> /
    $ext = substr($ext, 1);     // quitamos --> /    
    $imagen_url = $id_registro . "_equipo_img." . $ext;

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
    if ($_FILES['archivo_imagen']['size'] > 0) {
      // Con imagen
      $stmt= $con->prepare('UPDATE lista_servicios_equipo SET url_imagen = ?, nombre = ?, puesto = ?, band_eliminar = ?, editado = NOW() WHERE id_lista_servicio_equipo = ? ');
      $stmt->bind_param('ssssi', $imagen_url, $nombre, $puesto, $check_visible, $id_registro);      
    }else{
      // Sin imagen
      $stmt= $con->prepare('UPDATE lista_servicios_equipo SET nombre = ?, puesto = ?, band_eliminar = ?, editado = NOW() WHERE id_lista_servicio_equipo = ? ');
      $stmt->bind_param('sssi', $nombre, $puesto, $check_visible, $id_registro);     
    }
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