<!--
	Módulo de registro de productos
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
										<li><a href="#">Registrar Producto</a></li>
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
				<div class="container">
					<div class="row text-center">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6">
									<h1 class="text-center">Registro de Productos</h1>
								</div>
								<!-- Contenedor del ícono del Usuario -->
								<div class="col-xs-6 Icon">
									<!-- Icono de usuario -->
									<span class="glyphicon glyphicon-edit"></span>
								</div>
							</div>
							<br>
							<div class="form-group">
								<form name="RregistrarProduto" action="RegistroProducto.php" method="post">
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
												<input type="text" class="form-control" name="CodigoInventario" placeholder="Código" id="CodigoInventario" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- Nombre del producto -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-edit"></i></span>
												<input type="text" class="form-control" name="NombreProducto" placeholder="Nombre" id="NombreProducto" aria-describedby="sizing-addon1" required>
											</div>
										</div>
									</div>
									<br>
									<!-- MarcaProducto-->
									<div class="row">
										<div class="col-xs-9 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
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
										</div>
										<!-- Button trigger modal -->
										<div class="col-xs-1">
											<div class="input-group input-group-lg">
												<button type="button" class="btn btn-success btn-lg AgregarMarca" value="" data-toggle="modal" data-target="#ModalAgregarMarca">+</button>
											</div>
										</div>
									</div>
									<br>
									<!-- Modelo producto -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
												<input type="text" class="form-control" name="Modelo" placeholder="Modelo" id="Modelo" aria-describedby="sizing-addon1">
											</div>
										</div>
									</div>
									<br>
									<!-- Linea producto -->
									<div class="row">
										<div class="col-xs-9 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-check"></i></span>
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
										</div>
										<!-- Button trigger modal -->
										<div class="col-xs-1">
											<div class="input-group input-group-lg">
												<button type="button" class="btn btn-success btn-lg AgregarLinea" value="" data-toggle="modal" data-target="#ModalAgregarLinea">+</button>
											</div>
										</div>
									</div>
									<br>
									<!-- UnidadMedida -->
									<div class="row">
										<div class="col-xs-9 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-leaf"></i></span>
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
										</div>
										<!-- Button trigger modal -->
										<div class="col-xs-1">
											<div class="input-group input-group-lg">
												<button type="button" class="btn btn-success btn-lg AgregarUnidadMedida" value="" data-toggle="modal" data-target="#ModalAgregarUnidadMedida">+</button>
											</div>
										</div>
									</div>
									<br>
									<!-- Color Producto -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-tint"></i></span>
												<input type="text" class="form-control" name="ColorProducto" placeholder="Color" id="ColorProducto" aria-describedby="sizing-addon1">
											</div>
										</div>
									</div>
									<br>
									<!-- Precio del Producto -->
									<div class="row">
										<div class="col-xs-10 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
												<input type="text" class="form-control" name="Precio" placeholder="Precio" id="Precio" aria-describedby="sizing-addon1">
											</div>
										</div>
									</div>
									<br>
									<!-- Resgistrar -->
									<div class="row">
										<div class="col-xs-12 col-xs-offset-1">
											<div class="input-group input-group-lg">
												<div clss="btn-group">
													<input type="submit" name="RegistrarProducto" class="btn btn-primary" value="Registrar">
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
				<!-- Modal para crear marcas -->
				<div class="modal fade slide left" id="ModalAgregarMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

						</button>
						<h1 class="modal-title" id="myModalLabel">Registrar nueva marca</h1>

					  </div>
					  <div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<form method="post" id="myForm">
						  <div class="form-group">
							<label for="email">Nombre de marca</label>
							<input type="text" name="NombreMarca" id="NombreMarca" class="form-control" placeholder="Nombre" value="" required/>
						  </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarMarca" class="btn btn-success" value="Registrar marca">
					  </div>
					</form>
					</div>
				  </div>
				</div>
				<!-- /Modal Agregar Marcas -->
				<!-- Modal para crear lineas -->
				<div class="modal fade slide left" id="ModalAgregarLinea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

						</button>
						<h1 class="modal-title" id="myModalLabel">Registrar nueva línea</h1>

					  </div>
					  <div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<form method="post" id="myForm">
						  <div class="form-group">
							<label for="email">Nombre de la línea</label>
							<input type="text" name="NombreLinea" id="NombreLinea" class="form-control" placeholder="Nombre" value="" required/>
						  </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarLinea" class="btn btn-success" value="Registrar linea">
					  </div>
					</form>
					</div>
				  </div>
				</div>
				<!-- /Modal Agregar lineas -->
				<!-- Modal para crear UnidadMedida -->
				<div class="modal fade slide left" id="ModalAgregarUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

						</button>
						<h1 class="modal-title" id="myModalLabel">Registrar nueva unidad de medida</h1>

					  </div>
					  <div class="modal-body">
						<p class="lead">Ingrese los datos</p>
						<form method="post" id="myForm">
						  <div class="form-group">
							<label for="email">Nombre de la unidad de medida</label>
							<input type="text" name="NombreUnidad" id="NombreUnidad" class="form-control" placeholder="Nombre" value="" required/>
						  </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<input type="submit" name="AgregarUnidad" class="btn btn-success" value="Registrar unidad de medida">
					  </div>
					</form>
					</div>
				  </div>
				</div>
				<!-- /Modal Agregar Unidad de medida -->
				<?php
				// Código que recibe la información para registrar un producto
					if (isset($_POST['RegistrarProducto'])) {
						// Guardamos la información en variables
						$CodigoInventario = $_POST['CodigoInventario'];
						$NombreProducto = $_POST['NombreProducto'];
						if(isset($_POST['Marca'])){
							$Marca = $_POST['Marca'];
						}
						else{
							$Marca = 1;
						}
						if(isset($_POST['Modelo'])){
							$Modelo = $_POST['Modelo'];
						}
						else{
							$Modelo = 1;
						}
						if(isset($_POST['LineaProducto'])){
							$LineaProducto = $_POST['LineaProducto'];
						}
						else{
							$LineaProducto = 1;
						}
						if(isset($_POST['UnidadMedida'])){
							$UnidadMedida = $_POST['UnidadMedida'];
						}
						else{
							$UnidadMedida = 1;
						}
						$ColorProducto = $_POST['ColorProducto'];
						$Precio = $_POST['Precio'];
						
						//Primero revisamos que no exista la marca ya en la base de datos
						$ConsultaExisteProducto = "SELECT NumeroInvenProd FROM producto WHERE NumeroInvenProd='".$CodigoInventario."';";
						$ResultadoExisteProducto = $mysqli->query($ConsultaExisteProducto);			
						$row = mysqli_fetch_array($ResultadoExisteProducto);
						if($row['NumeroInvenProd'] != null){
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-success">Este código ya existe en el inventario</div>
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
							// Preparamos la consulta
							$query = "INSERT INTO producto(NombreProducto, PrecioProducto, idMarca, idUnidadMedida, NumeroInvenProd, ModeloProducto, idLinea, ColorProducto, EstadoProducto)
												  VALUES('".$NombreProducto."', '".$Precio."', ".$Marca.", ".$UnidadMedida.", '".$CodigoInventario."', '".$Modelo."', ".$LineaProducto.", '".$ColorProducto."', 'Habilitado')";
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
															<div class="alert alert-success">Producto registrado</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
								// Recargamos la página
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
							}
						}
					}
					// Código que recibe la información para agregar nueva marca
					if (isset($_POST['AgregarMarca'])) {
						// Guardamos la información en variables
						$NombreMarca = $_POST['NombreMarca'];
						//Primero revisamos que no exista la marca ya en la base de datos
						$ConsultaExisteMarca = "SELECT NombreMarca FROM marca WHERE NombreMarca='".$NombreMarca."';";
						$ResultadoExisteMarca = $mysqli->query($ConsultaExisteMarca);
						$row = mysqli_fetch_array($ResultadoExisteMarca);
						if($row['NombreMarca'] != null){
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-success">La marca ya existe</div>
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
							// Preparamos la consulta
							$query = "INSERT INTO marca(NombreMarca)
												  VALUES('".$NombreMarca."');";
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
															<div class="alert alert-success">Marca registrada</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
								// Recargamos la página
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
							}
						}
					}
					// Termina código para agregar una nueva marca
					// Código que recibe la información para agregar una nueva linea
					if (isset($_POST['AgregarLinea'])) {
						// Guardamos la información en variables
						$NombreLinea = $_POST['NombreLinea'];
						//Primero revisamos que no exista la marca ya en la base de datos
						$ConsultaExisteLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE NombreLineaProducto='".$NombreLinea."';";
						$ResultadoExisteLinea = $mysqli->query($ConsultaExisteLinea);
						$row = mysqli_fetch_array($ResultadoExisteLinea);
						if($row['NombreLineaProducto'] != null){
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-success">La línea ya existe</div>
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
							// Preparamos la consulta
							$query = "INSERT INTO lineaproducto(NombreLineaProducto)
												  VALUES('".$NombreLinea."');";
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
															<div class="alert alert-success">Línea registrada</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
								// Recargamos la página
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
							}
						}
					}
					// Termina código para agregar la línea
					// Código que recibe la información para agregar una nueva unidad
					if (isset($_POST['AgregarUnidad'])) {
						// Guardamos la información en variables
						$NombreUnidad = $_POST['NombreUnidad'];
						//Primero revisamos que no exista la marca ya en la base de datos
						$ConsultaExisteUnidad = "SELECT NombreUnidadMedida FROM unidadmedida WHERE NombreUnidadMedida='".$NombreUnidad."';";
						$ResultadoExisteUnidad = $mysqli->query($ConsultaExisteUnidad);
						$row = mysqli_fetch_array($ResultadoExisteUnidad);
						if($row['NombreUnidadMedida'] != null){
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-success">La unidad de medida ya existe</div>
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
							// Preparamos la consulta
							$query = "INSERT INTO unidadmedida(NombreUnidadMedida)
												  VALUES('".$NombreUnidad."');";
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
															<div class="alert alert-success">Unidad de medida registrada</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<?php
								// Recargamos la página
								echo "<meta http-equiv=\"refresh\" content=\"0;URL=RegistroProducto.php\">"; 
							}
						}
					}
					// Termina código para agregar una nueva unidad
				?>
				<!-- Modal crear marca -->
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
