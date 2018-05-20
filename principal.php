	<!--
	Módulo Principal
	Martes, 17 de abril el 2018
	9:00 PM
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
				<br>
				<br>
				<br>
				<div class="container-fluid">
				  <div class="row">
					<div class="col-md-6 col-md-offset-3">
					  <h1 class="text-center">Estación de Bomberos</h1>
					</div>
				  </div>
				</div>
				<div class="container">
				  <div class="row text-center">
					<div class="col-md-10 col-md-offset-1">Página principal de administración del sistema del proyecto SGI de curso ATI.</div>
				  </div>
				  <!--
				  <div class="row">
					<div class="text-justify col-sm-4"> Click here to select this<strong> column.</strong> Always place your content within a column. Columns are indicated by a dashed blue line. </div>
					<div class="col-sm-4 text-justify"> You can <strong>resize a column</strong> using the handle on the right. Drag it to increase or reduce the number of columns.</div>
					<div class="col-sm-4 text-justify"> You can <strong>offset a column</strong> using the handle on the left. Drag it to increase or reduce the offset. </div>
				  </div>
				  <hr>
				  <div class="row">
					<div class="text-center col-md-12">
					  <div class="well"><strong> Easily build your page using the Bootstrap components from the Insert panel.</strong></div>
					</div>
				  </div>
				  <div class="row">
					<div class="col-sm-4 text-center">
					  <h4>Adding <strong>Buttons</strong></h4>
					  <p>Quickly add buttons to your page by using the button component in the insert panel. </p>
					  <button type="button" class="btn btn-info btn-sm">Info Button</button>
					  <button type="button" class="btn btn-success btn-sm">Success Button</button>
					</div>
					<div class="text-center col-sm-4">
					  <h4>Adding <strong>Labels</strong></h4>
					  <p>Using the insert panel, add labels to your page by using the label component.</p>
					  <span class="label label-warning">Info Label</span><span class="label label-danger">Danger Label</span> </div>
					<div class="text-center col-sm-4">
					  <h4>Adding <strong>Glyphicons</strong></h4>
					  <p>You can also add glyphicons to your page from within the insert panel.</p>
					  <div class="row">
						<div class="col-xs-4"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></div>
						<div class="col-xs-4"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> </div>
						<div class="col-xs-4"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
					  </div>
					</div>
				  </div>

				  <hr>
				  -->
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
				</div>
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
				<script src="js/jquery-1.11.3.min.js"></script>

				<!-- Include all compiled plugins (below), or include individual files as needed --> 
				<script src="js/bootstrap.js"></script>
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
