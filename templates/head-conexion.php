<?php
  include 'admin/funciones/conexion.php'; 
  $conexion = conectar(); 

  try {
    $consulta_version = "SELECT web FROM versiones WHERE id_version = '1'";
    $resultado_version = mysqli_query($conexion, $consulta_version);
    $array_version = mysqli_fetch_array($resultado_version);
    $v = $array_version['web'];
  } catch (Exception $e) {
    $error = $e->getMessage();
  }

  try { $select_banner = "SELECT titulo, boton_text, boton_link, img_banner_url FROM seccion_banner";
    $r_banner = $conexion->query($select_banner);
    $banner = $r_banner->fetch_assoc();
  } catch (Exception $e) {
    $error = $e->getMessage();
  }

  try {
    $select_footer = "SELECT * FROM seccion_footer";
    $r_footer = $conexion->query($select_footer);
    $footer = $r_footer->fetch_assoc();
  } catch (Exception $e) {
    $error = $e->getMessage();
  }

  try { 
    $select_nosotros = "SELECT * FROM seccion_nosotros";
    $r_nosotros = $conexion->query($select_nosotros);
    $nosotros = $r_nosotros->fetch_assoc();
  } catch (Exception $e) {
    $error = $e->getMessage();
  }

  try {
    $select_servicios = "SELECT * FROM seccion_servicios";
    $r_servicios = $conexion->query($select_servicios);
    $servicios = $r_servicios->fetch_assoc();
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
  
  try {
    $select_marca = "SELECT * FROM seccion_marca";
    $r_marca = $conexion->query($select_marca);
    $marca = $r_marca->fetch_assoc();
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
  
?>