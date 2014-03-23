<html>

<head>		
	<title>Registra un Nuevo Usuario</title>
	
	<!-- Estilo CSS para formatear el mensaje de error. -->
	<link type="text/css" href="css/estilos-plugin-validate.css" rel="stylesheet"/>
	
	<!-- Libreria Jquery -->
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	
	<!-- Plugin para Validar Formularios -->
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	
	<!-- Script de  Funciones que permiten validar los distintos Formulariow Web de Nuestro Site.-->
	<script type="text/javascript" src="js/valida-form-site.js"></script>	
			
</head>

<body onLoad="document.frmNewUser.reset(); document.frmNewUser.email.focus();">

	<!--Inicio contenedor general-->
	<div id="wrapper">
	

		<?php include ('includes/header.php'); ?>
		
			<h2>Registrar Nuevo Usuario :</h2>
			
			<form id="frmNewUser" name="frmNewUser" method="post" action="registra_usuario.php">
 			<table bgcolor=#cccccc>
   			<tr>
     		<td>Direcci&oacute;n email:</td>
     		<td><input type="text" id="email" name="email" size="30" maxlength="100"></td></tr>
   			<tr>
     		<td>Nombre usuario preferido:</td>
     		<td valign=top><input type="text" id="usuario" name="usuario"
                     size="16" maxlength="16"></td></tr>
   			<tr>
     		<td>Contrase&ntilde;a :</td>
     		<td valign=top><input type="password" id="pass" name="pass"
                     size="16" maxlength="16"></td></tr>
   			<tr>
     		<td>Confirmar contrase&ntilde;a:</td>
     		<td><input type="password" id="pass2" name="pass2" size="16" maxlength="16"></td></tr>
   			<tr>
     		<td colspan=2 align=center>
     		<input type="submit" value="Registrar"></td></tr>
 			</table>
			</form>	
	<?php include('includes/footer.php'); ?>	
	
		</div>	
		<!-- Fin contenedor general-->
</body>

</html>