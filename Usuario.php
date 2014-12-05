<?php

require('bd.php');
require_once('librerias.php');

class usuario {

    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterno;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contraseña;
    private $Nivel;
    private $Estatus;

    public function readUsuarioG(){

        $sql1= "SELECT * FROM usuario where Estatus >= '1'  order by Nivel";
        $result1= mysql_query($sql1) or die ("error en la conexion a tabla");
        echo"<div class=table-responsive> ";
        echo"<table class=\"table table-striped\"> ";
        echo"<tr><td colspan=5 align=center><stromp><b>Lista De Usuarios</stromp></td></tr>";
        echo"<tr><td align=center><b>Clv.</td><td align=center><b>Nombre</td>
            <td align=center><b>Apellido Paterno</td><td align=center><b>Apellido Materno</td><td align=center><b>Tipo</td></tr>";

        while($field=mysql_fetch_array($result1)){
            $this->Id=$field['id'];
            $this->Nombre=$field['Nombre'];
            $this->ApellidoPaterno=$field['ApellidoPaterno'];
            $this->ApellidoMaterno=$field['ApellidoMaterno'];
            $this->Nivel=$field['Nivel'];
            switch($this->Nivel){
        case 1;
         $type="Administrador";
        break;
         case 2;
         $type="Alumno";
        break;
         case 3;
         $type="Maestro";
        break;
            }
            echo"<tr><td align=center>$this->Id</td>
             <td align=center>$this->Nombre</td>
             <td align=center>$this->ApellidoPaterno</td>
             <td align=center>$this->ApellidoMaterno</td>
             <td align=center>$type</td></tr>";
        }

        echo"</table></div>";
    }
    public function createUsuario($Id,$Nombre,$ApellidoPaterno,$ApellidoMaterno,$Nivel){

        $insert01 ="insert into usuario (id,Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus) values($Id,'$Nombre','$ApellidoPaterno','$ApellidoMaterno','$Nivel','1')";
        $execute01 = mysql_query($insert01) or die ("error $insert01 ");

    }
    public function readUsuarioS(){

    }
    public function updateUsuario($Id,$Nombre,$ApellidoPaterno,$ApellidoMaterno,$Nivel){
        $update01 = "UPDATE usuario SET Nombre='$Nombre', ApellidoPaterno = '$ApellidoPaterno', ApellidoMaterno = '$ApellidoMaterno', Nivel = '$Nivel' where id=$Id";
        $execute01 = mysql_query($update01) or die ("Error update $update01");

    }
    public function deleteUsuario($Id){

        $delete = "DELETE FROM usuario  WHERE id = $Id";
        $delete1 = mysql_query($delete) or die ("Error al borrar $delete");
    }
}
?>