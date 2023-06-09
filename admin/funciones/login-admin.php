<?php
// Iniciar sesion 
if (isset($_POST['login-admin'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  try{
    include_once 'conexion.php';  
    $con = conectar();
    $stmt = $con->prepare("SELECT * FROM admins WHERE usuario = ? and password = ?;");
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado, $nivel, $band_eliminar);    
    if ($stmt->affected_rows) {
      $existe = $stmt->fetch();
      if($existe){
        session_start();
        $_SESSION['usuario'] = $usuario_admin;
        $_SESSION['nombre'] = $nombre_admin;
        $_SESSION['nivel'] = $nivel;
        $_SESSION['id'] = $id_admin;
        $respuesta = array(
          'respuesta' => 'si_existe',
          'usuario' => $nombre_admin
        );
      }else{
        $respuesta = array(
          'respuesta' => 'error'
        );
      }
    }
    $stmt->close();
    $con->close();
  } catch (Exception $e) {
    echo "Error: ". $e->getMessage;
  }
  die(json_encode($respuesta)); 
  }
?>