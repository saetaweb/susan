<?php
/*require_once 'class/Usuario.php';
		
        $obj= new Usuario();

        if ($obj->existe_usuario('jose'))
            echo "El Nombre de Usuario ya Existe";
        else
            $obj->insert_usuario('jose','jose','luis');
            echo "Correctamente";
*/
/*
require_once 'class/Link.php';
$obj = new Link();

$success=$obj->delete_url('luis', 'http://www.hotmail.com');
*/

require_once 'class/Link.php';
$obj = new Link();

$listado=$obj->recomendar_urls('luis',1);

foreach ($listado as $url){
	echo $url;
	echo "<br>";
}
/*
$listado=$obj->get_url_usuario('luis');


foreach ($listado as $url){

	echo $url;
	echo "<br>";
}<?php */

/*if ($obj->existe_url('luis', 'http://www.hotmail.com')){
	echo "Ya has registrado una URL con ese Nombre. Intenta con Otra.";
	exit;
}

$ok=$obj->insert_url('luis', 'http://www.hotmail.com');

if ($ok==true)
	echo "Se ha Registrado Correctamente";
else
	echo "No se Pudo Grabar.";
	*/
?>





