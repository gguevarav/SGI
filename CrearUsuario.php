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
										<li><a href="#">Crear usuario</li>
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
										<li><a href="JuntaOficiales.php"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Modificar junta oficiales</a></li>
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
					<form name="CrearUsuario" action="CrearUsuario.php" method="post">
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 ">
										<h1 class="text-center">Registro de usuario</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-user"></span>
										</div>
									</div>
									<br>
								<!-- Nombre del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="NombreUsuario" placeholder="Nombre" id="NombreUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Apellido del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="ApellidoUsuario" placeholder="Apellido" id="ApellidoUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Dirección del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-home"></i></span>
											<input type="text" class="form-control" name="DireccionUsuario" placeholder="Dirección" id="DireccionUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- DPIPersona -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
											<input type="text" class="form-control" name="DPIPersona" placeholder="DPI" id="DPIPersona" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Teléfono del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-earphone"></i></span>
											<input type="tel" class="form-control" name="TelefonoUsuario" placeholder="Teléfono" id="TelefonoUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Correo del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
											<input type="email" class="form-control" name="CorreoUsuario" placeholder="Correo" id="CorreoUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Fecha de nacimiento -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
											<input type="date" class="form-control" name="FechaNacimiento" placeholder="Fecha de Nacimiento" id="FechaNacimiento" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Privililegio del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tasks"></i></span>
											<select class="form-control" name="PrivilegioUsuario" id="PrivilegioUsuario">
											<option value="" disabled selected>Privilegios</option>
													<option value="Administrador">Administrador</option>
													<option value="Jefatura">Director</option>
													<option value="Operador">Jefe</option>
													<option value="Operador">Secretario</option>
													<option value="Operador">Tesorero</option>
											</select>
										</div>
									</div>
								</div>
								<br>
								<!-- Nombre de usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="username" placeholder="Nombre de usuario" id="username" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Contraseña del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control" name="PasswordUsuario" placeholder="Contraseña" id="PasswordUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Repetición de contraseña del usuario -->
								<div class="row">
									<div class="col-xs-10 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control" name="RePasswordUsuario" placeholder="Ingrese nuevamente la contraseña" id="RePaswordUsuario" aria-describedby="sizing-addon1" required>
										</div>
									</div>
								</div>
								<br>
								<!-- Resgistrar -->
								<div class="row">
									<div class="col-xs-12 col-xs-offset-1">
										<div class="input-group input-group-lg">
											<div clss="btn-group">
												<button type="submit" class="btn btn-primary" id="IngresoLog" name="enviar">Registrar</button>
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
				</div>
				
				<?php
					if (isset($_POST['enviar'])) {
						// Obtenemos los valores de todos los campos y los almacenamos en variables
						$NombreUsuario=$_POST['NombreUsuario'];
						$ApellidoUsuario=$_POST['ApellidoUsuario'];
						$FechaNacimiento=$_POST['FechaNacimiento'];
						$DireccionUsuario=$_POST['DireccionUsuario'];
						$DPIPersona=$_POST['DPIPersona'];
						$TelefonoUsuario=$_POST['TelefonoUsuario'];
						$CorreoUsuario=$_POST['CorreoUsuario'];
						$FechaNacimiento=$_POST['FechaNacimiento'];
						$PrivilegioUsuario=$_POST['PrivilegioUsuario'];
						$username=$_POST['username'];
						$PasswordUsuario=$_POST['PasswordUsuario'];
						$RePasswordUsuario=$_POST['RePasswordUsuario'];
						
						if($PasswordUsuario != $RePasswordUsuario){
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-success">Las contraseñas no coinciden</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<?php
						}
						else{
							$ContraseniaEncriptada = md5($PasswordUsuario);
							// Creamos la consulta para la insersión de los datos
							$InsertarPersona = "INSERT INTO Persona(NombrePersona, ApellidoPersona, DireccionPersona,
															 DPIPersona, TelefonoPersona, FechaNacPersona, CorreoPersona)
													  Values('".$NombreUsuario."', '".$ApellidoUsuario."', '".$DireccionUsuario."', '".$DPIPersona."',
															 '".$TelefonoUsuario."', '".$FechaNacimiento."', '".$CorreoUsuario."')";
							
							if(!$resultado = $mysqli->query($InsertarPersona)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $InsertarPersona . "\n";
								echo "Error: " . $mysqli->errno . "\n";
								exit;
							}
							//$id = mysqli_insert_id($mysqli);
							//printf("El último registro insertado tiene el id %d\n", $id);
							$InsertarUsuario = "INSERT INTO Usuario (NombreUsuario, ContraseniaUsuario, idPersona, PrivilegioUsuario)
															VALUES('".$username."', '".$ContraseniaEncriptada."', '".mysqli_insert_id($mysqli)."', '".
																	$PrivilegioUsuario."');";
																	
							if(!$resultado2 = $mysqli->query($InsertarUsuario)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $InsertarUsuario . "\n";
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
