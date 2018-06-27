<?php
   // Datos para la conexión a la base de datos.
	define('DB_SERVER', 'localhost');
	define('DB_NAME', 'BDBomberos');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	
	// Realizamos la conexion
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$mysqli->query("SET NAMES 'utf8'");
	
	// Por si hay error en la conexion
	if ($mysqli->connect_errno)
	{
		echo "Falló la conexión debido a: " . $mysqli->connect_errno . "\n";
		exit;
	}
	// La conexión fué realizada con éxito
	else{
		//echo "Conexion realizada con éxito";
	}
?>