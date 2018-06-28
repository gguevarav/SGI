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
										<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i>Módulo adminstrador</a></li>
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
				<div class="container">
					<div class="row text-center">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 ">
								<h1 class="text-center">Módulo Administrador</h1>
								</div>
								<!-- Contenedor del ícono del Usuario -->
								<div class="col-xs-6 Icon">
									<!-- Icono de usuario -->
									<span class="glyphicon glyphicon-dashboard"></span>
								</div>
							</div>
							<br>
							<div class="form-group">
								<form name="CambioPassword" action="Administrador.php" method="post">
									<div class="row">
										<div class="col-xs-12 ">
										<h1 class="text-center">Cambio de contraseña</h1>
										</div>
									</div>
									<br>
									<!-- Nombre de usuario -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
												<select class="form-control" name="NombreUsuario" id="NombreUsuario" required>
												<option value="" disabled selected>Usuario</option>
													<!-- Acá mostraremos los puestos que existen en la base de datos -->
													<?php							
														$VerUsuarios = "SELECT * FROM usuario;";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerUsuarios);			
															while ($row = mysqli_fetch_array($resultado)){
																?>
																<option value="<?php echo $row['idUsuario'];?>"><?php echo $row['NombreUsuario'] ?></option>
													<?php
															}
													?>
												</select>
											</div>
										</div>
									</div>
									<br>
									<!-- Contraseña de usuario -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
												<input type="password" class="form-control" name="ContraseniaUsuario" placeholder="Contraseña" id="ContraseniaUsuario" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- reContraseña de usuario -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
												<input type="password" class="form-control" name="ReContraseniaUsuario" placeholder="Ingrese nuevamente la contraseña" id="ReContraseniaUsuario" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- Resgistrar -->
									<div class="row">
										<div class="col-xs-12 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<button type="submit" class="btn btn-primary" id="CambiarPassword" name="CambiarPassword">Cambiar</button>
												</div>
											</div>
										</div>
									</div>
									<br>
								</form>
							</div>
							<div class="form-group">
								<form name="CrearTipoEntrada" action="Administrador.php" method="post">
									<div class="row">
										<div class="col-xs-12 ">
										<h1 class="text-center">Crear tipo de entrada al inventario</h1>
										</div>
									</div>
									<br>
									<!-- Nombre de entrada -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-comment"></i></span>
												<input type="text" class="form-control" name="NombreEntrada" placeholder="Nombre de tipo de entrada" id="NombreEntrada" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- Resgistrar -->
									<div class="row">
										<div class="col-xs-12 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<button type="submit" class="btn btn-primary" id="RegistroEntrada" name="RegistroEntrada">Registrar</button>
												</div>
											</div>
										</div>
									</div>
									<br>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<?php
					if (isset($_POST['CambiarPassword'])) {
						// Obtenemos los valores de todos los campos y los almacenamos en variables
						$idUsuario=$_POST['NombreUsuario'];
						$PasswordUsuario=$_POST['ContraseniaUsuario'];
						$RePasswordUsuario=$_POST['ReContraseniaUsuario'];
						
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
							$CambiarContrasenia = "UPDATE usuario SET ContraseniaUsuario='".$ContraseniaEncriptada."' WHERE idUsuario=".$idUsuario.";";
																	
							if(!$resultado1 = $mysqli->query($CambiarContrasenia)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $CambiarContrasenia . "\n";
								echo "Error: " . $mysqli->errno . "\n";
								exit;
							}
						}
					}
					if (isset($_POST['RegistroEntrada'])) {
						// Obtenemos los valores de todos los campos y los almacenamos en variables
						$NombreTipoEntrada=$_POST['NombreEntrada'];
						
						// Creamos la consulta para la insersión de los datos
						$InsertarTipoEntrada = "INSERT into tipoentrada (NombreTipoEntrada)
																 VALUES('".$NombreTipoEntrada."');";
																
						if(!$resultado2 = $mysqli->query($InsertarTipoEntrada)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $InsertarTipoEntrada . "\n";
							echo "Error: " . $mysqli->errno . "\n";
							exit;
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
