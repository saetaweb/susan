<?php

//Iniciamos la Sesion Actual
session_start();

/*
//Eliminamos por completo la variable de sesion valid_user.
session_unregister('valid_user');

//Destruimos la sesion actual.
session_destroy();
*/
    /*esta forma de vaciar si es mucho mejor*/
    $_SESSION = array();

    /*luego usamos SESSION DESTROY y listo.*/
    session_destroy();

//Por ultimo redireccionamos al usuario a la pagina principal del site.
header('Location: index.php');

?>