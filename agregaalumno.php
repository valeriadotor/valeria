<?php
require ('alumno.php');
require('menu.php');
require('librerias.php');
require ('bd.php');
$Grupo = new Grupo();
$Grupo->AsignarAlumnoaGrupo();
?>