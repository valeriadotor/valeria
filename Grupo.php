<?php

require('bd.php');
require_once('librerias.php');

class grupo {

    private $id_grup;
    private $Nombre;

    public function readGrupoG(){

        $sql1= "SELECT * FROM grupo where Estatus = '1'  order by Nombre";
        $result1= mysql_query($sql1) or die ("error en la conexion a tabla");
        echo"<div class=table-responsive> ";
        echo"<table class=\"table table-striped\"> ";
        echo"<tr><td colspan=5 align=center><stromp><b>Lista De Grupos</stromp></td></tr>";
        echo"<tr><td align=center><b>Clv.</td><td align=center><b>Nombre Grupo</td></tr>";

        while($field=mysql_fetch_array($result1)){
            $this->id_grup=$field['id_grup'];
            $this->Nombre=$field['Nombre'];
            echo"<tr><td align=center>$this->id_grup</td>
             <td align=center>$this->Nombre</td>";
        }

        echo"</table></div>";
    }
    public function createGrupo($id_grup,$Nombre){
        $insert01 ="insert into grupo (id_grup,Nombre,Estatus) values($id_grup,'$Nombre','1')";
        $execute01 = mysql_query($insert01) or die ("error $insert01 ");

    }
    public function readGrupoS(){

    }
    public function updateGrupo($id_grup,$Nombre){
        $update01 = "UPDATE grupo SET Nombre='$Nombre' where id_grup=$id_grup";
        $execute01 = mysql_query($update01) or die ("Error update $update01");

    }
    public function deleteGrupo($id_grup){

        $delete = "DELETE FROM grupo WHERE id_grup = $id_grup";
        $delete1 = mysql_query($delete) or die ("Error al borrar $delete");
    }
}
?>