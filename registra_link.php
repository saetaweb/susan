<?php
//Iniciamos Una Sesion.
session_start();

//Cargamos la Libreria Usuario para poder ejecutar sus diferentes metodos.
require_once 'class/Usuario.php';

//Cargamos la Libreria LINK para poder ejecutar sus diferentes metodos.
require_once 'class/Link.php';

//Verificamos que exista una sesion para procesar este script mediante
//el metodo estatico check_valid_user, si no existiese una sesion
//redireccionar a la pagina de login.
Usuario::check_valid_user();


  
//Instancia de Objeto Usuario y ejecutamos el  metodo.
$obj= new Link();
$new_url=$_POST['new_url'];
		
//Comprobamos que el URL Introducido Sea único para un usuario en particular,
if ($obj->existe_url($_SESSION['valid_user'], $new_url))
{			
	//Mensaje de aviso al Usuario que  el Link ingresado ya lo tenemos......			
    echo "<script type='text/javascript'>
		alert ('Usted ya Tiene Registrado el Link que acaba de Ingresar. Ingrese Otro.');
		window.location='registra_link_form.php';
		</script>"; 	      
}
else
{
	//Ejecutamos el metodo insert_url de la clase insert_url.
	if ($obj->insert_url($_SESSION['valid_user'], $new_url))
	{
		//Mensajde Confirmacion al Usuario.
		echo "<script type='text/javascript'>
			alert ('El Link Fue Registrado Correctamente.');
			window.location='registra_link_form.php';
			</script>";
	}
	else
	{
		//Mensaje que no se pudo Registrar.
		echo "<script type='text/javascript'>
			alert ('No se Pudo Registrar.');
			window.location='registra_link_form.php';
			</script>";
	}
					
}		   

?>