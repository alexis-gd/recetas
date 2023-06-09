<?php
  require_once 'conexion.php';
  $opcion = $_POST['opcion'];
  switch ($opcion) {
      case 'servicio_general':
          echo eliminarServicioGeneral();
          break;
      case 'servicio':
          echo eliminarServicio();
          break;
      case 'subservicio':
          echo eliminarSubServicio();
          break;
      case 'op_subservicio':
        echo eliminarOpSubServicio();
          break;
      case 'icono':
        echo eliminarIcono();
          break;
      
      default:
          # code...
          break;
  }

  function eliminarServicioGeneral(){
      $conexion = conectar();
      // $conexion->set_charset('utf8');
      $id_borrar = $_POST['id_borrar'];

      $actualizar = "UPDATE lista_servicios_servicios SET band_eliminar = 0 WHERE `id_lista_servicio_servicio` = '$id_borrar'";
      $resultado = mysqli_query($conexion, $actualizar);

      return $id_borrar;
      mysqli_close($conexion);
  }

  function eliminarServicio(){
      $conexion = conectar();
      // $conexion->set_charset('utf8');
      $id_borrar = $_POST['id_borrar'];

      $actualizar = "UPDATE lista_servicios_servicios_sub SET band_eliminar = 0 WHERE `id_lista_servicio_servicio_sub` = '$id_borrar'";
      $resultado = mysqli_query($conexion, $actualizar);

      return $id_borrar;
      mysqli_close($conexion);
  }

  function eliminarSubServicio(){
      $conexion = conectar();
      // $conexion->set_charset('utf8');
      $id_borrar = $_POST['id_borrar'];

      $actualizar = "UPDATE lista_servicios_servicios_sub SET band_eliminar = 0 WHERE `id_lista_servicio_servicio_sub` = '$id_borrar'";
      $resultado = mysqli_query($conexion, $actualizar);

      return $id_borrar;
      mysqli_close($conexion);
  }

  function eliminarOpSubServicio(){
      $conexion = conectar();
      // $conexion->set_charset('utf8');
      $id_borrar = $_POST['id_borrar'];

      $actualizar = "UPDATE lista_servicios_servicios_sub SET band_eliminar = 0 WHERE `id_lista_servicio_servicio_sub` = '$id_borrar'";
      $resultado = mysqli_query($conexion, $actualizar);

      return $id_borrar;
      mysqli_close($conexion);
  }

  function eliminarIcono(){
      $conexion = conectar();
      // $conexion->set_charset('utf8');
      $id_borrar = $_POST['id_borrar'];

      $sql_nivel_2 = "SELECT icono FROM lista_servicios_servicios WHERE id_lista_servicio_servicio = '$id_borrar' AND band_eliminar = 1";
      $res_nivel_2 = mysqli_query($conexion, $sql_nivel_2);  
      $res = mysqli_fetch_assoc($res_nivel_2);
      $directorio = "../img/seccion_servicios/iconos/" . $res['icono'] . "";

      //eliminando del servidor
      if (file_exists($directorio)) {
        unlink($directorio);//sabiendo que estos son los parametros para tu caso 
      }

      $actualizar = "UPDATE lista_servicios_servicios SET icono = null WHERE `id_lista_servicio_servicio` = '$id_borrar'";
      $resultado = mysqli_query($conexion, $actualizar);

      return $id_borrar;
      mysqli_close($conexion);
  }


?>