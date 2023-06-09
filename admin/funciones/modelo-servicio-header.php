<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //no notifica los warning
    include_once 'conexion.php';       
    $con = conectar(); 
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $txt_boton = $_POST['txt_boton'];
    $num_boton = $_POST['num_boton'];
    $msj_boton = $_POST['msj_boton'];
    $id_registro = $_POST['id_registro'];
    

  // Actualizar admin
if ($_POST['registro'] == 'actualizar') {
 //  die(json_encode($_POST));

    $directorio = "../img/servicios/header/";
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
      $stmt= $con->prepare('UPDATE lista_servicios_header SET titulo = ?, descripcion = ?, txt_boton = ?, num_boton = ?, msj_boton = ?, url_imagen = ?, editado = NOW() WHERE id_lista_servicio_header = ? ');
      $stmt->bind_param('ssssssi', $titulo, $descripcion, $txt_boton, $num_boton, $msj_boton, $imagen_url, $id_registro);      
    }else{
      // Sin imagen
      $stmt= $con->prepare('UPDATE lista_servicios_header SET titulo = ?, descripcion = ?, txt_boton = ?, num_boton = ?, msj_boton = ?, editado = NOW() WHERE id_lista_servicio_header = ? ');
      $stmt->bind_param('sssssi', $titulo, $descripcion, $txt_boton, $num_boton, $msj_boton, $id_registro);    
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