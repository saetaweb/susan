<?php

//Iniciamos Una Sesion
session_start();

//Cargamos la Libreria Usuario para poder ejecutar sus diferentes metodos.
require_once 'class/Usuario.php';

//Verificamos que exista una sesion para procesar este script mediante
//el metodo estatico check_valid_user, si no existiese una sesion
//redireccionar a la pagina de login.
Usuario::check_valid_user();

//Creamos nombre de variables cortos, que capturen los datos que vienen via POST.
$old_pass=$_POST['old_pass'];
$new_pass=$_POST['new_pass'];



//Instancia de Objeto Usuario.
$obj= new Usuario();


//Si el metodo cambiar_pass fue ejecutado correctamente, entonces.....
if ($obj->cambiar_pass($_SESSION['valid_user'], $old_pass, $new_pass))
{

	//Mensaje que confirma que la Contraela se ha cambiado OK.
 	echo "<script type='text/javascript'>
	 alert ('Clave Cambiada Correctamente.');
	 window.location='miembros.php';
	 </script>";
}
else
{
	//Avisa al Usuario que no se ha podido cambiar la Clave.
	echo "<script type='text/javascript'>
	 alert ('No se Pudo Cambiar la Clave.');
	 window.location='cambiar_pass_form.php';
	 </script>";
}
?>
