<?php

require ('Grupo.php');
require ('menu.php');

require('bd.php');

$materia = new grupo();

if (isset($_POST['submit']))
{
    switch($_POST['submit'])
    {
       case"Alta":
           $materia->createGrupo("$_POST[id]","$_POST[Nombre]");
       break;
       case"Borrar";
           $materia->deleteGrupo($_POST['id']);
       break;
       case"Modificar":
           $materia->updateGrupo("$_POST[id]","$_POST[Nombre]");
       break;
    }
  }

$materia ->readGrupoG();
echo"
<div>
<form name=alumno action=testGrupo.php method=Post>
<table>
<tr><td><b>Clave:</td><td><input type=text name=id></td>
 <td align=center><input type=submit name=submit value=Borrar></td></tr>
<tr><td><b>Nombre Grupo:</td><td colspan=2><input type=text name=Nombre></td></tr>
 <td colspan=2 align=center><input type=submit name=submit value=Alta></td>
 <td align=center><input type=submit name=submit value=Modificar></td></tr>
</form>
</div>
";
?>