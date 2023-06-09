<?php
    // Vista tabla_contacto
    require 'serverside.php';
    $table_data->get('vista_tabla_contacto','id_contacto',array('id_contacto', 'nombre', 'telefono', 'correo', 'compania', 'nombre_servicio', 'comentarios', 'date_add'));
?>