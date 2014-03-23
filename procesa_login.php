<?php

//Iniciamos Una Sesion.
session_start();

//Cargamos la Libreria Usuario para poder ejecutar sus metodos correspondientes.
require_once 'class/Usuario.php';

	
//Creamos nombre de variables cortos, que capturen los datos que vienen via POST.

$usuario=$_POST['usuario'];
$pass=$_POST['pass'];

//Instanciamos el Objeto Usuario, el cual encapsula los metodos necesarios para la autenticacion del User.
$obj= new Usuario();


if ($obj->login($usuario, $pass) )	
{	
	//Almacenamos en una variable de Sesion el Nombre del Usuario.
	$_SESSION['valid_user']=$usuario;
	
	//Mensaje de Bienvenida y Redireccionamos ala Pagina Principal del Site. 	
	echo "<script type='text/javascript'>
	alert ('Bienvenido');
	window.location='miembros.php';
	</script>";
}
else
{
	//Mensaje de Login Incorrecto.
	echo "<script type='text/javascript'>
	alert ('Usuario y Clave Incorrectos.');
	window.location='index.php';
	</script>";
}
?>