<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
	//Valida que se hayan capturado los datos
	//include('conexion.php');
	if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
		isset($_POST['duracion']) && !empty($_POST['duracion']) &&
		isset($_POST['genero']) && !empty($_POST['genero']) &&
		isset($_POST['director']) && !empty($_POST['director']) &&
		isset($_POST['año']) && !empty($_POST['año'])){

		$servidor = "localhost";
		$usuario = "AdministradorPeliculas";
		$password = "Passwordpelis";
		$BD = "PELICULAS";

		$nombre = $_POST['nombre'];
		$duracion = $_POST['duracion'];
		$genero = $_POST['genero'];
		$director = $_POST['director'];
		$año = ['año'];

		$conexion = mysql_connect($servidor,$usuario,$password) or
		die('Problemas de conexion con la base de datos');

		//Traemos la base de datos
		$baseDatos = mysql_select_db($BD,$conexion) or die('Problemas en conexion');

		//Inserte en la base de datos
		if(!$baseDatos){
			die('No se puede usar la base de datos '.mysql_error($conexion));
		}
		else{
			mysql_query('INSERT INTO pelicula(nombre,duracion,genero,director,año) VALUES('$nombre','$duracion','$genero','$director','$año')',$conexion);

			echo "<p>Datos insertados en la base de datos!!!</p>";
			echo "<p><a href='Registrar.html'>Registrar datos nuevamente</a></p>";
		}
	}
	else{
		echo "<p>Problemas al ingresar los datos!!!</p>";
	}

?>
<p>Pulsa <a href='Registrar.html'>aqui</a> para volver a ingresar los datos</p>
</body>
</html>