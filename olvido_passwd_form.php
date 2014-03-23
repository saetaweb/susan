<html>

<head>		
	<title>Olvidaste tu contraseña??</title>
	
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
		
			<h2>Recupera tu contraseña</h2>
			
   <br>
   <form action="olvido_passwd.php" method="post">
   <table width=250 cellpadding=2 cellspacing=0 bgcolor=#cccccc>
   <tr><td>Escribe tu nombre de usuario</td>
       <td><input type="text" name="username" size="16" maxlength="16"></td>
   </tr>
   <tr><td colspan=2 align=center><input type="submit" value="Change password">
   </td></tr>
   </table>
   </form>
   <br>
   
   
	<?php include('includes/footer.php'); ?>	
	
		</div>	
		<!-- Fin contenedor general-->
</body>

</html>