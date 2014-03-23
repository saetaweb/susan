<?php
session_start();
require_once 'class/Usuario.php';

//Verificamos que exista una sesion para procesar este script mediante
//el metodo estatico check_valid_user, si no existiese una sesion
//redireccionar a la pagina de login.
Usuario::check_valid_user();
?>

<html>

<head>
	<title>Cambiar Contraseña</title>
	<script type="text/javascript" src="js/valida-form-site.js"></script>
</head>

<body onload="document.frmChangePass.reset();document.frmChangePass.old_pass.focus();">

	<!--Inicio contenedor general-->
	<div id="wrapper">
	
	
		<?php include ('includes/header.php'); ?>
		
		<h2>Cambiar Contraseña</h2>
		
   			<form name="frmChangePass" action="cambiar_pass.php" method=post>
   			<table width=250 cellpadding=2 cellspacing=0 bgcolor=#cccccc>
   			<tr><td>Vieja Contrase&ntilde;a:</td>
       		<td><input type=password name=old_pass size=16 maxlength=16></td>
   			</tr>
   			<tr><td>Nueva Contrase&ntilde;a:</td>
       		<td><input type=password name=new_pass size=16 maxlength=16></td>
   			</tr>
   			<tr><td>Repite Nueva Contrase&ntilde;a:</td>
       		<td><input type=password name=new_pass2 size=16 maxlength=16></td>
   			</tr>
   			<tr><td colspan=2 align=center><input  type="button" value="Cambiar Contraseña" onclick="validar();">
   			</td></tr>
   			</table>
			</form>
  			 <br>
		<?php include('includes/menu_2.php'); ?>
   
		<?php include("includes/footer.php");?>	
	</div>
	<!--Fin contenedor general-->	
</body>