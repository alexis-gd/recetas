<?php

include 'conexion.php'; //incluimos el archivo donde esta la conexion
$conexion=conectar(); //almacenamos la funcion que hace la conexion en una variable

$carrera = $_GET['carrera']; //nombre de la vista
$status = $_GET['status']; //donde redireccionar
session_start();
$id_user = $_SESSION['id_usuario']; 

$actualizar = "UPDATE status SET carrera ='$carrera', status = '$status' WHERE id = '$id_user'";
$resultado = mysqli_query($conexion, $actualizar);

switch ($status) {
    case 'inscritos':
        header("location:../inscritos.php");
        break;
    case 'pre':
        header("location:../pre-inscritos.php");
        break;
    case 'revision':
        header("location:../revision.php");
        break;
    case 'webinar':
        header("location:../webinar_registrados.php");
        break;
    case 'interesados':
        header("location:../interesados_registrados.php");
        break;
    case 'asignatura':
        header("location:../asignaturas.php");
        break;
    case 'csv':
        header("location:../pagos.php");
        break;
    case 'conceptos':
        header("location:../conceptos.php");
        break;
    case 'becados':
        header("location:../becados.php");
        break;
    case 'bajas':
        header("location:../bajas.php");
        break;
    case 'maestros':
        header("location:../maestros.php");
        break;
    case 'personal':
        header("location:../catalogo_personal.php");
        break;
    case 'bolsa':
        header("location:../bolsa_trabajo.php");
        break;
}


// if ($resultado == 1) {
//     header("location:../pre-inscritos.php");
// }else{
//     header("location:../inscritos.php");
// }