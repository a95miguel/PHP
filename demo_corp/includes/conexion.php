<?php
    require("constantes.php");
    //1. crear conexion a la base de datos:
    $conexion = mysql_connect(DB_SERVIDOR,DB_USUARIO,DB_PASS);
    if(!$conexion)
    {
        die("Hubo un error de conexion a la base de datos " . mysql_error());
    }
    
    //2. Seleccionar la base de datos:
    $db_seleccionada = mysql_select_db(DB_NOMBRE, $conexion);
    if(!$db_seleccionada)
    {
        die("Hubo error al seleccionar la base de datos" . mysql_error());
    }
?>
