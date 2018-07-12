<!DOCTYPE html>
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
	$resultadoConsulta = mysql_query($consulta) or die('Consulta fallida: '.mysql_error());

	//Comprobar que realmente existen registros con base al filtro
	if($existe = mysql_num_rows($resultadoConsulta) > 0){
		$consultaEliminar = "delete from pelicula where nombre = '$nombre'";
		$resultadoEliminar = mysql_query($consultaEliminar) or die('Consulta fallida: '.mysql_error());
		echo "'<p>El registro se eliminó exitosamente</p>'";
	}
	else{
		echo "'El registro que decea eliminar no existe o fue ingresado incorrectamente'";
	}

	mysql_free_result($resultadoConsulta);

	//Cerramos la conexion
	mysql_close();

	?>
<a href = 'eliminar.html'>Regresar</a>
</body>
</html>