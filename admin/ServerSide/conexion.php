<?php
function conectar(){

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "recetas";

// $host_db = "localhost";
// $user_db = "grupogbp_user";
// $pass_db = "grupogbp.2021+";
// $db_name = "grupogbp_principal";

$con= new mysqli($host_db, $user_db, $pass_db, $db_name); 
if ($con->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
} else {
    // $con->set_charset('utf8');
    return $con;
}
// $conexion->set_charset('utf8');
}