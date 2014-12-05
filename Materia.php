<?php

require('bd.php');
require_once('librerias.php');

class materia {

    private $id_materia;
    private $Nombrem;

    public function readMateriaG(){

        $sql1= "SELECT * FROM materia where Estatusm = '1'  order by Nombrem";
        $result1= mysql_query($sql1) or die ("error en la conexion a tabla");
        echo"<div class=table-responsive> ";
        echo"<table class=\"table table-striped\"> ";
        echo"<tr><td colspan=5 align=center><stromp><b>Lista De Materias</stromp></td></tr>";
        echo"<tr><td align=center><b>Clv.</td><td align=center><b>Nombre Materia</td></tr>";

        while($field=mysql_fetch_array($result1)){
            $this->id_materia=$field['id_materia'];
            $this->Nombrem=$field['Nombrem'];
            echo"<tr><td align=center>$this->id_materia</td>
             <td align=center>$this->Nombrem</td>";
        }

        echo"</table></div>";
    }
    public function createMateria($id_materia,$Nombrem){
        $insert01 ="insert into materia (id_materia,Nombrem,Estatusm) values($id_materia,'$Nombrem','1')";
        $execute01 = mysql_query($insert01) or die ("error $insert01 ");

    }
    public function readMateriaS(){

    }
    public function updateMateria($id_materia,$Nombrem){
        $update01 = "UPDATE materia SET Nombrem='$Nombrem' where id_materia=$id_materia";
        $execute01 = mysql_query($update01) or die ("Error update $update01");

    }
    public function deleteMateria($id_materia){

        $delete = "DELETE FROM materia  WHERE id_materia = $id_materia";
        $delete1 = mysql_query($delete) or die ("Error al borrar $delete");
    }
}
?>