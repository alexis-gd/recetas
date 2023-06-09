<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';       
    $con = conectar(); 
    $seccion = $_POST['seccion'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $boton_text = $_POST['boton_text'];
    $boton_link = $_POST['boton_link'];
    $id_registro = $_POST['id_registro'];
  
  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
 //  die(json_encode($_POST));

    $directorio = "../img/banner/";
    // si el directorio(carpeta) no existe lo creamos
    if (!is_dir($directorio)) {
      mkdir($directorio, 0755, true);
    }

    if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
      $imagen_url = $_FILES['archivo_imagen']['name'];
      $imagen_resultado = "Se subió correctamente";
    }else {
      $respuesta = array (
        'respuesta' => error_get_last()
      );
    }

  try {
    if ($_FILES['archivo_imagen']['size'] > 0) {
      // Con imagen
      $stmt= $con->prepare('UPDATE seccion_nosotros SET seccion = ?, titulo = ?, subtitulo = ?, boton_text = ?, boton_link = ?, img_bg_url = ?, editado = NOW() WHERE id_sec_nosotros = ? ');
      $stmt->bind_param('ssssssi', $seccion, $titulo, $subtitulo, $boton_text, $boton_link, $imagen_url, $id_registro);      
    }else{
      // Sin imagen
      $stmt= $con->prepare('UPDATE seccion_nosotros SET seccion = ?, titulo = ?, subtitulo = ?, boton_text = ?, boton_link = ?, editado = NOW() WHERE id_sec_nosotros = ? ');
      $stmt->bind_param('sssssi', $seccion, $titulo, $subtitulo, $boton_text, $boton_link, $id_registro);    
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