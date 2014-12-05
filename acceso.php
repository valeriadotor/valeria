<?php
include ('desencripta.php');
?><?php
if($_GET)
{
decode_get($_SERVER["REQUEST_URI"]);
$idu=$_GET['idu'];
$adm=$_GET['admon'];
$tipo=$_GET['tipo'];
if ($tipo=="3")
	{
	SetCookie('id_usuario', $idu);
	SetCookie('acceso', 1);
	SetCookie('tipo',$tipo);
	session_start();
	$_SESSION['id_usuario']=$idu;
	$_SESSION['tipo']=$tipo;
	$_SESSION['acceso']=1;
	print "<meta http-equiv='refresh' content='0; url=menu.php'>";
	}
	else
	{
        SetCookie('id_usuario', $idu);
        SetCookie('acceso', 1);
        SetCookie('tipo',$tipo);
        session_start();
        $_SESSION['id_usuario']=$idu;
        $_SESSION['tipo']=$tipo;
        $_SESSION['acceso']=1;
	print "<meta http-equiv='refresh' content='0; url=menu.php'>";
	exit;
	}
	}
?>