<?php
require_once('bd.php');
require('menu.php');

echo "<div class=table-responsive>";
echo "<table class=\"table table-striped\">";
echo "<tr><td colspan=2 align=center><strong>Materias Asignadas De: $nombre $Ap $Am</strong></td></tr>";
$sql01 = "SELECT * FROM maestro_materia WHERE id = $idu GROUP BY id_materia";
$result01 = mysql_query($sql01)or die("Error $sql01");
while($field = mysql_fetch_array($result01)){
    $id = $field['id_materia'];
    $sql04 = "SELECT * FROM materia WHERE id_materia = $id";
    $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
    $nombre = utf8_decode(mysql_result($result04,0,'Nombrem'));
    echo "<tr><td>$nombre</td><td></td></tr>";
}