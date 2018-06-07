<!--
	Módulo de ingreso de datos al inventario
	Lunes, 14 de mayo del 2018
	11:16 PM
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
		//include_once 'Seguridad/conexion.php';
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
									<li><a href="#">Salida de inventario</a></li>
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
				<div class="container">
					<div class="row text-center">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-8">
								<h1 class="text-center">Salida de productos del inventario</h1>
								</div>
								<!-- Contenedor del ícono del Usuario -->
								<div class="col-xs-4 Icon">
									<!-- Icono de usuario -->
									<span class="glyphicon glyphicon-remove"></span>
								</div>
							</div>
							<br>
							<div class="form-group">
								<form name="SalidaInventario" action="SalidaInventario.php" method="post">
									<!-- Producto-->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
												<select class="form-control" name="Producto" id="Producto">
												<option value="" disabled selected>Producto   -   Cantidad disponible</option>
													<!-- Acá mostraremos los puestos que existen en la base de datos -->
													<?php							
														$VerProductos = "SELECT * FROM inventario;";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerProductos);	
														while ($row = mysqli_fetch_array($resultado)){
															// Guardamos el id del Producto en una variable para su uso
															$idProducto = $row['idProducto'];
															// Hacemos la otra consulta para mostrar el nombre que tiene cada producto
															$VerProducto = "SELECT NombreProducto FROM producto WHERE idProducto =".$idProducto.";";
															$ResultadoVerProducto = $mysqli->query($VerProducto);			
															$FilaResultante = mysqli_fetch_array($ResultadoVerProducto);
															$NombreProducto = $FilaResultante['NombreProducto'];
															$CantidadInventario = $row['CantidadInventario'];
															if($CantidadInventario != 0){
																?>
																<option value="<?php echo $idProducto ?>"><?php echo $NombreProducto. "   -   " . $row['CantidadInventario'] ?></option>
													<?php
																}
															}
													?>
												</select>
											</div>
										</div>
									</div>
									<br>
									<!-- Cantidad de Producto -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-question-sign"></i></span>
												<input type="number" class="form-control" name="Cantidad" placeholder="Cantidad" id="Cantidad" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- Detalle del Producto -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
												<textarea class="form-control" rows="5" id="DetalleSalida" name="DetalleSalida" placeholder="Detalle" aria-describedby="sizing-addon1" required></textarea>
											</div>
										</div>
									</div>
									<br>
									<!-- Resgistrar -->
									<div class="row">
										<div class="col-xs-12 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<input type="submit" name="SalidaInventario" class="btn btn-primary" value="Dar salida">
													<button type="button" class="btn btn-danger">Cancelar</button>
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
					// Insersión de entradas al inventario
					if (isset($_POST['SalidaInventario'])) {
						// Guardamos la información en variables
						$Producto = $_POST['Producto'];
						$Cantidad = $_POST['Cantidad'];
						$DetalleSalida = $_POST['DetalleSalida'];
						$FechaHora=date('Y-m-d H:i:s');
						$Usuario=$_SESSION["Usuario"];
					
						// Preparamos la consulta, esta insertará en la tabla de registro entrada
						$query = "INSERT INTO registrosalida(FechaHoraSalida, UsuarioSalida, idProducto, CantidadSalida, DetalleSalida)
											  VALUES('".$FechaHora."', '".$Usuario."', ".$Producto.", ".$Cantidad.", '".$DetalleSalida."');";
						// Lo primero que debemos hacer para restar en la tabla de inventario es saber si ya existe el producto dentro del inventario
						// Preparamos una consulta que nos verificará si ya existe, en caso dado que si, obtenemos el id del la fila, obtenemos la cantidad que tiene
						// y le restamos la cantidad que estamos registrando
						$ConsultaExisteInventario = "SELECT idInventario, idProducto, CantidadInventario FROM inventario WHERE idProducto=".$Producto.";";
						$ResultadoExisteInventario = $mysqli->query($ConsultaExisteInventario);			
						$row = mysqli_fetch_array($ResultadoExisteInventario);
						if($row['idProducto'] != null){
							// Esta es la cantidad que ya existe en la base de datos
							$CantidadDisponible = $row['CantidadInventario'];
							// Sumamos la disponible más lo que se desea insertar
							$CantidadFinal = $CantidadDisponible -= $Cantidad;
							// Línea del inventario que vamos a utilizará
							$LineaInventario = $row['idInventario'];
							// Consulta
							$ActualizarCantidadInventario = "UPDATE inventario
															 SET CantidadInventario=".$CantidadFinal."
															 WHERE idInventario=".$LineaInventario.";";
							// Ejecutamos la primer consulta
							if(!$resultado = $mysqli->query($query)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $query . "\n";
								echo "Errno: " . $mysqli->errno . "\n";
								echo "Error: " . $mysqli->error . "\n";
								exit;
							}
							// Ejecutamos la segunda consulta
							if(!$resultado1 = $mysqli->query($ActualizarCantidadInventario)){
								echo "Error: La ejecución de la consulta falló debido a: \n";
								echo "Query: " . $ActualizarCantidadInventario . "\n";
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
															<div class="alert alert-success">Se le dió salida a  
																								<?php
																									// Mostramos la cantidad que agregamos para ver de cuánto fué el ingreso del producto, también mostramos
																									// el nombre del producto que estamos registrando
																									$Cantidad = $_POST['Cantidad'];
																									$Producto = $_POST['Producto']; 
																									echo $Cantidad . " ";
																									// Consultaremos el nombre del producto que estamos registrando
																									$VerNombreProducto = "SELECT NombreProducto FROM Producto WHERE idProducto=".$Producto.";";
																									// Hacemos la consulta
																									$resultado = $mysqli->query($VerNombreProducto);			
																									$row = mysqli_fetch_array($resultado);
																									$NombreProducto = $row['NombreProducto'];
																									echo $NombreProducto;
																								?>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
								// Recargamos la página
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=SalidaInventario.php\">"; 
							}
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
															<div class="alert alert-warning">Este artículo no existe en el inventario</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
								// Recargamos la página
								//echo "<meta http-equiv=\"refresh\" content=\"0;URL=SalidaInventario.php\">"; 
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
