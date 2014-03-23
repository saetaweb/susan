<?php
//Cargamos la Libreria Usuario, para poder utilizar sus metodos.
/**/
require_once 'class/Usuario.php';
/*print_r($_POST);*/

//Creamos nombre de variable para almacenar los datos que vienen via POST. 
$nom_usuario=$_POST['username'];

/*//Instancia del Objeto Usuario.*/
$obj=new Usuario();


/*ESTA ES LA VERSION PARA PRUEBAS EN HOSTING LOCAL, ES DECIR DESACTIVANDO EL METODO "notify_password()"
QUE SOLO TIENE SENTIDO EN LA VERSION DE HOSTING REMOTO POR EL ENVIO DEL EMAIL DE NOTIFICACION*/

if($obj->verify_user_password_reset($nom_usuario))
{
		if($obj->reset_password($nom_usuario))
		{	
			echo "<script type='text/javascript'>
			 alert ('Contraseña modificada exitosamente. Inicie Sesion.');
			 window.location='index.php';
			 </script>";	
		}
		else
		{	
			echo "<script type='text/javascript'>
			 alert ('Tu contraseña no ha podido modificarse - Prueba de nuevo más tarde por favor.');
			 window.location='index.php';
			 </script>";	
		}
}
else
{
	echo "<script type='text/javascript'>
	 alert ('El usuario solicitado no exite en nuestro sistema.');
	 window.location='index.php';
	 </script>";
}


/*FIN VERSION DE PRUEBA PARA HOSTING LOCAL*/




/*VERSION FINAL PARA HOSTING REMOTO

if($el_new_password = $obj->reset_password($nom_usuario))
{	
	if($obj->notify_password($nom_usuario, $el_new_password))
	{
			echo "<script type='text/javascript'>
		 alert ('Tu nueva Contraseña ha sido enviada a tu dirección email.');
		 window.location='index.php';
		 </script>";
	}
	else
	{
		echo "<script type='text/javascript'>
		 alert ('Tu contraseña no ha podido modificarse - Prueba de nuevo más tarde por favor.');
		 window.location='index.php';
		 </script>";
	}
	
}
else
{
		echo "<script type='text/javascript'>
		 alert ('Tu contraseña no ha podido modificarse - Prueba de nuevo más tarde por favor.');
		 window.location='index.php';
		 </script>";		
}

/*FIN VERSION FINAL PARA HOSTING REMOTO*/




?>
