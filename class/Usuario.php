<?php

/*
 * Clase que encapsula  los metodos para registrar usuario, cambiar contraseña de un usuario,
 * iniciar sesion y verificar si existe una sesion de un usuario.
*/
require_once 'class/Conexion.php';

class Usuario {


	//Metodo que verifica si un usuario existe en la Base de Datos
    public function existe_usuario($usu) {
	
        $conn=Conexion::db_connect();
		
        /*version SIN stored procedure*/
        $result=$conn->query("select nom_usuario from usuarios where nom_usuario='$usu'");

        /*version con STORED PROCEDURE
        $result=$conn->query("CALL uspExisteUsuario('$usu')");*/

        if (!$result)
            return false;

        if ($result->num_rows>0)
            return true;
        else
            return false;
    }
	
	//Metodo que nos permite registrar un nuevo usuario en la Base de Datos.
    public function insert_usuario($usu, $pass, $email) {

        $conn=Conexion::db_connect();
		
        /*version SIN stored procedure*/
		$result=$conn->query("insert into usuarios values ('$usu', '$pass', '$email')");		

        /*version con STORED PROCEDURE
		$result=$conn->query("CALL uspInsertaUsuario('$usu','$pass','$email')");*/

        if (!$result)
            return false;//No se pudo Ejecutar
        else
            return true;//Se ejecuto OK.
    }

	//Metodo que nos permite iniciar sesion a un usuario, para poder entrar a la zona de miembros del site.
    public function login($usu, $pass) {

        $conn=Conexion::db_connect();

        /*version SIN stored procedure*/
		$result=$conn->query("select nom_usuario from usuarios where nom_usuario='$usu' and clave='$pass'");

        /*version con STORED PROCEDURE
		$result=$conn->query("CALL uspIniciarSesion('$usu','$pass')");*/

        if (!$result)
            return false;//No se Pudo Ejecutar la Consulta

        if ($result->num_rows>0 )
            return true;//Inicio de Sesion OK.
        else
            return false;//Usuario o Contraseña incorrecta.
    }


