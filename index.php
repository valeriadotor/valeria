<fieldset align="center">
    <legend><h3>Acceso al Sistema</h3></legend>
    <form action='valida.php' method="POST" class="login">
        <br><div><label>Username</label>
            <input class='rounded user' name="nombre" type="text" style='width:200px;' placeholder="Usuario"></div>
        <br>
        <div><label>Password</label>
            <input class='rounded passw' name="pass" type="password" style='width:200px;' placeholder="*********"></div>
        <br>
        <div><input name="login" type="submit" class='rounded' value="Entrar"></div>
    </form>
</fieldset>
<?php
require_once('librerias.php');
?>