<?php
	session_start();
	require_once 'class/Link.php';
	require_once 'class/Usuario.php';
		
	//Verificamos que para que se pueda procesar este script, un usuario tiene que estar logueado, esto
	//lo hacemos mediante el metodo estatico check_valid_user().
	Usuario::check_valid_user();		
?>
<html>

<head>
	<title>CompartELinks</title>
		<link rel="stylesheet" href="css/dataTable.css" media="screen">
		
			
	<!-- jquery packed -->
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	<!-- tableRowCheckboxToggle -->
	<script type="text/javascript" src="js/tableRowCheckboxToggle.js"></script>
			
</head>


<body>
		
		<?php include('includes/header.php'); ?>
	
		<h2>Mis Enlaces Favoritos.</h2>
		Bienvenido:
		<?php 
		//Saludamos al Usuario.
		echo $_SESSION['valid_user']; 	
		?>
		<br/>
		<br />
		
		<form name="form" action="delete_link.php" method="post">
		
		<table border="0" cellspacing="0" cellpadding="0" class="dataTable">
			<thead>
				<tr>
					<th class="dataTableHeader">URL</th>
					<th class="dataTableHeader">Borrar</th>
				</tr>
			</thead>
			
								
			<tbody>
			<?php
				
				
				$obj = new Link();
				$url_array=$obj->get_url_usuario($_SESSION['valid_user']);	
		
				//Si el resultado devuelto es un Array y si el array contine un elemento o mas, entonces....
				if (is_array($url_array) and count($url_array) > 0)
				{
					
					//Recorremos el array mediante el bucle foreach, y en cada iteraccion llenamos la tabla HTML.
					foreach ($url_array as $url)
					{
					?>
					<tr class="odd_row">								
					<td>
					
					<a href="<?php echo $url;?>" target="_blank">
						<?php echo $url;?>	
					</a>			
					</td>	
					<td>
					<input type="checkbox" name="del_url[]" id="checkme1" value="<?php echo $url;?>">
				
					</td>					
					</tr>
					<?php
					}//Fin ForEach
				 }
				 else
				 	//Si el array no contiene registros, mostramos al usuario un pequeño mensaje.
				    echo "<tr><td><strong>No hay Enlaces o Links guardados.<br></strong></tr>";
				?>					
			</tbody>		
		</table>
	</form>	
		 
		<?php include('includes/menu.php'); ?>
	
		<?php include('includes/footer.php'); ?>				
	</div>
	<!-- Fin contenedor general-->
</body>
</html>