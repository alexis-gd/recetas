<?php
function getPageName() {
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace(".php", "", $archivo);
  return $pagina;
}

// para cambiar esto hay que cambiar el nombre de la página del servicio
switch (getPageName()) {
  case 'contabilidad':
    $idServicio = 1;
    break;
  case 'nominas':
    $idServicio = 2;
    break;
  case 'auditoria':
    $idServicio = 3;
    break;
  case 'fiscales':
    $idServicio = 4;
    break;
  case 'legales':
    $idServicio = 5;
    break;
  case 'corporativo':
    $idServicio = 6;
    break;
  
  default:
    header("location:index.php");
    break;
}

  $sql = "SELECT * FROM lista_servicios_header WHERE id_lista_servicio = '$idServicio'";
  $resultado = $conexion->query($sql);
  $banner = $resultado->fetch_assoc();
  ?>