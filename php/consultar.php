<html>

	<head>
		<meta charset="utf-8">
	</head>
	
	<body>

	<?php
	$nombre = $_POST['nombre'];

	$servidor = "localhost";
	$usuario = "AdministradorPeliculas";
	$password = "Passwordpelis";
	$baseDatos = "PELICULAS";

	//Instrucción para conectar a la base de datos
	$conexion = mysql_connect($servidor,$usuario,$password)
	or die('No se pudo realizar la conexión: '.mysql_error());
	echo "'<p>Conexión Exitosa</p>'";

	mysql_select_db($baseDatos) or die('No se puede establecer la conexión con la base de datos');

	$consulta = "select * from pelicula where nombre = '$nombre'";

	$resultado = mysql_query($consulta) or die('Consulta fallida: '.mysql_error());

	echo "<table>\n";
	while ($datos = mysql_fetch_array($resultado,MYSQL_ASSOC)) {
		echo "\t<tr>\t";
		foreach ($datos as $col_value) {
			echo "\t<td>\t".$col_value."</td>\n";
		}
		echo "\t</tn>\n";
	}

	echo "</table>\n";

	//liberamos el resultado de la consulta
	mysql_free_result($resultado);

	//Cerramos la conexion
	mysql_close();

	?>
	<a href='Consultar.html'>Regresar</a>
	</body>
</html>