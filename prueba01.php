<?php
//Cargamos la Libreria Usuario, para poder utilizar sus metodos.
/**/
require_once 'class/Usuario.php';
/*print_r($_POST);*/


/*//Creamos nombre de variable para almacenar los datos que vienen via POST. 
$nom_usuario=$_POST['username'];
*/
$nom_usuario="luis";

/*//Instancia del Objeto Usuario.*/
$obj=new Usuario();

$pachito = $obj->get_random_word(6, 25);

echo "$pachito<br>";

$condorito = $obj->reset_password($nom_usuario);

if($condorito)
{
	echo "$condorito";
}
else
{
	echo "pailas";
}



/*if($el_new_password = $obj->reset_password($nom_usuario))
if($obj->reset_password($nom_usuario))
{	*/
	/*el bloque comentado aqui solo se puede probar si la aplicacion esta en un hosting remoto
	debido a que notifypassword envia un correo electronico a un e-mail real.
	if($obj->notify_password($nom_usuario, $el_new_password))
	{
		echo "Tu nueva Contrase�a ha sido enviada a tu direcci�n email.";
	}
	else
	{
		echo "Tu contrase�a no ha podiso ser enviada por email."
           ." Prueba pulsando actualizar.";
	}*/
	
	/*este bloque no usa envio de Email, y en local lo podemos probar
	echo "CONTRASE�A MODIFICADA EXISTOSAMENTE!!!";
	
}
else
{
	echo "Tu contrase�a no ha podido modificarse - Prueba de nuevo m�s tarde por favor.";
}
*/

?>
