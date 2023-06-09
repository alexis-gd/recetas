<?php

  include 'conexion.php'; 
  $conexion = conectar(); 

  $consulta_version = "SELECT web_admin FROM versiones WHERE id_version = '1'";
  $resultado_version = mysqli_query($conexion, $consulta_version);
  $array_version = mysqli_fetch_array($resultado_version);
  $v = $array_version['web_admin'];

  $select_admins = "SELECT count(id_admin) FROM admins";
  $r_admins = $conexion->query($select_admins);
  $admins = $r_admins->fetch_assoc();
  
  $select_versiones = "SELECT * FROM versiones";
  $r_versiones = $conexion->query($select_versiones);
  $versiones = $r_versiones->fetch_assoc();

  $select_lista_servicios = "SELECT count(id_lista_servicio) FROM lista_servicios";
  $r_lista_servicios = $conexion->query($select_lista_servicios);
  $lista_servicios = $r_lista_servicios->fetch_assoc();

?>