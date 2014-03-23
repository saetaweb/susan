<?php
//Iniciamos la Sesion Actual,
session_start();

//Cargamos la libreria LINK para poder ejecutar sus metodos.
require_once 'class/Link.php';

//Cargamos la libreria LINK para poder ejecutar el metodo estatico check_valid_user().
require_once 'class/Usuario.php';

//Verificamos que exista una sesion para procesar este script mediante
//el metodo estatico check_valid_user, si no existiese una sesion
//redireccionar a la pagina de login.
Usuario::check_valid_user();

//Instancia Objeto de Tipo Link
$obj= new Link();

//Creamos un Array con las URL selecciondas desde la pagina anterior.
$url_array=$_POST['del_url'];

//Si se han seleccionado por lo menos un CheckBox, Entonces......
if (count($url_array) >0)
{	  
		
		//Recorremos el array y en cada iteraccion, eliminar url seleccionadas.
		foreach($url_array as $url)
		{	
	   		$obj->delete_url($_SESSION['valid_user'],$url); 	
		}	 
	
	//Mensaje de Confirmacion.
	echo "<script type='text/javascript'>
	 	alert ('Los Links Seleccionados Fueron Borrados.');
	 	window.location='miembros.php';
	 	</script>";		
}
else
   //Mensaje por Si no ha seleccionado ningun link, e intenta eliminar.
  echo "<script type='text/javascript'>
	 	alert ('No Hay Ningún Link Seleccionado para Borrarse.');
	 	window.location='miembros.php';
 	  </script>";
?>