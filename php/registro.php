<?php
if (!isset($_SESSION)) {
	session_start();
}
$_SESSION['location'] = "registro";

?>

<div class="prelogin">
<label class="logLabelLeft">Ingrese Correo *:</label>
<input class="logInput" name="email" type="email" placeholder="juan.perez@davinci.edu.ar">
<label class="logLabelLeft">Ingrese Clave:</label>
<input class="logInput" name="pass" type="password" placeholder="Ingrese contrase&ntilde;a">
<label class="logLabelLeft">Repita Clave:</label>
<input class="logInput" name="pass2" type="password" placeholder="Repita contrase&ntilde;a">
<label class="regLabelNota" title="Para poder registrarse debe poseer correo electrónico de la institución">* Para poder registrarse debe poseer correo @davinci.edu.ar</label>
<label id="regErrorNot" class="regLabelNota regError"></label>
<input class="logInBtn" type="submit" value="Registrarme">
</div>
<div class="loading">
<img alt="" src="imagenes/loading.gif" width=30>
</div>




