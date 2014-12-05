<?php

require ('usuario.php');

require('bd.php');

require_once ('menu.php');

$usuario = new usuario();

if (isset($_POST['submit']))
{
    switch($_POST['submit'])
    {
       case"Alta":
       $usuario->createUsuario("$_POST[id]","$_POST[Nombre]","$_POST[ApellidoPaterno]","$_POST[ApellidoMaterno]","$_POST[Nivel]");
       break;
       case"Borrar";
       $usuario->deleteUsuario($_POST['id']);
       break;
       case"Modificar":
       $usuario->updateUsuario("$_POST[id]","$_POST[Nombre]","$_POST[ApellidoPaterno]","$_POST[ApellidoMaterno]","$_POST[Nivel]");
       break;
    }
  }

$usuario->readUsuarioG();
/*$usuario->createUsuario();
$usuario->readUsuarioG();
$usuario->readUsuarioS();
$usuario->updateUsuario();
$usuario->deleteUsuario();
*/
echo"
<div>
<form name=alumno action=testUsuario.php method=Post>
<table>
<tr><td><b>Clave:</td><td><input type=text name=id></td>
 <td align=center><input type=submit name=submit value=Borrar></td></tr>
<tr><td><b>Nombre(s):</td><td colspan=2><input type=text name=Nombre></td></tr>
<tr><td><b>Apellido_Paterno:</td><td colspan=2><input type=text name=ApellidoPaterno></td></tr>
<tr><td><b>Apellido_Materno:</td><td colspan=2><input type=text name=ApellidoMaterno></td></tr>
<tr><td><b>Nivel:</td><td colspan=2><select name=Nivel>
 <option value='1'>Administrador</option>
 <option value='3'>Maestro</option>
 <option value='2'>Alumno</option>
 </select></td></tr><br>
 <td colspan=2 align=center><input type=submit name=submit value=Alta></td>
 <td align=center><input type=submit name=submit value=Modificar></td></tr>

</form>
</div>
";
?>