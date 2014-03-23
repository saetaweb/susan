<?php
	//Iniciamos una Sesion.
	session_start();
	
	//Cargamos la Libreria LINK para poder utilizar los diferentes metodos
	require_once 'class/Link.php';
	
	//Cargamos la Libreria Usuario para poder utilizar el metodo estatico check_valid_user.
	require_once 'class/Usuario.php';
	
	//Verificamos que para se pueda procesar este script, un usuario tiene que estar logueado, esto
	//lo hacemos mediante el metodo estatico check_valid_user().
	//Si no  estuviese logueado; es decir si no existe una sesion este método redirecciona ala pagina de Login.
	Usuario::check_valid_user();		
?>
<html>

<head>
	<title>CompartELinks</title>
		<link rel="stylesheet" href="css/dataTable.css" media="screen">	
	<!-- jquery packed -->
	<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
	<!-- tableRowCheckboxToggle -->
	<script type="text/javascript" src="js/tableRowCheckboxToggle.js"></script>

</head>


<body>
		
		<?php include('includes/header.php'); ?>
	
		<h2>URLs Recomendadas.</h2>
		Bienvenido: <?php echo $_SESSION['valid_user']; ?>
		<br />
		<br />
		<table border="0" cellspacing="0" cellpadding="0" class="dataTable">
			<thead>
				<tr>
					<th class="dataTableHeader">Recomendaciones</th>
				</tr>
			</thead>
			
								
			<tbody>
			<?php
				
			//Instancia del Objeto Links
			$obj = new Link();
			
			//Ejecutamos el metodo recomendar_urls de la clase Link,
			//Este metodo devuelve un array con los registros encontrados.
			//El resultado devuelto lo almacenamos en la variable $url_array
			$url_array=$obj->recomendar_urls($_SESSION['valid_user'],1);
			
			//Si el resultado devuelto es un Array y si el array contine mas de un elemento, entonces....
			if (is_array($url_array) and count($url_array))
			{	
				
				//Recorremos el array mediante el bucle foreach, y en cada iteraccion llenamos la tabla HTML.
				foreach ($url_array as $url)
				{
				?>
				<tr class="odd_row">								
				<td>
			
				<a href="<?php echo $url;?>" target="_blank" title="Ir a La Pagina."> <?php echo $url;?>	</a>					
				</td>	
				<?php
				}//Fin foreach.
			}
			else
				//Si el array no contiene registros, mostramos al usuario un pequeño mensaje.
			 echo "<tr><td><strong>No Hay Links para Recomendarle en estos momentos.<br></strong></tr>";
			?>						
			</tbody>		
		</table>
	
		<?php include('includes/menu_2.php'); ?>
	
		<?php include('includes/footer.php'); ?>				
	</div>
	<!-- Fin contenedor general-->
</body>
</html>