<?php
require ('alumno.php');
require('menu.php');
require('librerias.php');
require ('bd.php');
$Grup = new Grupo();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idalu = $_POST['user1'];
    $idgrup = $_POST['user2'];
    $count = count($idalu);
    for($i = 0; $i < $count; $i++){
        $idalumno = $idalu[$i];
        $Grup->InsertVal($idalumno,$idgrup);
    }
}
$sql01="SELECT distinct alumno_grupo.`id_grup`,usuario.ApellidoPaterno,usuario.ApellidoMaterno,usuario.`Nombre`,grupo.`Nombre` AS grupo,alumno_grupo.idag,alumno_grupo.id
FROM alumno_grupo,usuario,grupo
WHERE alumno_grupo.`id` = usuario.`id`
AND alumno_grupo.`id_grup` = grupo.`id_grup`
AND alumno_grupo.`id_grup` = $idgrup";
$consulta = mysql_query($sql01) or die ("error 1 de consulta a materia");
$cuantos3=mysql_num_rows($consulta);
echo"<div class=table-responsive> ";
echo"<table class=\"table table-striped\"> ";
echo "<tr><td colspan=2 align=center><b>Alumnos Asignados</b></td></tr>";
echo"<tr><td><b>Alumno</b></td><td><b>Eliminar Alumno</b></td></tr>";
for ($y=0; $y<$cuantos3; $y++)
{
    $id = mysql_result($consulta, $y, 'id_grup');
    $nom =mysql_result($consulta, $y, 'Nombre');
    $ap =mysql_result($consulta, $y, 'ApellidoPaterno');
    $am =mysql_result($consulta, $y, 'ApellidoMaterno');
    $grup =mysql_result($consulta, $y, 'grupo');
    $ida =mysql_result($consulta, $y, 'idag');
    $idalu =mysql_result($consulta, $y, 'id');
    echo "<tr><td>$nom $ap $am</td><td><form name=eliminar action=alm.php method=Post>
<input type=hidden name=idag value=$ida />
<input type=hidden name=alumno value=$idalu />
<input type=hidden name=user2 value=$id />
<input type=submit name=submit value=Eliminar /></form></td></tr>";
}
echo "<tr><td colspan=2 align=center>Alumnos agregados al grupo:<b> $grup</b></td></tr>";
echo "</table>";
echo "</div>";
echo '<br><button align="center" type="button" class="btn btn-lg btn-default">
<a href="agregaalumno.php"><b>Agregar Alumnos Al Grupo</b></a></button>';
?>