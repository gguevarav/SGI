<!--
	Módulo de creación de Usuarios
	Martes, 08 de mayo del 2018
	09:02 PM
	Gemis Daniel Guevara Villeda
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

</head>
	<?php
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
						<!--
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bancos<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="CrearBanco.php">Mantenimiento de bancos</a></li>
						  </ul>
						</li>
						-->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajuste<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="Ajuste.php">Ajuste de inventario</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Salida de inventario<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="SalidaInventario.php">Salida de inventario</a></li>
						  </ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="RegistroProducto.php">Registrar Producto</a></li>
						  </ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Entradas<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="EntradaInventario.php">Entradas de inventario</a></li>
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
							<li><a href="#">Usuarios</a></li>
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
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6 ">
										<h1 class="text-center">Usuarios registrados</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-minus"></span>
										</div>
									</div>
									<br>
									<div class="table-responsive">          
										<table class="table">
											<!-- Título -->
											<thead>
												<!-- Contenido -->
												<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Dirección</th>
													<th>No. de DPI</th>
													<th>No. de teléfono</th>
													<th>Fecha de Nacimiento</th>
													<th>Correo</th>
													<th>Nombre de inicio de sesión</th>
													<th>Privilegio</th>
												</tr>
											</thead>
											<!-- Cuerpo de la tabla -->
											<tbody>
												<!-- Contenido de la tabla -->
												
													<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
													<?php
														// Primero hacemos la consulta en la tabla de persona
														include_once "Seguridad/conexion.php";								
														$VerPersonas = "SELECT * FROM persona";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerPersonas);
															while ($row = mysqli_fetch_array($resultado)){
																// Obtenemos el nombre de usuario y privilegio de cada persona
																// Primero haremos la consulta
																$VerUsuario = "SELECT * FROM usuario WHERE idPersona='".$row['idPersona']."'";
																// Ejecutamos la consulta
																$ResultadoConsultaUsuario = $mysqli->query($VerUsuario);
																// Guardamos la consulta en un array
																$ResultadoConsulta = $ResultadoConsultaUsuario->fetch_assoc();
																// Nombre de usuario
																$NombreDeUsuario = $ResultadoConsulta['NombreUsuario'];
																// Privilegio de usuario
																$PrivilegioDeUsuario = $ResultadoConsulta['PrivilegioUsuario'];
																?>
																<tr>
																<td><span id="idPersonaEliminar<?php echo $row['idPersona'];?>"><?php echo $row['idPersona'] ?></span></td>
																<td><span id="NombreUsuario<?php echo $row['idPersona'];?>"><?php echo $row['NombrePersona'] ?></span></td>
																<td><span id="ApellidoUsuario<?php echo $row['idPersona'];?>"><?php echo $row['ApellidoPersona'] ?></span></td>
																<td><?php echo $row['DireccionPersona'] ?></td>
																<td><?php echo $row['DPIPersona'] ?></td>
																<td><?php echo $row['TelefonoPersona'] ?></td>
																<td><?php echo $row['FechaNacPersona'] ?></td>
																<td><?php echo $row['CorreoPersona'] ?></td>
																<td><?php echo $NombreDeUsuario ?></td>
																<td><?php echo $PrivilegioDeUsuario ?></td>
																<td>
																	<!-- Edición -->
																	<div>
																		<div class="input-group input-group-lg">
																			<button type="button" class="btn btn-success editar" value="<?php echo $row['NombrePersona']. " " .$row['ApellidoPersona']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																		</div>
																	</div>
																</td>
																<td>
																	<!-- Eliminación -->
																	<div>
																		<div class="input-group input-group-lg">
																			<button type="button" class="btn btn-danger eliminar" value="<?php echo $row['idPersona']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
																		</div>
																	</div>
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
				<!-- Edit Modal-->
					<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Eliminar usuario</h1></center>
								</div>
								<form method="post" action="Usuario.php" id="myForm">
								<div class="modal-body">
									<p class="lead">¿Está seguro que desea eliminar al siguiente usuario?</p>
									<div class="form-group input-group">
										<input type="text" name="idUsuarioEliminacion" style="width:350px; visibility:hidden;" class="form-control" id="idAEliminar">
										<br>
										<label id="NombresApellidos"></label>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" name="EliminarUsuario" class="btn btn-danger" value="Eliminar Usuario">
									<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				<?php
					include_once "Seguridad/conexion.php";
					include_once "Clases/clsPrincipal.php";
					if (isset($_POST['EliminarUsuario'])) {
						// Guardamos el id en una variable
						$idUsuarioaEliminar = $_POST['idUsuarioEliminacion'];
						// Preparamos la consulta
						$query = "DELETE FROM persona WHERE idPersona=".$idUsuarioaEliminar.";";
						// Ejecutamos la consulta
						if(!$resultado = $mysqli->query($query)){
    					echo "Error: La ejecución de la consulta falló debido a: \n";
    					echo "Query: " . $query . "\n";
    					echo "Errno: " . $mysqli->errno . "\n";
    					echo "Error: " . $mysqli->error . "\n";
    					exit;
						}
						else{
    						?>
    						<div class="alert alert-warning"> Usuario eliminado </div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
    					}
					}
				?>
				<!-- Edit Modal-->
					<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="EditarUsuario" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h4 class="modal-title" id="myModalLabel">Editar usuario</h4></center>
								</div>
								<div class="modal-body">
								<div class="container-fluid">
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Nombre</span>
										<input type="text" style="width:350px;" class="form-control" id="efirstname">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Apellido</span>
										<input type="text" style="width:350px;" class="form-control" id="elastname">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Dirección</span>
										<input type="text" style="width:350px;" class="form-control" id="eaddress">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">No. de DPI</span>
										<input type="text" style="width:350px;" class="form-control" id="DPI">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">No. de telefono</span>
										<input type="text" style="width:350px;" class="form-control" id="teléfono">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Fecha Nacimiento</span>
										<input type="text" style="width:350px;" class="form-control" id="FechaNac">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Correo</span>
										<input type="text" style="width:350px;" class="form-control" id="Correo">
									</div>
									<div class="form-group input-group">
										<span class="input-group-addon" style="width:150px;">Privileio</span>
										<input type="text" style="width:350px;" class="form-control" id="Privilegio">
									</div>
								</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
									<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> </i> Actualizar</button>
								</div>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
				<!-- Incluimos el script que nos dará el nombre de la persona para mostrarlo en el modal -->
				<script src="js/custom.js"></script>
				<!-- Pie de página, se utilizará el mismo para todos. -->
				<footer>
					<hr>
					<div class="row">
						<div class="text-center col-md-6 col-md-offset-3">
							<h4>Sistema de Reportes</h4>
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
