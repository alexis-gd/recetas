<?php
    require_once 'conexion.php';
    $opcion = $_POST['opcion'];
    switch ($opcion) {
        case 'selectServicio':
            echo selectServicio();
            break;
        case 'selectSubServicio':
            echo selectSubServicio();
            break;
        case 'selectOpSubServicio':
            echo selectOpSubServicio();
            break;
        case 'getIconoServicio':
            echo getIconoServicio();
            break;
            
            default:
            # code...
            break;
    }
    
    function selectServicio(){
        $conexion = conectar(); //conectamos con el servidor
        $id_servicio = $_POST['id_servicio'];
        $titulo = $_POST['titulo'];
        
        $sql_nivel_2 = "SELECT id_lista_servicio_servicio_sub, nivel_2 FROM lista_servicios_servicios_sub WHERE id_lista_servicio = '$id_servicio' AND id_lista_servicio_servicio = '$titulo' AND nivel_2 != '' AND band_eliminar = 1";
        $res_nivel_2 = mysqli_query($conexion, $sql_nivel_2);  
        $num_rows = mysqli_num_rows($res_nivel_2);  
        
        if ($num_rows > 0) {
            $listas = '<option value="">Selecciona un Servicio para editar</option>';
            while($arr_nivel_2 = mysqli_fetch_assoc($res_nivel_2)){    
                $listas .= "<option value='$arr_nivel_2[id_lista_servicio_servicio_sub]'>$arr_nivel_2[nivel_2]</option>";            
            }	
            $resp = 1;
            $data = array("$resp", "$listas");
        }else{
            $resp = 0;
            $data = array("$resp");
        }
        echo json_encode($data);
        mysqli_close($conexion);
    }

    function selectSubServicio(){
        $conexion = conectar(); //conectamos con el servidor
        $id_servicio = $_POST['id_servicio'];
        $titulo = $_POST['titulo'];
        $servicio = $_POST['servicio'];
        
        $sql_nivel_2 = "SELECT id_lista_servicio_servicio_sub, nivel_3 FROM lista_servicios_servicios_sub WHERE id_lista_servicio = '$id_servicio' AND id_lista_servicio_servicio = '$titulo' AND parent_2 = '$servicio' AND band_eliminar = 1";
        $res_nivel_2 = mysqli_query($conexion, $sql_nivel_2);  
        $num_rows = mysqli_num_rows($res_nivel_2);  
        
        if ($num_rows > 0) {
            $listas = '<option value="">Selecciona un Servicio para editar</option>';
            while($arr_nivel_2 = mysqli_fetch_assoc($res_nivel_2)){    
                $listas .= "<option value='$arr_nivel_2[id_lista_servicio_servicio_sub]'>$arr_nivel_2[nivel_3]</option>";            
            }	
            $resp = 1;
            $data = array("$resp", "$listas");
        }else{
            $resp = 0;
            $data = array("$resp");
        }

        echo json_encode($data);
        mysqli_close($conexion);
    }

    function selectOpSubServicio(){
        $conexion = conectar(); //conectamos con el servidor
        $id_servicio = $_POST['id_servicio'];
        $titulo = $_POST['titulo'];
        // $servicio = $_POST['servicio'];
        $subservicio = $_POST['subservicio'];
        
        $sql_nivel_2 = "SELECT id_lista_servicio_servicio_sub, nivel_4 FROM lista_servicios_servicios_sub WHERE id_lista_servicio = '$id_servicio' AND id_lista_servicio_servicio = '$titulo' AND parent_3 = '$subservicio' AND band_eliminar = 1";
        $res_nivel_2 = mysqli_query($conexion, $sql_nivel_2);  
        $num_rows = mysqli_num_rows($res_nivel_2);  
        
        if ($num_rows > 0) {
            $listas = '<option value="">Selecciona un Servicio para editar</option>';
            while($arr_nivel_2 = mysqli_fetch_assoc($res_nivel_2)){    
                $listas .= "<option value='$arr_nivel_2[id_lista_servicio_servicio_sub]'>$arr_nivel_2[nivel_4]</option>";            
            }	
            $resp = 1;
            $data = array("$resp", "$listas");
        }else{
            $resp = 0;
            $data = array("$resp");
        }

        echo json_encode($data);
        mysqli_close($conexion);
    }

    function getIconoServicio(){
        $conexion = conectar(); //conectamos con el servidor
        $id_servicio = $_POST['id_servicio'];
        
        $sql_nivel_2 = "SELECT icono FROM lista_servicios_servicios WHERE id_lista_servicio_servicio = '$id_servicio' AND band_eliminar = 1";
        $res_nivel_2 = mysqli_query($conexion, $sql_nivel_2);  
        $num_rows = mysqli_num_rows($res_nivel_2);  
        $res = mysqli_fetch_assoc($res_nivel_2);
        
        if ($num_rows > 0) {
            $icono = $res['icono'];
            $resp = 1;
            $data = array("$resp", "$icono");
        }else{
            $resp = 0;
            $data = array("$resp");
        }

        echo json_encode($data);
        mysqli_close($conexion);
    }

?>