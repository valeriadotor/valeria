<?php
require('librerias.php');
$idu=$_COOKIE['id_usuario'];
$acceso=$_COOKIE['acceso'];
$tipo=$_COOKIE['tipo'];
if($idu=="" or $acceso=="")
{	print "<meta http-equiv='refresh' content='0; url=index.php?msg='>";
    exit;
}
if($tipo==="3")
{
    ?>
    <div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>Sistema Escolar</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><b>Inicio</b></a></li>
                <li><a href="muestra_materias.php"><b>Materias Asignadas</b></a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<?php
    require_once('bd.php');
    $sql="select * from usuario where id=$idu";
    $consulta=mysql_query($sql) or die ("error de consulta $sql");
    $idu=mysql_result($consulta, 0, 'id');
    $nombre=mysql_result($consulta, 0, 'Nombre');
	$nombre=ucwords("$nombre");
    $Ap=mysql_result($consulta, 0, 'ApellidoPaterno');
    $Ap=ucwords("$Ap");
    $Am=mysql_result($consulta, 0, 'ApellidoMaterno');
    $Am=ucwords("$Am");

    echo" Bienvenido maestro:<b>$nombre $Ap $Am";
}
if($tipo==="1")
{
    ?>
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>Sistema Escolar</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><b>Inicio</b></a></li>
                    <li class="active"><a href="testUsuario.php"><b>Administraci&oacute;n <br> Usuario</b></a></li>
                    <li><a href="testMateria.php"><b>Administraci&oacute;n <br> Materia</b></a></li>
                    <li><a href="testGrupo.php"><b>Administraci&oacute;n <br> Grupos</b></a></li>
                    <li><a href="TestMateria1.php"><b>Agregar Materias <br>A Maestros</b></a></li>
                    <li><a href="agregaalumno.php"><b>Agregar Alumnos <br>A Grupos</b></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
<?php    
    require_once('bd.php');
    $sql="select * from usuario where id=$idu";
    $consulta=mysql_query($sql) or die ("error de consulta $sql");
    $idu=mysql_result($consulta, 0, 'id');
    $nombre=mysql_result($consulta, 0, 'Nombre');
	$nombre=ucwords("$nombre");
    $Ap=mysql_result($consulta, 0, 'ApellidoPaterno');
    $Ap=ucwords("$Ap");
    $Am=mysql_result($consulta, 0, 'ApellidoMaterno');
    $Am=ucwords("$Am");
    echo" Bienvenido administrator:<b>$nombre $Ap $Am";
}
?>