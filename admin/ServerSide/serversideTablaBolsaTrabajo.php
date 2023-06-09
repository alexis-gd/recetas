<?php
    // Vista tabla_bolsa_trabajo
    require 'serverside.php';
    $table_data->get('vista_tabla_bolsa_trabajo','id_bolsa_trabajo',array('id_bolsa_trabajo', 'nombre', 'telefono', 'correo', 'puesto', 'url_cv', 'date_add'));
?>