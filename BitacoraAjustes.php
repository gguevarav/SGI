<!--
	Módulo de Bitácora de ajustes
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
					  <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="defaultNavbar1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventario<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="EntradaInventario.php">Entrada de inventario</a></li>
									<li><a href="SalidaInventario.php">Salida de inventario</a></li>
									<li><a href="Inventario.php">Ver inventario</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="RegistroProducto.php">Registrar Producto</a></li>
									<li><a href="Producto.php">Lista de Productos</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajuste<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Ajuste.php">Ajuste de inventario</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hojas de Reponsabilidad<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="CrearHojaResponsabilidad.php">Crear hoja de responsabilidad</a></li>
									<li><a href="HojaResponsabilidad.php">Lista hojas de responsabilidad</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bitácoras<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="BitacoraEntradas.php">Bitácora de entradas de inventario</a></li>
									<li><a href="BitacoraSalidas.php">Bitácora de salidas de inventario</a></li>
									<li><a href="">Bitácora de ajustes de inventario</a></li>
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
							<a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><?php echo $NombreUsuario; ?></a></li>
								<?php
									if($_SESSION["PrivilegioUsuario"] == 'Administrador'){
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
										<h1 class="text-center">Bitácora de ajustes en el inventario</h1>
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
													<th>Fecha y hora</th>
													<th>Artículo</th>
													<th>Cantidad</th>
													<th>Comentario</th>
													<th>Realizado por</th>
												</tr>
											</thead>
											<!-- Cuerpo de la tabla -->
											<tbody>
												<!-- Contenido de la tabla -->
													<!-- Acá mostraremos los usuarios y seleccionaremos el que deseamos eliminar -->
													<?php							
														$VerProductos = "SELECT * FROM ajusteinventario";
														// Hacemos la consulta
														$resultado = $mysqli->query($VerProductos);
															while ($row = mysqli_fetch_array($resultado)){
																?>
																<tr>
																<td><span id="idAjusteInventario<?php echo $row['idAjusteInventario'];?>"><?php echo $row['idAjusteInventario'] ?></span></td>
																<td><span id="FechaHoraAjuste<?php echo $row['idAjusteInventario'];?>"><?php echo $row['FechaHoraAjusteInventario'] ?></span></td>
																<td><span id="Producto<?php echo $row['idAjusteInventario'];?>"><!-- Acá mostraremos el nombre del producto a partir del id que se tiene en la tabla -->
																																		<?php							
																																			$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row['idProducto'].";";
																																			// Hacemos la consulta
																																			$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
																																			$FilaResultado = $ResultadoVerProducto->fetch_assoc();
																																			$NombreProducto = $FilaResultado['NombreProducto'];
																																			echo $NombreProducto;
																																		?></span></td>
																<td><span id="Cantidad<?php echo $row['idAjusteInventario'];?>"><?php echo $row['CantidadAjusteInventario'] ?></span></td>
																<td><span id="Comentario<?php echo $row['idAjusteInventario'];?>"><?php echo $row['ComentarioAjusteInventario'] ?></span></td>
																<td><span id="Usuario<?php echo $row['idAjusteInventario'];?>"><?php echo $row['UsuarioAjusteInventario'] ?></span></td>
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
