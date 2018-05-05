<!--
	Con este archivo realizamos la conexión a la base de datos
	los parámetros para conexión los podemos encontrar en las 
	constantes, DB_SERVER, DB_NAME, DB_USER, DB_PASS.
	Lunes 26 de Marzo del 2018 11:36 PM
-->
<!DOCTYPE html>
<html>
    <head>
        <title>SGI</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
		<?php
		   // Datos para la conexión a la base de datos.
			define('DB_SERVER', 'localhost');
			define('DB_NAME', 'bdatenas');
			define('DB_USER', 'root');
			define('DB_PASS', '');
			
			// Realizamos la conexion
			$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			
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
    </body>
</html>