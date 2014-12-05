<?php

$db_name="proyecto";
$db_server="localhost";
$db_user="root";
$db_password="";
$db_conexion=mysql_connect($db_server,$db_user,$db_password) or die("Error en la conexion");
$base=mysql_select_db($db_name,$db_conexion) or die ("Error conexion base de datos");
?>