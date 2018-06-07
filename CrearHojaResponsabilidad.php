<!--
	Módulo de ingreso de datos al inventario
	Lunes, 14 de mayo del 2018
	11:59 PM
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
<!-- Incluimos el script que contiene los datos  --> 
<script src="js/CopiaElementos.js"></script>

</head>
	<?php
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Primero hacemos la consulta en la tabla de persona
		include_once "Seguridad/conexion.php";
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
									<li><a href="Inventario.php">Salida de inventario</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="RegistroProducto.php">Registrar Producto</a></li>
									<li><a href="Producto.php">Lista de Productos</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Crear hoja de responsabilidad</a></li>
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
					<form name="CrearUsuario" action="CrearHojaResponsabilidad.php" method="post">
						<div class="container">
							<div class="row text-center">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-6">
										<h1 class="text-center">Creación de hoja de responsabilidad</h1>
										</div>
										<!-- Contenedor del ícono del Usuario -->
										<div class="col-xs-6 Icon">
											<!-- Icono de usuario -->
											<span class="glyphicon glyphicon-list-alt"></span>
										</div>
									</div>
									<br>						
									<!-- Producto-->
									<div class="row">
										<div class="col-xs-11">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
												<select class="form-control" name="Persona" id="Persona" required>
												<option value="" disabled selected>Seleccione el responsable</option>
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
										<div class="col-xs-1">
												<!-- Button trigger modal -->
												<div class="input-group input-group-lg">
													<button type="button" class="btn btn-success btn-lg AgregarPersona" value="" data-toggle="modal" data-target="#ModalRegistrarPersona">+</button>
												</div>
											</div>
									</div>
									<br>
									<!-- Detalle del Producto -->
									<div class="row">
										<div class="col-xs-12">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-pencil"></i></span>
												<textarea class="form-control" rows="5" id="ObservacionHojaRespons" name="ObservacionHojaRespons" placeholder="Observaciones" aria-describedby="sizing-addon1"></textarea>
											</div>
										</div>
									</div>
									<br>
									<hr>
									<h3 class="text-center">Seleccione los artículos que tiene a cargo</h3>
									<br>
									<fieldset id="field">
										<div class="row">
											<div class="col-xs-11">
												<table class="table">
													<thead>
														<tr>
															<th scope="col">#</th>
															<th scope="col">Artículo</th>
															<th scope="col">Cantidad</th>
														</tr>
													</thead>
													<tbody id="CuerpoTabla">
														<tr>
															<th scope="row">1</th>
															<td>
																<div class="input-group input-group-lg">
																	<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
																	<select class="form-control" name="Producto1" id="Producto1" required>
																		<option value="" disabled selected>Seleccione el artículo</option>
																			<!-- Acá mostraremos los puestos que existen en la base de datos -->
																			<?php							
																				$VerProductos = "SELECT idProducto, NombreProducto FROM producto;";
																				// Hacemos la consulta
																				$resultado = $mysqli->query($VerProductos);			
																					while ($row = mysqli_fetch_array($resultado)){
																						?>
																						<option value="<?php echo $row['idProducto'];?>"><?php echo $row['NombreProducto'] ?></option>
																			<?php
																					}
																			?>
																	</select>
																</div>
															</td>
															<td>
																<div class="input-group input-group-lg">
																	<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
																	<input type="number" class="form-control" name="Cantidad1" placeholder="Cantidad" id="Cantidad1" aria-describedby="sizing-addon1" required>
																</div>
															</td>
														</tr>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-1">
												<!-- Button trigger modal -->
												<div class="input-group input-group-lg">
													<button type="button" class="btn btn-success btn-lg AgregarUnidadMedida" value="" data-toggle="modal" data-target="#ModalAgregarUnidadMedida" onclick="crear(this)">+</button>
												</div>
											</div>
										</div>
									</fieldset>
									<!-- Resgistrar -->
									<div class="row">
										<div class="col-xs-12">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<input type="submit" name="CrearHoja" class="btn btn-primary" value="Crear hoja de responsabilidad">
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
				<!-- Modal para crear Grupo al que pertenece -->
				<div class="modal fade slide left" id="ModalRegistrarPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

						</button>
						<h1 class="modal-title" id="myModalLabel">Registrar nueva persona</h1>

					  </div>
					  <div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<form method="post" id="myForm">
						  <div class="form-group">
							<label for="text">Nombres</label>
							<input type="text" name="NombrePersona" id="NombrePersona" class="form-control" placeholder="Nombres" value="" required/>
						  </div>
						  <div class="form-group">
							<label for="text">Apellidos</label>
							<input type="text" name="ApellidoPersona" id="ApellidoPersona" class="form-control" placeholder="Apellidos" value="" required/>
						  </div>
						  <div class="form-group">
							<label for="text">Dirección</label>
							<input type="text" name="DireccionPersona" id="DireccionPersona" class="form-control" placeholder="Dirección" value="" required/>
						  </div>
						  <div class="form-group">
							<label for="text">DPI</label>
							<input type="text" name="DPIPersona" id="DPIPersona" class="form-control" placeholder="DPI" value="" required/>
						  </div>
						  <div class="form-group">
							<label for="tel">Teléfono</label>
							<input type="tel" name="TelefonoPersona" id="TelefonoPersona" class="form-control" placeholder="Teléfono" value="" required/>
						  </div>
						  <div class="form-group">
							<label for="date">Fecha de nacimiento</label>
							<input type="date" name="FechaNacPersona" id="FechaNacPersona" class="form-control" placeholder="Fecha de nacimiento" value="" required/>
						  </div>
						  <div class="form-group">
							<label for="email">Correo</label>
							<input type="text" name="CorreoPersona" id="CorreoPersona" class="form-control" placeholder="Correo" value="" required/>
						  </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="GuardarPersona" class="btn btn-success" value="Registrar">
					  </div>
					  </form>
					</div>
				  </div>
				</div>			
				<!-- /.modal -->
				<?php
					// Código que recibe la información para agregar un nuevo Puesto
					if (isset($_POST['GuardarPersona'])) {
						// Guardamos la información en variables
						$NombrePersona = $_POST['NombrePersona'];
						$ApellidoPersona = $_POST['ApellidoPersona'];
						$DireccionPersona = $_POST['DireccionPersona'];
						$DPIPersona = $_POST['DPIPersona'];
						$TelefonoPersona = $_POST['TelefonoPersona'];
						$FechaNacPersona = $_POST['FechaNacPersona'];
						$CorreoPersona = $_POST['CorreoPersona'];
						
						// Preparamos la consulta
						$query = "INSERT INTO persona(NombrePersona, ApellidoPersona, DireccionPersona, DPIPersona, TelefonoPersona, FechaNacPersona, CorreoPersona)
											  VALUES('".$NombrePersona."', '".$ApellidoPersona."', '".$DireccionPersona."', '".$DPIPersona."', '".$TelefonoPersona."', '".$FechaNacPersona."', '".$CorreoPersona."');";
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
														<div class="alert alert-success">Persona Registrada</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<?php
							// Recargamos la página
    						echo "<meta http-equiv=\"refresh\" content=\"0;URL=CrearHojaResponsabilidad.php\">"; 
    					}
					}
					// Termina código para agregar puesto
					if (isset($_POST['CrearHoja'])) {
						// Primero insertaremos los datos principales en la tabla principal
						$FechaHojaResponsabilidad = date('Y-m-d H:i:s');
						$idPersonaEntrega = $idUsuario2;
						$ObservacionHojaRespons = $_POST['ObservacionHojaRespons'];
						$idPersonaRecibe = $_POST['Persona'];
						
						$ConsultaInsersionInfomacionHoja = "INSERT INTO hojaresponsabilidad (FechaHoraHojaRespons, idPersonaEntrega, ObservacionHojaRespons, idPersonaRecibe)
																					 VALUES('".$FechaHojaResponsabilidad."', ".$idPersonaEntrega.", '".$ObservacionHojaRespons."', ".$idPersonaRecibe.");";
																					 
						// Ejecutamos la primer consulta
						if(!$ResultadoInsersionInformacionHoja = $mysqli->query($ConsultaInsersionInfomacionHoja)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $ConsultaInsersionInfomacionHoja . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						else{
							$idHojaResponsabilidad = mysqli_insert_id($mysqli);
							// Contador que nos almacenará la cantidad de líneas que tenemos que ingresar
							$Contador = 1;
							while ($post = each($_POST)){
								//echo $post[0] . " = " . $post[1];
								// Si el nombre del primer POST contiene la palabra producto al principio seguido de un número
								if ($post[0] == "Producto".$Contador){
									$Cantidad = $_POST['Cantidad'.$Contador];
									// Si contiene la palabra inicial producto seguido de un número insertamos e valor en la tabla de datalle de hojas de responsabilidad
									$ConsultaInsersionInfomacionDetalleHoja = "INSERT INTO detalleprodhojasrespons (idHojaResponsabilidad, idProducto, CantidadDetalleProdHojasRespons)
																					 VALUES(".$idHojaResponsabilidad.", ".$post[1].", ".$Cantidad.");";
									if(!$ResultadoInsersionInfomacionDetalleHoja = $mysqli->query($ConsultaInsersionInfomacionDetalleHoja)){
										echo "Error: La ejecución de la consulta falló debido a: \n";
										echo "Query: " . $ConsultaInsersionInfomacionDetalleHoja . "\n";
										echo "Errno: " . $mysqli->errno . "\n";
										echo "Error: " . $mysqli->error . "\n";
										exit;
									}
									// Sumamos uno al contador
									$Contador++;
								}
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
