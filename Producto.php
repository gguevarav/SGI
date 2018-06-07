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
					  <a class="navbar-brand" href="principal.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="defaultNavbar1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventario<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="EntradaInventario.php">Entrada de inventario</a></li>
									<li><a href="SalidaInventario.php">Salida de inventario</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="RegistroProducto.php">Registrar Producto</a></li>
									<li><a href="#">Lista de Productos</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="CrearHojaResponsabilidad.php">Crear hoja de responsabilidad</a></li>
									<li><a href="HojaResponsabilidad.php">Lista hojas de responsabilidad</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajuste<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Ajuste.php">Ajuste de inventario</a></li>
									<li><a href="ListaAjuste.php">Lista de Ajuste de inventario</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de usuarios<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="CrearUsuario.php">Crear usuario</li>
									<li><a href="Usuario.php">Ver usuarios</a></li>
								</ul>
							</li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<!-- Acá mostramos el nombre del usuario -->
							<a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $NombreUsuario; ?></a>
							<!-- <span class="caret"></span> Agrega un indicador de flecha abajo -->
							<ul class="dropdown-menu">
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
									<div class="table-responsive">          
										<table class="table">
											<!-- Título -->
											<thead>
												<!-- Contenido -->
												<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Marca</th>
													<th>Modelo</th>
													<th>Línea</th>
													<th>Medida</th>
													<th>Color</th>
													<th>Precio</th>
												</tr>
											</thead>
											<!-- Cuerpo de la tabla -->
											<tbody>
												<!-- Contenido de la tabla -->
													<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
													<?php
														// Primero hacemos la consulta en la tabla de persona
														include_once "Seguridad/conexion.php";								
														$VerProductos = "SELECT * FROM producto";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerProductos);
															while ($row = mysqli_fetch_array($resultado)){
																// Obtenemos el nombre de usuario y privilegio de cada persona
															// Primero haremos la consulta para mostrar el nombre del proveedor a partir del ID
															$VerMarca = "SELECT NombreMarca FROM Marca WHERE idMarca='".$row['idMarca']."'";
															// Ejecutamos la consulta
															$ResultadoConsultaMarca = $mysqli->query($VerMarca);
															// Guardamos la consulta en un array
															$ResultadoConsulta = $ResultadoConsultaMarca->fetch_assoc();
															// Nombre del banco
															$NombreMarca = $ResultadoConsulta['NombreMarca'];
															$VerLineaProducto = "SELECT NombreLineaProducto FROM lineaproducto WHERE idLinea='".$row['idLinea']."'";
															// Ejecutamos la consulta
															$ResultadoConsultaLineaProducto = $mysqli->query($VerLineaProducto);
															// Guardamos la consulta en un array
															$ResultadoConsulta = $ResultadoConsultaLineaProducto->fetch_assoc();
															// Nombre del banco
															$NombreLineaProducto = $ResultadoConsulta['NombreLineaProducto'];
															$VerMedida = "SELECT NombreUnidadMedida FROM unidadmedida WHERE idUnidadMedida='".$row['idUnidadMedida']."'";
															// Ejecutamos la consulta
															$ResultadoConsultaMedida = $mysqli->query($VerMedida);
															// Guardamos la consulta en un array
															$ResultadoConsulta = $ResultadoConsultaMedida->fetch_assoc();
															// Nombre del banco
															$NombreUnidadMedida = $ResultadoConsulta['NombreUnidadMedida'];
																?>
																<tr>
																<td><span id="idProducto<?php echo $row['idProducto'];?>"><?php echo $row['idProducto'] ?></span></td>
																<td><span id="NombreProducto<?php echo $row['idProducto'];?>"><?php echo $row['NombreProducto'] ?></span></td>
																<td><span id="idMarca<?php echo $row['idProducto'];?>"><?php echo $NombreMarca ?></span></td>
																<td><span id="ModeloProducto<?php echo $row['idProducto'];?>"><?php echo $row['ModeloProducto'] ?></span></td>
																<td><span id="NombreLineaProducto<?php echo $row['idProducto'];?>"><?php echo $NombreLineaProducto ?></span></td>
																<td><span id="NombreUnidadMedida<?php echo $row['idProducto'];?>"><?php echo $NombreUnidadMedida ?></span></td>
																<td><span id="ColorProducto<?php echo $row['idProducto'];?>"><?php echo $row['ColorProducto'] ?></span></td>
																<td><span id="PrecioProducto<?php echo $row['idProducto'];?>"><?php echo $row['PrecioProducto'] ?></span></td>
																<td>
																	<!-- Edición -->
																	<div>
																		<div class="input-group input-group-lg">
																			<button type="button" class="btn btn-success EditarProducto" value="<?php echo $row['idProducto']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																		</div>
																	</div>
																</td>
																<td>
																	<!-- Eliminación -->
																	<div>
																		<div class="input-group input-group-lg">
																			<button type="button" class="btn btn-danger EliminarProducto" value="<?php echo $row['idProducto']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
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
					<div class="modal fade" id="frmEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Eliminar Producto</h1></center>
								</div>
								<form method="post" action="Producto.php" id="myForm">
								<div class="modal-body">
									<p class="lead">¿Está seguro que desea eliminar el siguiente Producto?</p>
									<div class="form-group input-group">
										<input type="text" name="idProductoEliminacion" style="width:350px; visibility:hidden;" class="form-control" id="idPEliminar">
										<br>
										<label id="NombreProducto"></label>
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
					// Código que recibe la información de eliminar usuario
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
					// Termina código para eliminar usuario
					// Código para editar un usuario
					if (isset($_POST['EditarUsuario'])) {
						// Guardamos La información proveniente del formulario
						$idPersonaEditar = $_POST['idEditar'];
						$NombreEditar = $_POST['NombreEditar'];
						$ApellidoEditar = $_POST['ApellidoEditar'];
						$DireccionEditar = $_POST['DireccionEditar'];
						$DPIEditar = $_POST['DPIEditar'];
						$TelefonoEditar = $_POST['TelefonoEditar'];
						$FechaNacEditar = $_POST['FechaNacEditar'];
						$CorreoEditar = $_POST['CorreoEditar'];
						$PrivilegioEditar = $_POST['PrivilegioEditar'];
						
						// Preparamos las consultas
						$EditarTablaPersona = "UPDATE persona
								  SET NombrePersona = '" .$NombreEditar."',
									  ApellidoPersona = '" .$ApellidoEditar."',
									  DireccionPersona = '".$DireccionEditar."',
									  DPIPersona = '".$DPIEditar."',
									  TelefonoPersona = '".$TelefonoEditar."',
									  FechaNacPersona = '".$FechaNacEditar."',
									  CorreoPersona = '".$CorreoEditar."'
								  WHERE idPersona=".$idPersonaEditar.";";
						$EditarTablaUsuario = "UPDATE usuario
								  SET PrivilegioUsuario = '".$PrivilegioEditar."'
								  WHERE idPersona=".$idPersonaEditar.";";
						
						// Ejecutamos la consulta para la tabla de persona
						if(!$resultado = $mysqli->query($EditarTablaPersona)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $EditarTablaPersona . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						
						// Ejecutamos la consulta para la tabla de usuario
						if(!$resultado2 = $mysqli->query($EditarTablaUsuario)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $EditarTablaUsuario . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						else{
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Usuario.php\">"; 
							?>
							<div class="alert alert-success" role="alert">
							  <strong>Usuario actualizado</strong>
							</div>
    						<?php
    					}
					}
				?>
				<!-- Edit Modal-->
					<div class="modal fade" id="frmEditar" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h4 class="modal-title" id="myModalLabel">Editar usuario</h4></center>
								</div>
								<form method="post" action="Usuario.php" id="frmEdit">
									<div class="modal-body">
									<div class="container-fluid">
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">ID</span>
												<input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nombre</span>
												<input type="text" style="width:350px;" class="form-control" name="NombreEditar" id="NombreEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Apellido</span>
												<input type="text" style="width:350px;" class="form-control" name="ApellidoEditar" id="ApellidoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Dirección</span>
												<input type="text" style="width:350px;" class="form-control" name="DireccionEditar" id="DireccionEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">No. de DPI</span>
												<input type="text" style="width:350px;" class="form-control" name="DPIEditar" id="DPIEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">No. de telefono</span>
												<input type="tel" style="width:350px;" class="form-control" name="TelefonoEditar" id="TelefonoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Fecha Nacimiento</span>
												<input type="date" style="width:350px;" class="form-control" name="FechaNacEditar" id="FechaNacEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Correo</span>
												<input type="email" style="width:350px;" class="form-control" name="CorreoEditar" id="CorreoEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Privilegio</span>
												<select class="form-control" style="width:350px;" name="PrivilegioEditar" id="PrivilegioEditar">
													<option value="" disabled selected>Privilegios</option>
															<option value="Administrador">Administrador</option>
															<option value="Jefatura">Jefatura</option>
															<option value="Operador">Operador</option>
													</select>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
										<input type="submit" name="EditarUsuario" class="btn btn-warning" value="Editar Usuario">
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
				<script src="js/custom.js"></script>
				<!-- Pie de página, se utilizará el mismo para todos. -->
				<footer>
					<hr>
					<div class="row">
						<div class="text-center col-md-6 col-md-offset-3">
							<h4>Sistema de gestión de inventario</h4>
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
