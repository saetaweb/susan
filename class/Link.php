<?php
/**
 * Clase que Encapsula los metodos para insertar nuevos enlaces, eliminar enlaces,
 * obtener enlaces por Usuario, asi como tambien el metodo que permite recomendarnos
 * enlaces, dependiendo de los gustos de otros usuarios.
*/

require_once 'class/Conexion.php';

class Link {

	//Metodo que permite verificar si una url existe.
	public function existe_url($usu, $url){
		
		//Conexion
		$conn=Conexion::db_connect();
		
		/*version SIN stored procedure*/
		$result=$conn->query("select url from links where nom_usuario='$usu' and url='$url'");
		
		/*version con STORED PROCEDURE
		$result=$conn->query("call usp_ExisteUrl('$usu','$url')");*/
		
		//Si no se pudo ejecutar retornar false.
		if (!$result)
			return false;
		
		//Si hay mas de un registro, el usuario existe.
		if ($result->num_rows>0)
			return true;//Usuario existe
		else
			return false;	//Usuario no existe
	}
	
	//Metodo para Insertar una Nueva URL en la Base de Datos.
	public function insert_url($usu, $url){
	
		$conn=Conexion::db_connect();
		
		/*version SIN stored procedure*/
		$result=$conn->query("insert into links values ('$usu', '$url')");
		
		/*version con STORED PROCEDURE
		$result=$conn->query("call usp_InsertaLink('$usu','$url')");*/
		
		if (!$result)
			return false;
		else
			return true;		
	}
	
	//Metodo para eliminar una url de la Base de Datos.
	public function delete_url($usu, $url){
		
		$conn=Conexion::db_connect();
		
		/*version SIN stored procedure*/
		$result=$conn->query("delete from links where nom_usuario='$usu' and url='$url'");
		
		/*version con STORED PROCEDURE
		$result=$conn->query("call usp_DeleteLink('$usu','$url')");*/
				
		if (!$result)
			return false;
		else
			return true;
	}
	
	//Metodo que nos permite obtener las Url de un determinado Usuario.
    public function get_url_usuario($usu) {

        $conn=Conexion::db_connect();

        /*version SIN stored procedure*/
		$result=$conn->query("select url from links where nom_usuario='$usu'");
		
		/*version con STORED PROCEDURE
		$result=$conn->query("call usp_GetUrlUsuario('$usu')");*/

        if (!$result)
            return false;

        /*$link_array=array();
		
		while ($reg=$result->fetch_assoc()){
			
			$link_array[]=$reg;
		}
		return $link_array;
		*/
		  $url_array = array();
  		  for ($count = 1; $row = $result->fetch_row(); ++$count)
  		  {
    		$url_array[$count] = $row[0];
  		  }
  			return $url_array;	
    }
	
	//Metodo que nos permite recibir recomendaciones de url, por afinidad de url de otros usuarios.
	public function recomendar_urls($usu, $popularidad=1)
	{
		 $conn=Conexion::db_connect();
		 
		 /*version SIN stored procedure  de esta forma no funciona y no entiendo por que...:(
		 $sqlconsulta = "select url from links where nom_usuario in (select  distinct (l2.nom_usuario) from links l1, links l2 where l1.nom_usuario = '$usu' and l1.nom_usuario != l2.nom_usuario and l1.url = l2.url) and url not in (select url from links where nom_usuario='$usu') group by url having count(url)> $popularidad"
		 
		 $result=$conn->query('$sqlconsulta');*/
		 
		 /*version SIN stored procedure*/
		 $result=$conn->query("select url from links where nom_usuario in (select  distinct (l2.nom_usuario) from links l1, links l2 where l1.nom_usuario = '$usu' and l1.nom_usuario != l2.nom_usuario and l1.url = l2.url) and url not in (select url from links where nom_usuario='$usu') group by url having count(url)> $popularidad");
		 
		 /*version con STORED PROCEDURE
		 $result=$conn->query("call uspRecomendarUrls('$usu',$popularidad)");*/
		 
		 if (!$result)
		 	return false;
		
		$urls=array();
		
		for ($i=0; $row=$result->fetch_object(); $i++)
		{
			$urls[$i]=$row->url;	
		}
		return $urls;	
	}	
}
?>
