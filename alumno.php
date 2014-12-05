<?php
class Grupo {
    private $id;
    private $Nombre;
    private $Avatar;
    private $Orden;
    private $Estatus;

    public function InsertVal($idalu,$idgrup){
        $insert01 = "INSERT INTO alumno_grupo(id,id_grup) VALUES ($idalu,$idgrup)";
        $execute = mysql_query($insert01) or die ("Error al insertar $idalu,$idgrup");

        $update01 = "UPDATE usuario SET Estatus='$idgrup' where id=$idalu";
        $execute01 = mysql_query($update01) or die ("Error update $update01");
    }

    public function Eliminagrup($idagp,$alumno){
        $delete = "DELETE FROM alumno_grupo WHERE idag= $idagp";
        $delete1 = mysql_query($delete) or die ("Error al borrar $delete");

        $update01 = "UPDATE usuario SET Estatus=1 where id=$alumno";
        $execute01 = mysql_query($update01) or die ("Error update $update01");

    }

    public function AsignarAlumnoaGrupo(){
        $sql01="SELECT * FROM usuario WHERE nivel=2 AND Estatus = 1  ";
        $consulta = mysql_query($sql01) or die ("error 1 ");
        $cuantos3=mysql_num_rows($consulta);
        echo"<div class=table-responsive> ";
        echo"<table class=\"table table-striped\"> ";
        echo"<tr><td colspan=5 align=center><stromp><b>Alumnos Sin Grupo</stromp></td></tr>";
        echo"<tr><td align=center><b></td><td align=center><b>Clv.</td><td align=center><b>Nombre</td>
            <td align=center><b>Apellido Paterno</td><td align=center><b>Apellido Materno</td></tr>";

        echo "<form name=materias action=testAlumno.php method=Post>";
        for ($y=0; $y<$cuantos3; $y++)
        {
            $id=mysql_result($consulta, $y, 'id');
            $nom=mysql_result($consulta, $y, 'Nombre');
            $apat =mysql_result($consulta, $y, 'ApellidoPaterno');
            $amat=mysql_result($consulta,$y,'ApellidoMaterno');
            echo"<tr><td align=center><input type=checkbox name=user1[] value=$id>
            </td><td align=center>$id</td><td align=center>$nom</td><td align=center>$apat</td>
            <td align=center>$amat</td></tr>";
        }
        echo '<br>';
        echo"</table></div><table>";
        $sql3="SELECT * FROM grupo WHERE Estatus = 1 ORDER BY Nombre ASC ";
        $consulta3=mysql_query($sql3) or die ('Error de Consult3');
        $cuantos3=mysql_num_rows($consulta3);
        echo "<tr><td><b>Selecciona Grupo:</b></td><td><select name=user2>";
        echo"<option value=t>--Seleccionar--</option>";
        for ($y=0; $y<$cuantos3; $y++)
        {
            $id=mysql_result($consulta3, $y, 'id_grup');
            $nom=mysql_result($consulta3, $y, 'Nombre');
            echo"<option value=$id>$nom </option>";
        }
        echo "</select></td></tr>";
        echo "<tr><td align=center colspan=2><input type=submit name=submit value=Agregar /></td></tr>";
        echo "</form>";
        echo "</table>";
    }
} 