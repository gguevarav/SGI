<!--
	Módulo de listado de inventario general
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
		   $_SESSION["PrivilegioUsuario"] == 'Director' ||
		   $_SESSION["PrivilegioUsuario"] == 'Jefe' ||
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
									<li><a href="#">Ver inventario</a></li>
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
										<div class="col-xs-5 ">
											<h1 class="text-center">Inventario actual</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-5 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-list-alt"></span>
										</div>
										<div class="form-group">
											<form name="Exportar" action="Inventario.php" method="post">
												<div class="col-xs-1">
													<div class="input-group input-group-lg">
														<a class="btn btn-success btn-lg" href="ReporteInventario.php" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
													</div>
												</div>
												<!-- <div class="col-xs-1">
													<div class="input-group input-group-lg">
														<input type="submit" name="Exportar" class="btn btn-success" value="Exportar a excel">
													</div>
												</div> -->
											</form>
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
														<th>Código</th>
														<th>Artículo</th>
														<th>Marca</th>
														<th>Unidad de medida</th>
														<th>Modelo</th>
														<th>Línea</th>
														<th>Color</th>
														<th>Precio</th>
														<th>Cantidad</th>
														<th>Total neto</th>
													</tr>
												</thead>
												<!-- Cuerpo de la tabla -->
												<tbody class="buscar">
													<!-- Contenido de la tabla -->
														<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
														<?php							
															$VerProducto = "SELECT * FROM producto";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerProducto);
																while ($row = mysqli_fetch_array($resultado)){
																	?>
																	<tr>
																	<td><span id="idProducto<?php echo $row['idProducto'];?>"><?php echo $row['idProducto'] ?></span></td>
																	<td><span id="NumeroInvenProd<?php echo $row['idProducto'];?>"><?php echo $row['NumeroInvenProd'] ?></span></td>
																	<td><span id="NombreProducto<?php echo $row['idProducto'];?>"><?php echo $row['NombreProducto'] ?></span></td>
																	<td><span id="Marca<?php echo $row['idProducto'];?>">
																														<!-- Acá mostraremos el nombre de la marca a partir del id que se tiene en la tabla -->
																														<?php							
																															$VerNombreMarca = "SELECT NombreMarca FROM marca WHERE idMarca=".$row['idMarca'].";";
																															// Hacemos la consulta
																															$ResultadoVerMarca = $mysqli->query($VerNombreMarca);
																															$FilaResultado = $ResultadoVerMarca->fetch_assoc();
																															$NombreMarca = $FilaResultado['NombreMarca'];
																															echo $NombreMarca;
																														?></span></td>
																	<td><span id="UnidadMedida<?php echo $row['idProducto'];?>"><!-- Acá mostraremos nombre de la unidad de medida a partir del id que se tiene en la tabla -->
																														<?php							
																															$VerNombreMedida = "SELECT NombreUnidadMedida FROM unidadmedida WHERE idUnidadMedida=".$row['idUnidadMedida'].";";
																															// Hacemos la consulta
																															$ResultadoVerMedida = $mysqli->query($VerNombreMedida);
																															$FilaResultado = $ResultadoVerMedida->fetch_assoc();
																															$NombreUnidadMedida = $FilaResultado['NombreUnidadMedida'];
																															echo $NombreUnidadMedida;
																														?></span></td>
																	<td><span id="ModeloProducto<?php echo $row['idProducto'];?>"><?php echo $row['ModeloProducto'] ?></span></td>
																	<td><span id="Linea<?php echo $row['idProducto'];?>"><!-- Acá mostraremos nombre de la Linea a partir del id que se tiene en la tabla -->
																														<?php							
																															$VerNombreLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE idLinea=".$row['idLinea'].";";
																															// Hacemos la consulta
																															$ResultadoVerLinea = $mysqli->query($VerNombreLinea);
																															$FilaResultado = $ResultadoVerLinea->fetch_assoc();
																															$NombreLinea = $FilaResultado['NombreLineaProducto'];
																															echo $NombreLinea;
																														?></span></td>
																	<td><span id="ColorProducto<?php echo $row['idProducto'];?>"><?php echo $row['ColorProducto'] ?></span></td>
																	<td><span id="PrecioProducto<?php echo $row['idProducto'];?>"><?php echo $row['PrecioProducto'] ?></span></td>
																	<td><span id="CantidadProducto<?php echo $row['idProducto'];?>"><!-- Acá mostraremos nombre de la unidad de medida a partir del id que se tiene en la tabla -->
																														<?php							
																															// Primero haremos la consulta
																															$VerInventario = "SELECT * FROM inventario WHERE idProducto='".$row['idProducto']."'";
																															// Ejecutamos la consulta
																															$ResultadoConsultaInventario = $mysqli->query($VerInventario);
																															// Guardamos la consulta en un array
																															$ResultadoInventario = $ResultadoConsultaInventario->fetch_assoc();
																															// Cantidad en el inventario
																															$CantidadInventario = $ResultadoInventario['CantidadInventario'];
																															echo $CantidadInventario;
																														?></span></td>
																	<td><span id="TotalNeto<?php echo $row['idProducto'];?>"><?php echo $row['PrecioProducto'] * $CantidadInventario ?></span></td>
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
					<div class="modal fade" id="frmEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					if(isset($_POST["Exportar"])) {
						$query = "SELECT * FROM producto;";
						$resultado = $mysqli->query($query);
						$Productos = array();
						while ($rows = mysqli_fetch_array($resultado)){
						$Productos[] = $rows;
						}
						if(!empty($Productos)) {
							$filename = "libros.xls";
							header("Content-Type: application/vnd.ms-excel");
							header("Content-Disposition: attachment; filename=".$filename);	 
							$mostrar_columnas = false;
							foreach($Productos as $producto) {
								if(!$mostrar_columnas) {
									echo implode("\t", array_keys($producto)) . "\n";
									$mostrar_columnas = true;
								}
								echo implode("\t", array_values($producto)) . "\n";
							}
						}
						else{
							echo 'No hay datos a exportar';
						}
						exit;
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
