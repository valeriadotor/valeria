<?php
class Materia {

    public $maestro;
    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    public function createMateria(){
        echo "<br>Create Materia";
    }
    public function readMateriaG(){
        echo "<br>Read Materia G";
    }
    public function readMateriaS(){
        echo "<br>Read Materia S";
    }
    public function deleteMateria(){
        echo "<br>Delete Materia";
    }
    public function updateMateria(){
        echo "<br>Update Materia";
    }
    public function asignarMateriaMaestro($id_maestro){
        //include('asignar-materias.php');
        echo "<div class=table-responsive>";
        echo "<table class=\"table table-striped\">";
        echo "<form action=TestMateria1.php method=POST id=materias>";
        echo "<tr><td colspan=2 align=center><strong>Asignar Nuevas Materias</strong></td></tr>";
        echo "<tr><td>Materia: </td><td><select id=materia name=materia>";
        echo "<option >--- Selecciona ---</option>";
        $sql01 = "SELECT * FROM materia WHERE Estatusm = 1 ORDER BY Nombrem ASC";
        $result01 = mysql_query($sql01)or die("Error $sql01");
        while($field = mysql_fetch_array($result01)){
            $id_materia = $field['id_materia'];
            $opcion = utf8_decode($field['Nombrem']);
            $opcion = ucwords($opcion);
            $sql03="SELECT * FROM maestro_materia WHERE id = $id_maestro AND id_materia = $id_materia";
            $result03 = mysql_query($sql03)or die("No se ejecuta consulta $sql03");
            $existe = mysql_num_rows($result03);
            if($existe > 0){
                echo "<option value=0>No Disponible</option>";
            }else{
                echo "<option value=$id_materia>$opcion</option>";
            }
        }
        echo "</select></td></tr>";
        echo "<input type=hidden id=accion name=accion value=1>";
        echo "<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo "<tr><td colspan=2 align=center><input type=submit value=Agregar></td></tr>"; // onclick=window.location.href='TestMateria.php?accion=1&maestro=$id_maestro'

        echo "</form>";
        echo "</table>";
        echo "</div>";

    }
    public function asignarMateriaGrupo(){
        echo "<br>Asignar Grupo";
    }
    public function createMaestroMateria($maestro_id, $materia_id){
         if ($materia_id > 0){
            $insert01 = " INSERT INTO maestro_materia (id, id_materia)
                                 VALUES('$maestro_id','$materia_id')";
            $execute01 = mysql_query($insert01) or die("Error  $insert01");
        }
    }

    public function deleteMaestroMateria($maestro_id, $materia_id){
        if ($materia_id > 0){
            $delete01 = "DELETE FROM maestro_materia WHERE id = $maestro_id AND id_materia = $materia_id";
            $delete01 = mysql_query($delete01) or die("Error  $delete01");
        }
    }

    public function seleccionaMaestro($maestro){
        echo "<div class=table-responsive>";
        echo "<form action=muestra.php method=Post name=maestro id=maestro target='_self'>";
        echo "<table class=\"table table-striped\">";

        echo "<tr><td>Maestro: </td><td><select name=idmae>";
        $sql02 = "SELECT * FROM usuario WHERE Estatus = 1 AND Nivel = 3 ORDER BY ApellidoPaterno ASC";
        $result02 = mysql_query($sql02)or die("Error $sql02");
        if ($maestro != 0){
            $sql04 = "SELECT * FROM usuario WHERE id = $maestro";
            $result04 = mysql_query($sql04)or die("No se ejecuta consulta $sql04");
            $nombre = $maestro." ) ";
            $nombre .= mysql_result($result04,0,'ApellidoPaterno');
            $nombre .= " ".mysql_result($result04,0,'ApellidoMaterno');
            $nombre .= " ".mysql_result($result04,0,'Nombre');
            $nombre = utf8_decode($nombre);
            $nombre = ucwords($nombre);
            echo "<option value=$maestro>$nombre</option>";
        }
        while($field = mysql_fetch_array($result02)){
            $id_maestro = utf8_decode($field['id']);
            $opcion = utf8_decode($field['id'].") ".$field['ApellidoPaterno']." ".$field['ApellidoMaterno']." ".$field['Nombre']);
            if ($maestro != $id_maestro)
                echo "<option value=$id_maestro>$opcion</option>";
        }
        echo "</select></td></tr>";

        echo "<tr><td colspan=2 align=center><input type=submit id=submit value=Seleccionar></td></tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
    }
}