<!--
	Módulo de registro de productos
	Lunes, 14 de mayo del 2018
	10:27 PM
	Gemis Daniel Guevara Villeda
	UMG - Morales Izabal
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SGI</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login -->
<link rel="stylesheet" type="text/css" href="text/estilo.css"> 

</head>
	<?php
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 'administrador'){
		?>
			<body>
				<nav class="navbar navbar-default">
				  <div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="principal.php">Administración</a></div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="defaultNavbar1">
					  <ul class="nav navbar-nav">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gestión de Usuarios<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="#">Crear usuario</a></li>
							<li><a href="#">Eliminar Usuario</a></li>
							<li><a href="#">Editar usuario</a></li>
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

				<div class="container">
				  <div class="row text-center">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-6 col-xs-offset-3">
							<h1 class="text-center">Registro de Productos</h1>
							</div>
						</div>
						<!-- Contenedor del ícono del Usuario -->
						
							<div class="Icon">
								<!-- Icono de usuario -->
								<span class="glyphicon glyphicon-edit"></span>
							</div>
						
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
					<!-- Precio del Producto -->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-usd"></i></span>
								<input type="text" class="form-control" name="Precio" placeholder="Precio" id="Precio" aria-describedby="sizing-addon1" required>
							</div>
						</div>
					</div>
					<br>
					<!-- Codigo de inventario -->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-qrcode"></i></span>
								<input type="text" class="form-control" name="CodigoInventario" placeholder="Código" id="CodigoInventario" aria-describedby="sizing-addon1" required>
							</div>
						</div>
					</div>
					<br>
					<!-- MarcaProducto-->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-asterisk"></i></span>
								<select class="form-control" name="Marca" id="Marca">
								<option value="" disabled selected>Marca</option>
										<option value=""></option>
										<option value=""></option>
										<option value=""></option>
								</select>
							</div>
						</div>
					</div>
					<br>
					<!-- Modelo producto -->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-ok"></i></span>
								<input type="number" class="form-control" name="Modelo" placeholder="Modelo" id="Modelo" aria-describedby="sizing-addon1" required>
							</div>
						</div>
					</div>
					<br>
					<!-- Linea producto -->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-check"></i></span>
								<select class="form-control" name="LineaProducto" id="LineaProducto">
								<option value="" disabled selected>Línea</option>
										<option value=""></option>
										<option value=""></option>
										<option value=""></option>
								</select>
							</div>
						</div>
					</div>
					<br>
					<!-- UnidadMedida -->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-leaf"></i></span>
								<select class="form-control" name="UnidadMedida" id="PuestoUsuario">
								<option value="" disabled selected>Unidad de medida</option>
										<option value=""></option>
										<option value=""></option>
										<option value=""></option>
								</select>
							</div>
						</div>
					</div>
					<br>
					<!-- Color Producto -->
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-eye-open"></i></span>
								<input type="text" class="form-control" name="ColorProducto" placeholder="Color" id="ColorProduct" aria-describedby="sizing-addon1" required>
							</div>
						</div>
					</div>
					<br>
					<!-- Resgistrar -->
					<div class="row">
						<div class="col-xs-12 col-xs-offset-1">
							<div class="input-group input-group-lg">
								<div clss="btn-group">
									<button type="button" class="btn btn-primary">Registrar</button>
									<button type="button" class="btn btn-danger">Cancelar</button>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
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
