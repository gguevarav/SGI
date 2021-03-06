<!--
	Módulo de creación de usuarios
	Gemis Daniel Guevara Villeda
	Gustavo Rodolfo Arriaza
	UMG - Morales Izabal
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="imagenes/icono.ico">
<title>Estación de Bomberos</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->  
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<!-- Incluimos el script que contiene los datos  --> 
<script src="js/CopiaElementos.js"></script>

</head>
	<?php
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Primero hacemos la consulta en la tabla de persona
		include_once "Seguridad/conexion.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
			// Guardamos el nombre del usuario en una variable
			$NombreUsuario =$_SESSION["NombreUsuario"];
			$idUsuario2 =$_SESSION["idUsuario"];
		?>
						<body>
				<nav class="navbar navbar-default navbar-fixed-top">
				  <div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="defaultNavbar1">
						<ul class="nav navbar-nav">
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventario<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<?php
									if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
									   $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
									   $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
									   $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
									?>
										<li><a href="EntradaInventario.php">Entrada de inventario</a></li>
										<li><a href="SalidaInventario.php">Salida de inventario</a></li>
								<?php
									}
									?>
									<li><a href="Inventario.php">Ver inventario</a></li>
								</ul>
							</li>
							<?php
							if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
							   $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
							   $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
							   $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
								?>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="RegistroProducto.php">Registrar Producto</a></li>
										<li><a href="Producto.php">Lista de Productos</a></li>
									</ul>
								</li>
								<?php
							}
							?>
							<?php
							if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
							   $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
							   $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
							   $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
								?>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajuste<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="Ajuste.php">Ajuste de inventario</a></li>
									</ul>
								</li>
								<?php
							}
							?>
							<?php
							if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
							   $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
							   $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
							   $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
								?>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearHojaResponsabilidad.php">Crear hoja de responsabilidad</a></li>
										<li><a href="HojaResponsabilidad.php">Lista hojas de responsabilidad</a></li>
									</ul>
								</li>
								<?php
							}
							?>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bitácoras<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="BitacoraEntradas.php">Bitácora de entradas de inventario</a></li>
									<li><a href="BitacoraSalidas.php">Bitácora de salidas de inventario</a></li>
									<li><a href="BitacoraAjustes.php">Bitácora de ajustes de inventario</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="ReporteProductos.php" target="_blank">Reporte de productos</a></li>
									<li><a href="ReporteInventario.php" target="_blank">Reporte de inventario</a></li>
									<li><a href="ReporteInventarioFisico.php" target="_blank">Reporte de inventario fisico</a></li>
									<li><a href="Kardex.php" target="_blank">Kardex</a></li>
								</ul>
							</li>
							<?php
							if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
							   $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
								?>
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="CrearUsuario.php">Crear usuario</li>
										<li><a href="Usuario.php">Ver usuarios</a></li>
									</ul>
								</li>
								<?php
							}
							?>
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<!-- Acá mostramos el nombre del usuario -->
							<a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><?php echo $NombreUsuario; ?></a></li>
								<?php
									if($_SESSION["PrivilegioUsuario"] == 'Administrador' || $_SESSION["PrivilegioUsuario"] == 'Superadmin'){
									?>
										<li><a href="Administrador.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo adminstrador</a></li>
										<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Modificar junta oficiales</a></li>
								<?php
									}
									?>
								<li><a href="AcercaDe.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Acerca de...</a></li>
								<li><a href="Seguridad/logout.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Cerrar Sesión</a></li>
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
					<form name="CrearUsuario" action="JuntaOficiales.php" method="post">
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 ">
										<h1 class="text-center">Junta de oficiales</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-dashboard"></span>
										</div>
									</div>
									<br>
									<!-- Director de la compañia -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
												<select class="form-control" name="Director" id="Director" required>
												<option value="" disabled selected>Director de Cía.</option>
														<!-- Acá mostraremos los puestos que existen en la base de datos -->
														<?php							
															$VerProductos = "SELECT idPersona, NombrePersona FROM persona;";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerProductos);			
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<option value="<?php echo $row['idPersona'];?>"><?php echo $row['NombrePersona'] ?></option>
														<?php
																}
														?>
												</select>
											</div>
										</div>
									</div>
									<br>
									<!-- Jefe de compañía -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
												<select class="form-control" name="Jefe" id="Jefe" required>
												<option value="" disabled selected>Jefe de Cía.</option>
														<!-- Acá mostraremos los puestos que existen en la base de datos -->
														<?php							
															$VerProductos = "SELECT idPersona, NombrePersona FROM persona;";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerProductos);			
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<option value="<?php echo $row['idPersona'];?>"><?php echo $row['NombrePersona'] ?></option>
														<?php
																}
														?>
												</select>
											</div>
										</div>
									</div>
									<br>
									<!-- Jefe de compañía -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
												<select class="form-control" name="Secretario" id="Secretario" required>
												<option value="" disabled selected>Secretario de Cía.</option>
														<!-- Acá mostraremos los puestos que existen en la base de datos -->
														<?php							
															$VerProductos = "SELECT idPersona, NombrePersona FROM persona;";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerProductos);			
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<option value="<?php echo $row['idPersona'];?>"><?php echo $row['NombrePersona'] ?></option>
														<?php
																}
														?>
												</select>
											</div>
										</div>
									</div>
									<br>
									<!-- Tesorero de Compañía -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
												<select class="form-control" name="Tesorero" id="Tesorero" required>
												<option value="" disabled selected>Tesorero de Cía.</option>
														<!-- Acá mostraremos los puestos que existen en la base de datos -->
														<?php							
															$VerProductos = "SELECT idPersona, NombrePersona FROM persona;";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerProductos);			
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<option value="<?php echo $row['idPersona'];?>"><?php echo $row['NombrePersona'] ?></option>
														<?php
																}
														?>
												</select>
											</div>
										</div>
									</div>
									<br>
									<!-- Guardar -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
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
					if (isset($_POST['Guardar'])) {
						// Obtenemos los valores de todos los campos y los almacenamos en variables
						$Director=$_POST['Director'];
						$Jefe=$_POST['Jefe'];
						$Secretario=$_POST['Secretario'];
						$Tesorero=$_POST['Tesorero'];
						
						//Primero revisamos que no exista la marca ya en la base de datos
						$ConsultaExisteJuntaOficiales = "SELECT * FROM juntaoficiales;";
						$ResultadoExisteJuntaOficiales = $mysqli->query($ConsultaExisteJuntaOficiales);			
						$row = mysqli_fetch_array($ResultadoExisteJuntaOficiales);
						if($row['idJuntaOficiales'] == null){
							$InsertarJuntaOficiales = "INSERT INTO JuntaOficiales(DirectorJuntaOficiales, JefeJuntaOficiales, SecretarioJuntaOficiales, TesoreroJuntaOficiales)
																		   Values(".$Director.", ".$Jefe.", ".$Secretario.", ".$Tesorero.");";
							
							if(!$resultado = $mysqli->query($InsertarJuntaOficiales)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $InsertarJuntaOficiales . "\n";
								echo "Error: " . $mysqli->errno . "\n";
								exit;
							}
						}
						else{
							$ActualizarJuntaOficiales = "UPDATE JuntaOficiales SET
														DirectorJuntaOficiales = ".$Director.",
														JefeJuntaOficiales = ".$Jefe.",
														SecretarioJuntaOficiales = ".$Secretario.",
														TesoreroJuntaOficiales = ".$Tesorero."
														WHERE idJuntaOficiales=1;";
							
							if(!$resultado2 = $mysqli->query($ActualizarJuntaOficiales)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $ActualizarJuntaOficiales . "\n";
								echo "Error: " . $mysqli->errno . "\n";
								exit;
							}
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
							<h4>Sistema de gestión de inventario</h4>
							<p>Copyright &copy; 2018 &middot; All Rights Reserved &middot; <a href="https://www.umg.edu.gt/" >Gemis Daniel Guevara Villeda - Gustavo Rodolfo Arriaza</a></p>
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
				header("location:login.php");
			}
		?>
</html>
