<!--
	Módulo de listado de hojas de responsabilidad
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
		if($_SESSION["PrivilegioUsuario"] == 'Administrador' ||
	       $_SESSION["PrivilegioUsuario"] == 'Superadmin' ||
		   $_SESSION["PrivilegioUsuario"] == 'Secretario' ||
		   $_SESSION["PrivilegioUsuario"] == 'Tesorero'){
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
										<li><a href="#">Lista hojas de responsabilidad</a></li>
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
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 ">
										<h1 class="text-center">Hojas de responsabilidad registradas</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-user"></span>
										</div>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon">Buscar</span>
										<input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
									</div>									
									<br>
									<div class="panel panel-primary">
										<div class="table-responsive">          
											<table class="table table-hover table-striped">
												<!-- Título -->
												<thead>
													<!-- Contenido -->
													<tr>
														<th>#</th>
														<th>Fecha de generación</th>
														<th>Entregado por</th>
														<th>Recibido por</th>
														<th>Observaciones</th>
														<th>Detalle</th>
													</tr>
												</thead>
												<!-- Cuerpo de la tabla -->
												<tbody class="buscar">
													<!-- Contenido de la tabla -->
														<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
														<?php
															$VerHojasResponsabilidad = "SELECT * FROM hojaresponsabilidad";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerHojasResponsabilidad);
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<tr>
																	<td><span id="idHojaResponsabilidad<?php echo $row['idHojaResponsabilidad'];?>"><?php echo $row['idHojaResponsabilidad'] ?></span></td>
																	<td><span id="FechaGenerada<?php echo $row['idHojaResponsabilidad'];?>"><?php echo $row['FechaHoraHojaRespons'] ?></span></td>
																	<td><span id="EntregadoPor<?php echo $row['idHojaResponsabilidad'];?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
																																			<?php							
																																				$VerNombrePersona = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$row['idPersonaEntrega'].";";
																																				// Hacemos la consulta
																																				$ResultadoVerPersona = $mysqli->query($VerNombrePersona);
																																				$FilaResultado = $ResultadoVerPersona->fetch_assoc();
																																				$NombrePersona = $FilaResultado['NombrePersona'] . " " . $FilaResultado['ApellidoPersona'];
																																				echo $NombrePersona;
																																			?></span></td>
																	<td><span id="RecibidoPor<?php echo $row['idHojaResponsabilidad'];?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
																																			<?php							
																																				$VerNombrePersona = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$row['idPersonaRecibe'].";";
																																				// Hacemos la consulta
																																				$ResultadoVerPersona = $mysqli->query($VerNombrePersona);
																																				$FilaResultado = $ResultadoVerPersona->fetch_assoc();
																																				$NombrePersona = $FilaResultado['NombrePersona'] . " " . $FilaResultado['ApellidoPersona'];
																																				echo $NombrePersona;
																																			?></span></td>
																	<td><span id="Observaciones<?php echo $row['idHojaResponsabilidad'];?>"><?php echo $row['ObservacionHojaRespons'] ?></span></td>
																	<td>
																		<!-- Ver detalles de hoja  -->
																		<form method="post" action="DetalleHojaResponsabilidad.php" target="_blank">
																			<div>
																				<div class="input-group input-group-lg">
																					<button type="submit" class="btn btn-success" name="VerDetalle" id="VerDetalle" value="<?php echo $row['idHojaResponsabilidad']; ?>"><span class="glyphicon glyphicon-list-alt">Ver detalles</span></button>
																				</div>
																			</div>
																		</form>
																	</td>
																	</tr>
														<?php
																}
														?>
												</tbody>
											</table>
										</div>
									</div>								
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Edit Modal-->
					<div class="modal fade" id="frmVerDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Detalle de artículos</h1></center>
								</div>
								<form method="post" action="Usuario.php" id="myForm">
								<input type="text" name="idHojaResponsabilidad" style="width:350px; visibility:hidden;" class="form-control" id="idHojaResponsabilidad">
								<div class="table-responsive">          
									<table class="table">
										<!-- Título -->
										<thead>
											<!-- Contenido -->
											<tr>
												<th>#</th>
												<th>Artículo</th>
												<th>Cantidad</th>
											</tr>
										</thead>
										<!-- Cuerpo de la tabla -->
										<tbody>
											<!-- Contenido de la tabla -->
												<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
												<?php
													$VerHojasResponsabilidad = "SELECT idDetalleProdHojasRespons, idProducto, CantidadDetalleProdHojasRespons FROM detalleprodhojasrespons WHERE idHojaResponsabilidad=".$idHojaRespons.";";
													// Hacemos la consulta
													$resultado = $mysqli->query($VerHojasResponsabilidad);
														while ($row = mysqli_fetch_array($resultado)){
															?>
															<tr>
															<td><span id="idDetalleProdHojasRespons<?php echo $row['idDetalleProdHojasRespons'];?>"><?php echo $row['idDetalleProdHojasRespons'] ?></span></td>
															<td><span id="EntregadoPor<?php echo $row['idDetalleProdHojasRespons'];?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
																																	<?php							
																																		$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row['idProducto'].";";
																																		// Hacemos la consulta
																																		$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
																																		$FilaResultado = $ResultadoVerProducto->fetch_assoc();
																																		$NombreProducto = $FilaResultado['NombreProducto'];
																																		echo $NombreProducto;
																																	?></span></td>
															<td><span id="Cantidad<?php echo $row['idDetalleProdHojasRespons'];?>"><?php echo $row['CantidadDetalleProdHojasRespons'] ?></span></td>
															</tr>
												<?php
														}
												?>
										</tbody>
									</table>
								</div>	
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
				<!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
				<script src="js/Modal.js"></script>
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
