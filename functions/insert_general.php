<?php
  include '../admin/funciones/conexion.php'; 
  $opcion = $_POST['opcion'];

  switch ($opcion) {
    case 'alianzas':
      echo insertarAlianzas();
    break;     
    case 'contacto':
      echo insertarContacto();
    break;    
    case 'bolsa_trabajo':
      echo insertarBolsaTrabajo();
    break;    

    default:
      echo "Error en solicitud";
    break;    
  }
  
function insertarContacto(){
    $conexion = conectar();
    $conexion->set_charset('utf8'); // ayuda a que se inserten con acentos directamente

    $nombre = sanitizarVariables($conexion, $_POST['nombre_contacto']);
    $telefono = sanitizarVariables($conexion, $_POST['telefono_contacto']);
    $correo = sanitizarVariables($conexion, $_POST['correo_contacto']);
    $compania = sanitizarVariables($conexion, $_POST['compania_contacto']);
    $servicio = sanitizarVariables($conexion, $_POST['servicio_contacto']);
    $comentarios = sanitizarVariables($conexion, $_POST['comentarios_contacto']);

    if (validarCorreoRepetido($correo, "tabla_contacto", $conexion) == 1){        
      
      $respuesta = 99;

    } else {
      // Obtener el nombre del servicio
      $sql_select = "SELECT nombre FROM tipo_servicio WHERE id_tipo_servicio = '$servicio' AND band_eliminar = 1";
      $execute_sql = mysqli_query($conexion, $sql_select);
      $num_rows = mysqli_num_rows($execute_sql);
      
      if ($num_rows > 0) {    
        $res_consulta = mysqli_fetch_assoc($execute_sql);
        $nombre_servicio = $res_consulta['nombre'];
      } else {
        $nombre_servicio = "Desconocido";
      }

      // Guardar los datos del interesado
      $insert = "INSERT INTO tabla_contacto (nombre, telefono, correo, compania, servicio, comentarios) VALUES ('$nombre','$telefono','$correo','$compania','$servicio','$comentarios')";
      $resultado = mysqli_query($conexion,$insert);
      
      if ($resultado > 0) {     
        //  Enviar correo al encargado
        include 'enviar_correo.php'; 
        include '../templates/plantilla_correo.php'; 
        $cuerpo = plantilla($nombre, $telefono, $correo, $compania, $nombre_servicio, $comentarios);

        if (enviarCorreo("contacto@grupogbp.mx", 'Solicitud de consulta', $cuerpo) == 1) {
          $respuesta = 1;
        }else {
          $respuesta = 97;
        }

      }else {
        $respuesta = 98;
      }
    }

  return $respuesta;
  mysqli_close($conexion);
}

function insertarAlianzas(){
  $conexion = conectar();
  $conexion->set_charset('utf8'); // ayuda a que se inserten con acentos directamente

  $empresa = sanitizarVariables($conexion, $_POST['empresa_alianzas']);
  $nombre = sanitizarVariables($conexion, $_POST['nombre_alianzas']);
  $telefono = sanitizarVariables($conexion, $_POST['telefono_alianzas']);
  $correo = sanitizarVariables($conexion, $_POST['correo_alianzas']);

  if (validarCorreoRepetido($correo, "tabla_alianzas", $conexion) == 1){        
    $respuesta = 99;
  } else {
    $insert = "INSERT INTO tabla_alianzas (empresa, nombre, telefono, correo) VALUES ('$empresa', '$nombre', '$telefono', '$correo')";
    $resultado = mysqli_query($conexion, $insert);

    if ($resultado > 0) {
      //  Enviar correo al encargado
      include 'enviar_correo.php'; 
      include '../templates/plantilla_correo_alianza.php'; 
      $cuerpo = plantilla($empresa, $nombre, $telefono, $correo);

      if (enviarCorreo("contacto@grupogbp.mx", 'Solicitud de Alianza', $cuerpo) == 1) {
        $respuesta = 1;
      }else {
        $respuesta = 0;
      }     
    }else {
      $respuesta = 0;
    }
  }

  return $respuesta;
  mysqli_close($conexion);
}

function insertarBolsaTrabajo(){
  $conexion = conectar();
  $conexion->set_charset('utf8'); // ayuda a que se inserten con acentos directamente

  $nombre = sanitizarVariables($conexion, $_POST['nombre_bt']);
  $telefono = sanitizarVariables($conexion, $_POST['telefono_bt']);
  $correo = sanitizarVariables($conexion, $_POST['correo_bt']);
  $puesto = sanitizarVariables($conexion, $_POST['puesto_bt']);

  if (validarCorreoRepetido($correo, "tabla_bolsa_trabajo", $conexion) == 1){

    $respuesta = 99;

  } else {
    
    if ($_FILES['curriculum_bt']['size'] > 0) {
      
      $dir_subida = '../admin/documentos/curriculum/'; // carpeta
      if (!is_dir($dir_subida)) {
        mkdir($dir_subida, 0755, true);
      }

      $nombre_temporal = str_replace(".tmp","", basename($_FILES['curriculum_bt']['tmp_name']));
      $ruta = $dir_subida .$nombre_temporal; // [nombrePost][nombre del archivo] = ruta
      $tmp_name = $_FILES['curriculum_bt']['tmp_name']; // nombre temporal del archivo = ruta temporal
      $tipo = $_FILES['curriculum_bt']['type']; // nombre temporal del archivo = ruta temporal
      $tipo = strpbrk($tipo, '/'); // obtenemos todo despues de --> /
      $tipo = substr($tipo, 1);     // quitamos --> /        
      // Actualizar registro en el servidor phpMyAdmin
      $ruta_2 = $ruta.".".$tipo;
      $nombreArchivoExtension = $nombre_temporal . "." . $tipo;
      // $ruta_sin = strpbrk($ruta_2, '/');
      // $ruta_sin = substr($ruta_sin, 1);

      $insert = "INSERT INTO tabla_bolsa_trabajo (nombre, telefono, correo, puesto, url_cv) VALUES ('$nombre','$telefono','$correo','$puesto','$nombreArchivoExtension')";
      $resultado = mysqli_query($conexion,$insert);

      if ($resultado > 0) {    
        move_uploaded_file($tmp_name, $ruta_2); 
        //  Enviar correo al encargado
        include 'enviar_correo.php'; 
        include '../templates/plantilla_correo_bt.php'; 
        $cuerpo = plantilla($nombre, $telefono, $correo, $puesto, $nombreArchivoExtension);

        if (enviarCorreo("contacto@grupogbp.mx", 'Solicitud de Trabajo', $cuerpo) == 1) {
          $respuesta = 1;
        }else {
          $respuesta = 0;
        }      
      } else {
        $respuesta = 0;
      }
    }

    return $respuesta;
    mysqli_close($conexion);
  }
}

  // Funciones especiales
function validarCorreoRepetido($correo, $tabla, $conexion){
  $sql = "SELECT correo FROM $tabla WHERE correo = '$correo' AND band_eliminar = 1";
  $res = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($res) > 0) {
  // si esta repetido es uno //si no es numero es uno
    return 1;
  }else {
    return 0;
  }
}

function sanitizarVariables($conexion, $var){
  $var = mysqli_real_escape_string($conexion, $var);
  $var = filter_var($var, FILTER_SANITIZE_STRING);
  return $var;
}
  ?>