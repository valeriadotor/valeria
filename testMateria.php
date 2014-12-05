<?php

require ('Materia.php');
require ('menu.php');

require('bd.php');

$materia = new materia();

if (isset($_POST['submit']))
{
    switch($_POST['submit'])
    {
       case"Alta":
           $materia->createMateria("$_POST[id]","$_POST[Nombre]");
       break;
       case"Borrar";
           $materia->deleteMateria($_POST['id']);
       break;
       case"Modificar":
           $materia->updateMateria("$_POST[id]","$_POST[Nombre]");
       break;
    }
  }

$materia ->readMateriaG();
echo"
<div>
<form name=alumno action=testMateria.php method=Post>
<table>
<tr><td><b>Clave:</td><td><input type=text name=id></td>
 <td align=center><input type=submit name=submit value=Borrar></td></tr>
<tr><td><b>Nombre Materia:</td><td colspan=2><input type=text name=Nombre></td></tr>
 <td colspan=2 align=center><input type=submit name=submit value=Alta></td>
 <td align=center><input type=submit name=submit value=Modificar></td></tr>
</form>
</div>
";
?>