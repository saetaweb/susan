<?php
//Iniciamos una Sesion.
session_start();

//Cargamos la Libreria Usuario para poder utilizar el metodo estatico check_valid_user.
require_once 'class/Usuario.php';

//Verificamos que para se pueda procesar este script, un usuario tiene que estar logueado, esto
//lo hacemos mediante el metodo estatico check_valid_user().
//Si no  estuviese logueado; es decir si no existe una sesion este método redirecciona ala pagina de Login.
Usuario::check_valid_user();
?>
<html>

<head>	
	<title>Registra un Nuevo Link</title>
	
	<!-- Estilo CSS para formatear el mensaje de error. -->
	<link type="text/css" href="css/estilos-plugin-validate.css" rel="stylesheet"/>
	
	<!-- Libreria Jquery -->
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	
	<!-- Plugin para Validar Formularios -->
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	
	<!-- Script de  Funciones que permiten validar los distintos Formulariow Web de Nuestro Site.-->
	<script type="text/javascript" src="js/valida-form-site.js"></script>	
</head>

<body onLoad="document.frmNewUrl.new_url.focus();">

	<!--Inicio contenedor general-->
	<div id="wrapper">
	
		<?php include ('includes/header.php'); ?>
			
			<h2>Registra Nuevo Link</h2>
			
			<form id="frmNewUrl" name="frmNewUrl" action="registra_link.php" method=post>
			<table width=250 cellpadding=2 cellspacing=0 bgcolor=#cccccc>
			<tr><td>Nuevo Link:</td><td><input type=text id="new_url" name=new_url  value="http://"
                        size=30 maxlength=255></td></tr>
			
			<tr><td colspan=2 align=center><input type=submit value="A&ntilde;adir Link"></td></tr>
			</table>
			</form>
			
		<?php include('includes/menu_2.php'); ?>
			
		<?php include('includes/footer.php'); ?>	
	
	</div>	
		<!-- Fin contenedor general-->
</body>
</html>
