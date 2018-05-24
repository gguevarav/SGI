<!--
	Módulo de ingreso de datos al inventario
	Lunes, 23 de mayo del 2018
	00:52 AM
	Gustavo Rodolfo Arriaza
	UMG - Morales Izabal
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Estación de Bomberos</title>
<!-- Icono de la página -->  
<link rel="shortcut icon" href="imagenes/icono.ico" type="image/ico">
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->  
<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
	<?php
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 'Administrador'){
		?>
			<body>
				<nav class="navbar navbar-default navbar-fixed-top">
				  <div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="principal.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="defaultNavbar1">
					  <ul class="nav navbar-nav">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajuste<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="Ajuste.php">Ajuste de inventario</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventario<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="SalidaInventario.php">Salida de inventario</a></li>
							<li><a href="EntradaInventario.php">Entrada de inventario</a></li>
						  </ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="RegistroProducto.php">Registrar Producto</a></li>
							<li><a href="CreacionLinea.php">Registro de lineas de Producto</a></li>
							<li><a href="CreacionMarca.php">Registrar marca</a></li>
							<li><a href="#">Registrar unidad de Medida</a></li>
						  </ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="CrearHojaResponsabilidad.php">Crear hoja de responsabilidad</a></li>
						  </ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Usuarios<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="CrearUsuario.php">Crear usuario</a></li>
							<li><a href="Usuario.php">Usuarios</a></li>
						  </ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cerrar Sesión<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="Seguridad/logout.php">Cerrar Sesión</a></li>
						  </ul>
						</li>
					  </ul>
					</div>
					<!-- /.navbar-collapse --> 
				  </div>
				  <!-- /.container-fluid --> 
				</nav>
				<br>
				<br>
				<br>
				<div class="form-group">
					<form name="CrearUsuario" action="CreacionMarca.php" method="post">
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6">
										<h1 class="text-center">Creacion de marcas</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-list-alt"></span>
										</div>
									</div>
									<br>
									<!-- NOmbre de marca -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
												<input type="text" class="form-control" name="Nombre" placeholder="Nombre" id="Nombre" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- Resgistrar -->
									<div class="row">
										<div class="col-xs-12 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<button type="submit" class="btn btn-primary" id="CrearMarca" name="enviar">Registrar</button>
													<button type="button" class="btn btn-danger">Cancelar</button>
												</div>
											</div>
										</div>
									</div>
									<br>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				<?php
					include_once "Seguridad/conexion.php";
					if (isset($_POST['enviar'])) {
						// Obtenemos los valores de todos los campos y los almacenamos en variables
						$NombreMarca=$_POST['Nombre'];

						// Creamos la consulta para la insersión de los datos
						$Consulta = "INSERT INTO marca(NombreMarca) Values('".$NombreMarca."');";
							
						if(!$resultado = $mysqli->query($Consulta)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $Consulta . "\n";
							echo "Error: " . $mysqli->errno . "\n";
							exit;
						}
						else{
						?>
						<div class="alert alert-success">Marca registrada</div>
						<?php
						}
					}
				?>
				
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
				<!-- Pie de página, se utilizará el mismo para todos. -->
				<footer>
					<hr>
					<div class="row">
						<div class="text-center col-md-6 col-md-offset-3">
							<h4>SGI</h4>
							<p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="http://www.umg.edu.gt/" >www.umg.edu.gt</a></p>
						</div>
					</div>
					<hr>
				</footer> 
			</body>
	<?php
		// De lo contrario lo redirigimos al inicio de sesión
			} 
			else{
				echo "usuario no valido";
				header("location:index.php");
			}
		?>
</html>