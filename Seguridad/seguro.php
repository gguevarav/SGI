<!--
	Con este archivo validamos que haya una sesión activa
	Martes, 27 de marzo del 2018 11:13 Am
-->
<!DOCTYPE html>
<html>
    <head>
		<title>SGI</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
			//Reanudamos la sesión
			@session_start();
			//Validamos si existe realmente una sesión activa o no
			if(empty($_SESSION["NombreUsuario"])){
				//Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
				header("Location: index.php");
				exit();
			}
		?>
    </body>
</html>