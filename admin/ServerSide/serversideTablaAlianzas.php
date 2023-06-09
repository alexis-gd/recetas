<?php
    // Vista tabla_alianzas
    require 'serverside.php';
    $table_data->get('vista_tabla_alianzas','id_alianzas',array('id_alianzas', 'empresa', 'nombre', 'telefono', 'correo', 'date_add'));
?>