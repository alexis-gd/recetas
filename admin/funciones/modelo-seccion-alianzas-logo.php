<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';        
    $con = conectar();
    $seo = $_POST['seo'];
    $url_cliente = $_POST['url_cliente'];
    $check_visible = $_POST['check_visible'] ? 1 : 0;
    $id_registro = $_POST['id_registro'];

  // Crear nuevo evento

if ($_POST['registro'] == 'nuevo') {
  // $respuesta = array(
  //   'post' => $_POST,
  //   'file' => $_FILES
  // );
  //  die(json_encode($respuesta));

    $directorio = "../img/seccion_alianzas_logos/";
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
    $stmt = $con->prepare("INSERT INTO lista_alianzas_logos (seo, url_logo) VALUES (?,?)");
    $stmt->bind_param("ss", $seo, $imagen_url );
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
  // die(json_encode($_POST));
    $directorio = "../img/seccion_alianzas_logos/";
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
      $stmt= $con->prepare('UPDATE lista_alianzas_logos SET seo = ?, url_logo = ?, url_cliente = ?, band_eliminar = ?, editado = NOW() WHERE id_lista_alianzas_logo = ? ');
      $stmt->bind_param('ssssi', $seo, $imagen_url, $url_cliente, $check_visible, $id_registro);      
    }else{
      // Sin imagen
      $stmt= $con->prepare('UPDATE lista_alianzas_logos SET seo = ?, url_cliente = ?, band_eliminar = ?, editado = NOW() WHERE id_lista_alianzas_logo = ? ');
      $stmt->bind_param('sssi', $seo, $url_cliente, $check_visible, $id_registro);      
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

  // Eliminar admin
if ($_POST['registro'] == 'eliminar') {
  //  die(json_encode($_POST));  
  $id_borrar = $_POST['id'];
  try {
    $stmt = $con->prepare('DELETE FROM lista_alianzas_logos WHERE id_lista_alianzas_logo = ?');
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