	/*metodo que verifica que el usuario que se inserta en el formulario de resetear password de verdad existe en la DB
	tambien se encuentra en el metodo notify_password, pero como en la version de hosting local no se puede probar 	
	notify_password, entonces creamos este metodo provisional verify_user_password_reset()*/
	public function verify_user_password_reset($usu)
	{
		/*intenta la conexion con la DB y si hay error devuelve false*/
  		if (!($conn = Conexion::db_connect()))
      		return false;
				
		$result=$conn->query("select * from usuarios where nom_usuario = '$usu'");
		/*or die("Error encontrado: " . mysql_error())*/

  		if (!$result)
		{
			return false;
		}
  		elseif ($result->num_rows == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}




	/*Metodo que obtiene un string aleatorio para usarlo al resetear la contraseña
	cuando el usuario la ha OLVIDADO*/
	public function get_random_word($min_length, $max_length)
	{
	
   		/*seteamos a string vacio la variable $word*/
  		$word = "";

		/*guardamos en $dictionary la ruta que nos lleva al archivo externo txt del diccionario*/
  		$dictionary = "diccionario/words.txt";
  
		/*abrimos el archivo diccionario para modo lectura y guardamos en $fp*/
  		$fp = fopen($dictionary, "r");

		/* guardamos en $size el peso o la extension del archivo diccionario que acabamos de abrir y leer*/
  		$size = filesize($dictionary);


  		/*seteamos una locacion randomica para aplicarla al diccionario*/
  		srand ((double) microtime() * 1000000);
  		$rand_location = rand(0, $size);

		/*aplicamos dicha locacion al diccionario*/
  		fseek($fp, $rand_location);


		/*obtiene la siguiente palabra completa de la extension correcta en el archivo*/
  		while (strlen($word)< $min_length || strlen($word)>$max_length)
  		{
     			/*si el puntero de la lectura del diccionario se encuentra en el final del archivo*/
			if (feof($fp))
			/*entonces situa el puntero en el puro principio del archivo*/
        		fseek($fp, 0);

			/*la funcion fgets obtiene una linea desde el puntero al archivo objetivo*/			
     			$word = fgets($fp, 80);  // skip first word as it could be partial
     			$word = fgets($fp, 80);  // the potential password
  		};

		/* eliminamos espacios en blanco indeseados en nuestro $word*/
  		$word=trim($word); 

		/*por ultimo la funcion devuelve nuestro $word ya procesado*/
  		return $word;

	}

	

	//Metodo que permite resetear la contraseña de un usuario que la ha OLVIDADO.
	public function reset_password($usu)
	{
	
  		/*llamado al metodo get_random_word*/
		$new_password = self::get_random_word(6, 25);


		/*añade un numero randomico entre 0 y 999 para hacer mas compleja
		y segura la contraseña*/
  		srand ((double) microtime() * 1000000); //<- esta linea no la entiendo...
  		$rand_number = rand(0, 999);
  		$new_password .= $rand_number;


		/*intenta la conexion con la DB y si hay error devuelve false*/
  		if (!($conn = Conexion::db_connect()))
      		return false;
			
		/*$conn=Conexion::db_connect();*/
			
		$result=$conn->query("update usuarios set clave = '$new_password' where nom_usuario = '$usu'");
		/*or die("Error encontrado: " . mysql_error())*/

  		/*si hay algun problema devuelve false*/
		if (!$result)
    			return false;
		/*si todo sale bien devuelve el nuevo password*/   
  		else   
		return $new_password; 
	}	



	/*notifica al usuario que su password ha sido cambiado*/
	public function notify_password($username, $password)
	{
    		/*si hay error en la conexion a la DB, devuelve false*/
		if (!($conn = db_connect()))
      			return false;


		/*peticio SQL a la DB*/
    		$result = mysql_query("select email from user where username='$username'");


    		/*si hay un error en la peticion devuelve false*/
		if (!$result)
      			return false;  // not changed


		/*si el output de la consulta es igual a 0 
		es decir, el usuario no esta en la DB
		tambien devuelve false*/
    		else if (mysql_num_rows($result)==0)
      		return false; // username not in db

    		
		/*si todo va bien, envia el mensaje al usuario*/
		else
    		{
      			$email = mysql_result($result, 0, "email");/* <-- DUDITAS ACA*/
      			$from = "From: saetaweb@gmail.com \r\n";
      			$mesg = "Tu contraseña de CompartElinks ha sido cambiado a $password \r\n"
              		."Por favor utilízalo la próxima ver que hagas log in. \r\n";

      		if (mail($email, "login información de CompartElinks", $mesg, $from))

        		return true;
      		else
        		return false;
    		}
	}





	
	//Metodo que permite cambiar la contraseña de un usuario.
	public function cambiar_pass($usu, $old_pass, $new_pass){
	
		 if ($this->login($usu, $old_pass))
		 {
		 	$conn=Conexion::db_connect();
				
		 	/*version SIN stored procedure*/
			$result=$conn->query("update usuarios set clave='$new_pass' where nom_usuario='$usu'");
			
			/*version con STORED PROCEDURE
			$result=$conn->query("CALL uspCambiarPass('$usu','$new_pass')");*/
			
			if (!$result)
				return false;//No Se Pudo Cambiar la Contraseña.
			else
				return true; //Contraseña Cambiada OK.
		 }
		 else	
			return false;	
	}	
	
	//Metodo Estatico que verifica si un Usuario se encuentra logueado, si no fuese el caso
	//redirecciona ala pagina de login para hacerlo.	
	public static function check_valid_user()
	{
		
		//Si No existe la Variable de Sesion valid_user.
		if (!isset($_SESSION['valid_user']))
		{	
			//Redireccionamos al Usuario a la Pagina Principal.
			header('Location: index.php');
		}
	}	
}
?>
