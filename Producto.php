<!--
	Módulo de visualización de productos registrados
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
										<li><a href="#">Lista de Productos</a></li>
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
									<div class="col-xs-5">
										<h1 class="text-center">Productos registrados</h1>
									</div>
									<!-- Contenedor del ícono del Usuario -->
									<div class="col-xs-5 Icon">
										<!-- Icono de usuario -->
										<span class="glyphicon glyphicon-asterisk"></span>
									</div>
									<div class="form-group">
											<form name="Exportar" action="Producto.php" method="post">
												<div class="col-xs-1">
													<div class="input-group input-group-lg">
														<a class="btn btn-success btn-lg" href="ReporteProductos.php" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
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
								<br>
								<div class="panel panel-primary">
										<div class="table-responsive">          
											<table class="table table-hover table-striped">
												<!-- Título -->
												<thead>
													<!-- Contenido -->
													<tr>
														<th>#</th>
														<th>Código</th>´
														<th>Nombre</th>´
														<th>Marca</th>
														<th>Modelo</th>
														<th>Línea</th>
														<th>UM</th>
														<th>Color</th>
														<th>Precio</th>
														<th>Estado del producto</th>
														<th>Editar</th>
														<th>Habilitar/Deshaibilitar</th>
													</tr>
												</thead>
												<!-- Cuerpo de la tabla -->
												<tbody class="buscar">
													<!-- Contenido de la tabla -->
														<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
														<?php
															$VerProductos = "SELECT * FROM producto";
															// Hacemos la consulta
															$resultado = $mysqli->query($VerProductos);
															while ($row = mysqli_fetch_array($resultado)){
																?>
																<tr>
																	<td><span id="idProducto<?php echo $row['idProducto'];?>"><?php echo $row['idProducto'] ?></span></td>
																	<td><span id="CodigoProducto<?php echo $row['idProducto'];?>"><?php echo $row['NumeroInvenProd'] ?></span></td>
																	<td><span id="NombreProducto<?php echo $row['idProducto'];?>"><?php echo $row['NombreProducto'] ?></span></td>
																	<td><span id="idMarca<?php echo $row['idProducto'];?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
																															<?php							
																																$VerMarca = "SELECT NombreMarca FROM Marca WHERE idMarca='".$row['idMarca']."';";
																																// Hacemos la consulta
																																$ResultadoConsultaMarca = $mysqli->query($VerMarca);
																																$FilaResultadoMarca = $ResultadoConsultaMarca->fetch_assoc();
																																$NombreMarca = $FilaResultadoMarca['NombreMarca'];
																																echo $NombreMarca;
																															?></span></td>
																	<td><span id="ModeloProducto<?php echo $row['idProducto'];?>"><?php echo $row['ModeloProducto'] ?></span></td>
																	<td><span id="NombreLineaProducto<?php echo $row['idProducto'];?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
																																		<?php							
																																			$VerLineaProducto = "SELECT NombreLineaProducto FROM lineaproducto WHERE idLinea='".$row['idLinea']."';";
																																			// Hacemos la consulta
																																			$ResultadoConsultaLineaProducto = $mysqli->query($VerLineaProducto);
																																			$FilaResultadoLinea = $ResultadoConsultaLineaProducto->fetch_assoc();
																																			$NombreLinea = $FilaResultadoLinea['NombreLineaProducto'];
																																			echo $NombreLinea;
																																		?></span></td>
																	<td><span id="NombreUnidadMedida<?php echo $row['idProducto'];?>"><!-- Acá mostraremos el nombre de la persona a partir del id que se tiene en la tabla -->
																																		<?php							
																																			$VerMedida = "SELECT NombreUnidadMedida FROM unidadmedida WHERE idUnidadMedida='".$row['idUnidadMedida']."';";
																																			// Hacemos la consulta
																																			$ResultadoConsultaMedida = $mysqli->query($VerMedida);
																																			$FilaResultadoMedida = $ResultadoConsultaMedida->fetch_assoc();
																																			$NombreMedida = $FilaResultadoMedida['NombreUnidadMedida'];
																																			echo $NombreMedida;
																																		?></span></td>
																	<td><span id="ColorProducto<?php echo $row['idProducto'];?>"><?php echo $row['ColorProducto'] ?></span></td>
																	<td><span id="PrecioProducto<?php echo $row['idProducto'];?>"><?php echo $row['PrecioProducto'] ?></span></td>
																	<td><span id="EstadoProducto<?php echo $row['idProducto'];?>"><?php echo $row['EstadoProducto'] ?></span></td>
																	<td>
																	<?php
																		if($row['EstadoProducto'] == 'Habilitado'){
																		?>
																			<!-- Edición activada-->
																			<div>
																				<div class="input-group input-group-lg">
																					<button type="button" class="btn btn-success EditarProducto" value="<?php echo $row['idProducto']; ?>"><span class="glyphicon glyphicon-edit"></span></button>
																				</div>
																			</div>
																		<?php
																		}
																		else if($row['EstadoProducto'] == 'Deshabilitado'){
																		?>
																			<!-- Edición desactivada-->
																			<div>
																				<div class="input-group input-group-lg">
																					<button type="button" class="btn btn-success EditarProductoDesac" disabled="true"><span class="glyphicon glyphicon-edit"></span></button>
																				</div>
																			</div>
																		<?php
																		}
																		?>
																	</td>
																	<?php
																		if($row['EstadoProducto'] == 'Habilitado'){
																		?>
																			<td>
																				<!-- Deshabilitación -->
																				<div>
																					<div class="input-group input-group-lg">
																						<button type="button" class="btn btn-warning DeshabilitarProducto"  value="<?php echo $row['idProducto']; ?>"><span class="glyphicon glyphicon-minus"></span></button>
																					</div>
																				</div>
																			</td>
																		<?php
																		}
																		else if($row['EstadoProducto'] == 'Deshabilitado'){
																		?>
																			<td>
																				<!-- Habilitación -->
																				<div>
																					<div class="input-group input-group-lg">
																						<button type="button" class="btn btn-success HabilitarProducto"  value="<?php echo $row['idProducto']; ?>"><span class="glyphicon glyphicon-check"></span></button>
																					</div>
																				</div>
																			</td>
																		<?php
																		}
																	?>
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
					<div class="modal fade" id="ModalDeshabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Deshabilitar producto</h1></center>
								</div>
								<form method="post" action="Producto.php" id="myForm">
								<div class="modal-body text-center">
									<p class="lead">¿Está seguro que desea deshabilitar al siguiente producto?</p>
									<div class="form-group input-group">
										<input type="text" name="idProductoDeshabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idProductoDeshabilitar">
										<br>
										<label id="NombreProductoDeshabilitar"></label>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
									<input type="submit" name="DeshabilitarProd" class="btn btn-warning" value="Deshabilitar producto">
								</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				<!-- Edit Modal-->
					<div class="modal fade" id="ModalHabilitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h1 class="modal-title" id="myModalLabel">Habilitar producto</h1></center>
								</div>
								<form method="post" action="Producto.php" id="myForm">
								<div class="modal-body text-center">
									<p class="lead">¿Está seguro que desea habilitar al siguiente producto?</p>
									<div class="form-group input-group">
										<input type="text" name="idProductoHabilitar" style="width:350px; visibility:hidden;" class="form-control" id="idProductoHabilitar">
										<br>
										<label id="NombreProductoHabilitar"></label>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
									<input type="submit" name="HabilitarProd" class="btn btn-success" value="Habilitar producto">
								</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				<!-- Edit Modal-->
					<div class="modal fade" id="ModalEditarProducto" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<center><h4 class="modal-title" id="myModalLabel">Editar producto</h4></center>
								</div>
								<form method="post" action="Producto.php" id="frmEdit">
									<div class="modal-body">
									<div class="container-fluid">
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">ID</span>
												<input type="text" style="width:350px;" class="form-control" name="idEditar" id="idEditar">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Nombre producto</span>
												<input type="text" style="width:350px;" class="form-control" name="NombreProducto" id="NombreProducto">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Marca</span>
												<select class="form-control" name="Marca" id="Marca">
												<option value="" disabled selected>Marca</option>
													<!-- Acá mostraremos los puestos que existen en la base de datos -->
													<?php							
														$VerMarcas = "SELECT * FROM marca;";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerMarcas);			
															while ($row = mysqli_fetch_array($resultado)){
																?>
																<option value="<?php echo $row['idMarca'];?>"><?php echo $row['NombreMarca'] ?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Modelo</span>
												<input type="text" style="width:350px;" class="form-control" name="ModeloProducto" id="ModeloProducto">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Línea</span>
												<select class="form-control" name="LineaProducto" id="LineaProducto">
												<option value="" disabled selected>Línea</option>
													<!-- Acá mostraremos los puestos que existen en la base de datos -->
													<?php							
														$VerPuestos = "SELECT * FROM lineaproducto;";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerPuestos);			
															while ($row = mysqli_fetch_array($resultado)){
																?>
																<option value="<?php echo $row['idLinea'];?>"><?php echo $row['NombreLineaProducto'] ?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Unidad de Medida</span>
												<select class="form-control" name="UnidadMedida" id="UnidadMedida">
												<option value="" disabled selected>Unidad de medida</option>
													<!-- Acá mostraremos los puestos que existen en la base de datos -->
													<?php							
														$VerPuestos = "SELECT * FROM unidadmedida;";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerPuestos);			
															while ($row = mysqli_fetch_array($resultado)){
																?>
																<option value="<?php echo $row['idUnidadMedida'];?>"><?php echo $row['NombreUnidadMedida'] ?></option>
													<?php
															}
													?>
												</select>
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Color</span>
												<input type="text" style="width:350px;" class="form-control" name="ColorProducto" id="ColorProducto">
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon" style="width:150px;">Precio</span>
												<input type="number" style="width:350px;" class="form-control" name="PrecioProducto" id="PrecioProducto">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
										<input type="submit" name="EditarProducto" class="btn btn-success" value="Editar producto">
									</div>
								</form>
							</div>
						</div>
					</div>
				<!-- /.modal -->
				<?php
					// Código que recibe la información del formulario modal (Deshabilitar)
					if (isset($_POST['DeshabilitarProd'])) {
						// Guardamos el id en una variable
						$idProducto = $_POST['idProductoDeshabilitar'];
						// Preparamos la consulta
						$query = "UPDATE producto SET EstadoProducto = 'Deshabilitado' WHERE idProducto=".$idProducto.";";
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
    						<div class="form-group">
									<form name="Alerta">
										<div class="container">
											<div class="row text-center">
												<div class="container-fluid">
													<div class="row">
														<div class="col-xs-10 col-xs-offset-1">
															<div class="alert alert-success">Producto deshabilitado</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Producto.php\">"; 
    					}
					}
					// Código que recibe la información del formulario modal (Habilitar)
					if (isset($_POST['HabilitarProd'])) {
						// Guardamos el id en una variable
						$idProducto = $_POST['idProductoHabilitar'];
						// Preparamos la consulta
						$query = "UPDATE producto SET EstadoProducto = 'Habilitado' WHERE idProducto=".$idProducto.";";
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
    						<div class="form-group">
									<form name="Alerta">
										<div class="container">
											<div class="row text-center">
												<div class="container-fluid">
													<div class="row">
														<div class="col-xs-10 col-xs-offset-1">
															<div class="alert alert-success">Producto habilitado</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Producto.php\">"; 
    					}
					}
					// Código que recibe la información del formulario modal (Editar)
					if (isset($_POST['EditarProducto'])) {
						// Guardamos la info en variables
						$idProducto = $_POST['idEditar'];
						$NombreProducto = $_POST['NombreProducto'];
						$Marca = $_POST['Marca'];
						$ModeloProducto = $_POST['ModeloProducto'];
						$LineaProducto = $_POST['LineaProducto'];
						$UnidadMedida = $_POST['UnidadMedida'];
						$ColorProducto = $_POST['ColorProducto'];
						$PrecioProducto = $_POST['PrecioProducto'];
						
						// Preparamos la consulta
						$query = "UPDATE producto SET NombreProducto = '".$NombreProducto."',
													  idMarca = ".$Marca.",
													  ModeloProducto = '".$ModeloProducto."',
													  idLinea = ".$LineaProducto.",
													  idUnidadMedida = ".$UnidadMedida.",
													  ColorProducto = '".$ColorProducto."',
													  PrecioProducto = '".$PrecioProducto."'
												WHERE idProducto=".$idProducto.";";
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
    						<div class="form-group">
									<form name="Alerta">
										<div class="container">
											<div class="row text-center">
												<div class="container-fluid">
													<div class="row">
														<div class="col-xs-10 col-xs-offset-1">
															<div class="alert alert-success">Producto editado correctamente</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
    						<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=Producto.php\">"; 
    					}
					}
				?>
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
