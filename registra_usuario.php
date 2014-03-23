<?php
//Cargamos la Libreria Usuario, para poder utilizar sus metodos.
require_once 'class/Usuario.php';
print_r($_POST);


//Creamos nombre de variable para almacenar los datos que vienen via POST. 
$email=$_POST['email'];
$usu=$_POST['usuario'];
$pass=$_POST['pass'];


//Instancia del Objeto Usuario.
$obj=new Usuario();


//Si El Nombre de Usuario ya Existe, Avisar al Usuario...
if ($obj->existe_usuario($usu)) 
{
	 echo "<script type='text/javascript'>
	 alert ('EL Nombre de Usuario ya Esta Ocupado. Intente con Otro Nombre.');
	 window.location='registra_usuario_form.php';
	 </script>";			
}


//Insertamos el Nuevo Usuario.
if ($obj->insert_usuario($usu, $pass, $email))
{
	//Mensaje de Confirmacion
	 echo "<script type='text/javascript'>
	 alert ('Nuevo Usuario ha Sido Registrado. Inicie Sesion.');
	 window.location='index.php';
	 </script>";
}
/*
*/
?>
