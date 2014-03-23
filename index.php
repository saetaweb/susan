<html>

<head>
	<title>CompartELinks</title>	
	
	<!-- Estilo CSS para formatear el mensaje de error. -->
	<link type="text/css" href="css/estilos-plugin-validate.css" rel="stylesheet"/>
	
	<!-- Libreria Jquery -->
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	
	
	<!-- Plugin para Validar Formularios -->
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	
	<!-- Script de  Funciones que permiten validar los distintos Formulariow Web de Nuestro Site.-->
	<script type="text/javascript" src="js/valida-form-site.js"></script>		
</head>

<body onLoad="document.frmLogin.reset(); document.frmLogin.usuario.focus();">

	<!--Inicio contenedor general-->
	<div id="wrapper">
	
		<!--Inicio header-->
		<?php include('includes/header.php'); ?>
		<!--Fin header-->
		
		<!--Inicio Main-->
		<div id="main">
		
			<div id="info" align="left">
				 <ul>
  					<li>¡Almacena tus Links online con nosotros!
  					<li>¡Conoce los Links que usan otros usuarios!
  					<li>¡Comparte tus Links favoritos con otros!
  				</ul>
			</div>
			
			<div id="login">
				
			<a href="registra_usuario_form.php">¿No eres un miembro aún?</a>
  			<form id="frmLogin" name="frmLogin" method="post" action="procesa_login.php">
  				<table bgcolor=#cccccc>
   				<tr>
    			<td colspan=2>Miembros identificarse aquí:</td>
   				<tr>
    			<td>Nombre Usuario:</td>
     			<td><input type="text" id="usuario" name="usuario" ></td></tr>
   				<tr>
     			<td>Contrase&ntilde;a:</td>
     			<td><input type="password" id="pass" name="pass" ></td>
                </tr>
                <tr>
     			<td colspan="2"><a href="olvido_passwd_form.php">Olvido su contrase&ntilde;a??</a></td>
     			</tr>
   				<tr>
     			<td colspan=2 align=center>
     			<input type="submit" value="Iniciar Sesion"></td></tr>
 				</table>
			</form>
						
			</div>
		
		</div>
		<!--Fin Main-->
		
		
		<!--Inicio footer-->
		<div id="footer">
		
		
		</div>
		<!--Fin footer-->
				
	</div>
	<!-- Fin contenedor general-->
</body>
</html>