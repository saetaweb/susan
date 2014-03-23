<?php

/**
 * Clase que Gestiona la Conexion a Nuestra Base de Datos.
 * Asi como tambien datos de nuestro Server.
 * Reemplazar los parametros por los de su Server.
*/
class Conexion {
    /*
	public static function db_connect() 
	{
		$conexion=mysql_connect("localhost","elvis","siouxsie") or die("No se pudo conectar a la base de datos");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("compartelinks");
		return $conexion;
	}	
	*/
	
	//Metodo Estatico que permite conectarnos a una Bd en particular.
    public static  function db_connect() {
     	
		//Instancia objeto de la clase mysqli, le pasamos en el constructor 
		//Nombre del Server, Usuario y contraseña.
        $mysqli= new mysqli('localhost','elvis','siouxsie');
		
		//Seleccionamos la BD a la cual nos vamos a conectar.
        $mysqli->select_db('compartelinks');
        
		//Retornamos el objeto mysqli.
        return $mysqli;     
    }
	
}
?>
