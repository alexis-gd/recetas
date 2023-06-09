<?php
    require_once 'conexion.php';
    $opcion = $_POST['opcion'];
    switch ($opcion) {
        case 'nuevo_servicio_general':
            echo nuevo_servicio_general();
            break;
        case 'nuevo_servicio':
            echo nuevo_servicio();
            break;
        case 'nuevo_subservicio':
            echo nuevo_subservicio();
            break;
        case 'nuevo_op_subservicio':
            echo nuevo_op_subservicio();
            break;
        case 'update_servicio_general':
            echo update_servicio_general();
            break;
        case 'update_servicio':
            echo update_servicio();
            break;
        case 'update_subservicio':
            echo update_subservicio();
            break;
        case 'update_opsubservicio':
            echo update_opsubservicio();
            break;
            
            default:
            # code...
            break;
    }
    
    function nuevo_servicio_general(){
        $conexion = conectar();
    
        $modal_id_servicio = $_POST['modal_id_servicio']; // id principal
        $servicio_general = $_POST['servicio_general']; // texto nuevo

        $insert = "INSERT INTO lista_servicios_servicios (id_lista_servicio, nivel_1) VALUES ('$modal_id_servicio','$servicio_general')";
        $resultado = mysqli_query($conexion,$insert);

        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    } 

    function nuevo_servicio(){
        $conexion = conectar();
    
        $modal_id_servicio = $_POST['modal_id_servicio']; // id principal
        $modal_id_servicio_general = $_POST['modal_id_servicio_general']; // id servicio general
        $servicio = $_POST['servicio']; // texto nuevo

        $insert = "INSERT INTO lista_servicios_servicios_sub (id_lista_servicio_servicio, id_lista_servicio, nivel_2) VALUES ('$modal_id_servicio_general','$modal_id_servicio', '$servicio')";
        $resultado = mysqli_query($conexion,$insert);

        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

    function nuevo_subservicio(){
        $conexion = conectar();
    
        $modal_id_servicio = $_POST['modal_id_servicio']; // id principal
        $modal_id_servicio_general = $_POST['modal_id_servicio_general']; // id servicio general
        $modal_id_subservicio = $_POST['modal_id_subservicio']; // id servicio
        $subservicio = $_POST['subservicio']; // texto nuevo

        $insert = "INSERT INTO lista_servicios_servicios_sub (id_lista_servicio_servicio, id_lista_servicio, parent_2, nivel_3) VALUES ('$modal_id_servicio_general','$modal_id_servicio', '$modal_id_subservicio', '$subservicio')";
        $resultado = mysqli_query($conexion,$insert);

        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

    function nuevo_op_subservicio(){
        $conexion = conectar();
    
        $modal_id_servicio = $_POST['modal_id_servicio']; // id principal
        $modal_id_servicio_general = $_POST['modal_id_servicio_general']; // id servicio general
        $modal_id_subservicio = $_POST['modal_id_subservicio']; // id subservicio
        $op_subservicio = $_POST['op_subservicio']; // texto nuevo

        $insert = "INSERT INTO lista_servicios_servicios_sub (id_lista_servicio_servicio, id_lista_servicio, parent_3, nivel_4) VALUES ('$modal_id_servicio_general','$modal_id_servicio', '$modal_id_subservicio', '$op_subservicio')";
        $resultado = mysqli_query($conexion,$insert);

        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

    function update_servicio_general(){
        $conexion = conectar();

        $id_titulo = $_POST['modal_id_servicio_editar'];
        $servicio_general = $_POST['servicio_general_editar'];

        $actualizar = "UPDATE lista_servicios_servicios SET nivel_1 ='$servicio_general' WHERE id_lista_servicio_servicio = $id_titulo";
        $resultado = mysqli_query($conexion, $actualizar);
        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

    function update_servicio(){
        $conexion = conectar();

        $id_servicio = $_POST['modal_id_servicio_editar'];
        $servicio_editar = $_POST['servicio_editar'];

        $actualizar = "UPDATE lista_servicios_servicios_sub SET nivel_2 ='$servicio_editar' WHERE id_lista_servicio_servicio_sub = $id_servicio";
        $resultado = mysqli_query($conexion, $actualizar);
        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

    function update_subservicio(){
        $conexion = conectar();

        $id_servicio = $_POST['modal_id_servicio_editar'];
        $subservicio_editar = $_POST['subservicio_editar'];

        $actualizar = "UPDATE lista_servicios_servicios_sub SET nivel_3 ='$subservicio_editar' WHERE id_lista_servicio_servicio_sub = $id_servicio";
        $resultado = mysqli_query($conexion, $actualizar);
        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

    function update_opsubservicio(){
        $conexion = conectar();

        $id_servicio = $_POST['modal_id_servicio_editar'];
        $op_subservicio_editar = $_POST['op_subservicio_editar'];

        $actualizar = "UPDATE lista_servicios_servicios_sub SET nivel_4 ='$op_subservicio_editar' WHERE id_lista_servicio_servicio_sub = $id_servicio";
        $resultado = mysqli_query($conexion, $actualizar);
        if ($resultado > 0) {
            $resp = 1;
        }else{
            $resp = 0;
        }
        return $resp;
        mysqli_close($conexion);
    }

?>