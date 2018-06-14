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
		include_once "Clases/clsPrincipal.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 'Administrador'){// Guardamos el nombre del usuario en una variable
			$NombreUsuario =$_SESSION["NombreUsuario"];
			$idUsuario2 =$_SESSION["idUsuario"];
			
			$sql1 = 'SELECT FechaHoraSalida, CantidadSalida FROM registrosalida;';
			$sql2 = 'SELECT FechaHoraEntrada, CantidadEntrada FROM registroentrada;';
			$sql3 = 'select idProducto, sum(CantidadInventario) as suma from inventario GROUP by idProducto';
			$sql4 = 'SELECT producto.NombreProducto, SUM(inventario.CantidadInventario)
					 FROM producto LEFT JOIN inventario ON producto.idProducto = inventario.idProducto
					 GROUP BY producto.idProducto;';
			
			// Guardamos las cantidades en variables
			$CantidadEneroSalida = 0;
			$CantidadFebreroSalida = 0;
			$CantidadMarzoSalida = 0;
			$CantidadAbrilSalida = 0;
			$CantidadMayoSalida = 0;
			$CantidadJunioSalida = 0;
			$CantidadJulioSalida = 0;
			$CantidadAgostoSalida = 0;
			$CantidadSeptiembreSalida = 0;
			$CantidadOctubreSalida = 0;
			$CantidadNoviembreSalida = 0;
			$CantidadDiciembreSalida = 0;
			$MesSalidas;			
			// Hacemos la consulta para mostrar las cantidades de salidas
			$resultado = $mysqli->query($sql1);			
			while ($row = mysqli_fetch_array($resultado)){
				$MesSalidas = date("n", strtotime($row['FechaHoraSalida']));
				switch($MesSalidas){
					case 1:
						$CantidadEneroSalida += $row['CantidadSalida'];
						break;
					case 2:
						$CantidadFebreroSalida += $row['CantidadSalida'];
						break;
					case 3:
						$CantidadMarzoSalida += $row['CantidadSalida'];
						break;
					case 4:
						$CantidadAbrilSalida += $row['CantidadSalida'];
						break;
					case 5:
						$CantidadMayoSalida += $row['CantidadSalida'];
						break;
					case 6:
						$CantidadJunioSalida += $row['CantidadSalida'];
						break;
					case 7:
						$CantidadJulioSalida += $row['CantidadSalida'];
						break;
					case 8:
						$CantidadAgostoSalida += $row['CantidadSalida'];
						break;
					case 9:
						$CantidadSeptiembreSalida += $row['CantidadSalida'];
						break;
					case 10:
						$CantidadOctubreSalida += $row['CantidadSalida'];
						break;
					case 11:
						$CantidadNoviembreSalida += $row['CantidadSalida'];
						break;
					case 12:
						$CantidadDiciembreSalida += $row['CantidadSalida'];
						break;
				}
			}
			// Guardamos las cantidades en variables
			$CantidadEneroEntrada = 0;
			$CantidadFebreroEntrada = 0;
			$CantidadMarzoEntrada = 0;
			$CantidadAbrilEntrada = 0;
			$CantidadMayoEntrada = 0;
			$CantidadJunioEntrada = 0;
			$CantidadJulioEntrada = 0;
			$CantidadAgostoEntrada = 0;
			$CantidadSeptiembreEntrada = 0;
			$CantidadOctubreEntrada = 0;
			$CantidadNoviembreEntrada = 0;
			$CantidadDiciembreEntrada = 0;
			$MesEntradas;
			// Hacemos la consulta para mostrar las cantidades de Entradas
			$resultado2 = $mysqli->query($sql2);			
			while ($row2 = mysqli_fetch_array($resultado2)){
				$MesEntradas = date("n", strtotime($row2['FechaHoraEntrada']));
				switch($MesEntradas){
					case 1:
						$CantidadEneroEntrada += $row2['CantidadEntrada'];
						break;
					case 2:
						$CantidadFebreroEntrada += $row2['CantidadEntrada'];
						break;
					case 3:
						$CantidadMarzoEntrada += $row2['CantidadEntrada'];
						break;
					case 4:
						$CantidadAbrilEntrada += $row2['CantidadEntrada'];
						break;
					case 5:
						$CantidadMayoEntrada += $row2['CantidadEntrada'];
						break;
					case 6:
						$CantidadJunioEntrada += $row2['CantidadEntrada'];
						break;
					case 7:
						$CantidadJulioEntrada += $row2['CantidadEntrada'];
						break;
					case 8:
						$CantidadAgostoEntrada += $row2['CantidadEntrada'];
						break;
					case 9:
						$CantidadSeptiembreEntrada += $row2['CantidadEntrada'];
						break;
					case 10:
						$CantidadOctubreEntrada += $row2['CantidadEntrada'];
						break;
					case 11:
						$CantidadNoviembreEntrada += $row2['CantidadEntrada'];
						break;
					case 12:
						$CantidadDiciembreEntrada += $row2['CantidadEntrada'];
						break;
				}
			}
			// Guardamos las cantidades en variables (5)
			$NombreTop5_1;
			$Top5_1;
			// Hacemos la consulta para mostrar las cantidades de Entradas
			$resultado3 = $mysqli->query($sql3);
			$Contador = 0;
			while ($row3 = mysqli_fetch_array($resultado3)){
				$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row3['idProducto'].";";
				// Hacemos la consulta
				$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
				$FilaResultado = $ResultadoVerProducto->fetch_assoc();
				$NombreTop5_1[$Contador] = $FilaResultado['NombreProducto'];
				$Top5_1[$Contador] = $row3['suma'];
				// Aumentamos al contador
				$Contador++;
				if($Contador == 6){
					break;
				}
			}
		?>
			<body ondragstart="return false;" ondrop="return false;">
				<nav class="navbar navbar-default navbar-fixed-top">
				  <div class="container-fluid"> 
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="#"><img src="imagenes/logo.png" class="img-circle" width="25" height="25"></a></div>
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
									<li><a href="#">Lista de Ajuste de inventario</a></li>
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
							<a href="#" class="dropdown-toggle negrita" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><?php echo $NombreUsuario; ?></a></li>
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
				<div class="container-fluid">
					<div class="dashboard">
						<div class="row">
							<div class="text-center">
								<div class="col-xs-5 col-md-5">
									<div class="row">
										<div class="col-xs-12 col-md-12"><canvas id="ContenedorChart1"></canvas></div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-12"><canvas id="ContenedorChart2"></canvas></div>
									</div>
								</div>
							</div>
							<div class="text-center">
								<div class="col-xs-2 col-md-2"><img src="imagenes/LogoPrincipal.png" class="img-responsive center-block"></div>
							</div>
							<div class="text-center">
								<div class="col-xs-5 col-md-5">
									<div class="row">
										<div class="col-xs-12 col-md-12"><canvas id="ContenedorChart3" height="40vh" width="80vw" style="vertical-align: middle;"></canvas></div>
									</div>
									<!--
									<div class="row">
										<div class="col-xs-12 col-md-12"><canvas id="" height="40vh" width="80vw"></canvas></div>
									</div>
									-->
								</div>
							</div>
						</div>
					</div>
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
				<script src="jquery/jquery.js"></script>
					<!-- Importo el archivo Javascript de Highcharts directamente desde su servidor -->
				<script src="Chart.js/Chart.min.js"></script>
				<script>
					// Primer gráfica
					var ctx = document.getElementById("ContenedorChart1").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
							datasets: [{
								label: '# of Votes',
								data: [<?php echo $CantidadEneroSalida ; ?>, <?php echo $CantidadFebreroSalida; ?>,
								       <?php echo $CantidadMarzoSalida ; ?>, <?php echo $CantidadAbrilSalida ; ?>,
									   <?php echo $CantidadMayoSalida ; ?>, <?php echo $CantidadJunioSalida ; ?>,
									   <?php echo $CantidadJulioSalida ; ?>, <?php echo $CantidadAgostoSalida ; ?>,
									   <?php echo $CantidadSeptiembreSalida ; ?>, <?php echo $CantidadOctubreSalida ; ?>,
									   <?php echo $CantidadNoviembreSalida ; ?>, <?php echo $CantidadDiciembreSalida ; ?>],
								backgroundColor: [
									'rgba(255, 99, 132, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(255, 206, 86, 0.2)',
									'rgba(75, 192, 192, 0.2)',
									'rgba(153, 102, 255, 0.2)',
									'rgba(255, 159, 64, 0.2)',
									'rgba(255, 99, 132, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(255, 206, 86, 0.2)',
									'rgba(75, 192, 192, 0.2)',
									'rgba(153, 102, 255, 0.2)',
									'rgba(255, 159, 64, 0.2)'
								],
								borderColor: [
									'rgba(255,99,132,1)',
									'rgba(54, 162, 235, 1)',
									'rgba(255, 206, 86, 1)',
									'rgba(75, 192, 192, 1)',
									'rgba(153, 102, 255, 1)',
									'rgba(255, 159, 64, 1)',
									'rgba(255,99,132,1)',
									'rgba(54, 162, 235, 1)',
									'rgba(255, 206, 86, 1)',
									'rgba(75, 192, 192, 1)',
									'rgba(153, 102, 255, 1)',
									'rgba(255, 159, 64, 1)'
								],
								borderWidth: 1
							}]
						},
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero:true
									}
								}]
							},
							title: {
								display: true,
								text: 'Salida de productos por mes'
							}
						}
					});
					// Segunda gráfica
					var ctx = document.getElementById("ContenedorChart2").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
							datasets: [{
								label: '# of Votes',
								data: [<?php echo $CantidadEneroEntrada ; ?>, <?php echo $CantidadFebreroEntrada; ?>,
								       <?php echo $CantidadMarzoEntrada ; ?>, <?php echo $CantidadAbrilEntrada ; ?>,
									   <?php echo $CantidadMayoEntrada ; ?>, <?php echo $CantidadJunioEntrada ; ?>,
									   <?php echo $CantidadJulioEntrada ; ?>, <?php echo $CantidadAgostoEntrada ; ?>,
									   <?php echo $CantidadSeptiembreEntrada ; ?>, <?php echo $CantidadOctubreEntrada ; ?>,
									   <?php echo $CantidadNoviembreEntrada ; ?>, <?php echo $CantidadDiciembreEntrada ; ?>],
								backgroundColor: ['rgba(54, 162, 235, 0.2)'],
								borderColor: ['rgba(54, 162, 235, 1)'],
								borderWidth: 1
							}]
						},
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero:true
									}
								}]
							},
							title: {
								display: true,
								text: 'Entrada de productos por mes'
							}
						}
					});
					// Tercera gráfica
					var ctx = document.getElementById("ContenedorChart3").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: [<?php echo "'".$NombreTop5_1[0]."'"; ?>, <?php echo "'".$NombreTop5_1[1]."'"; ?>,
									 <?php echo "'".$NombreTop5_1[2]."'"; ?>, <?php echo "'".$NombreTop5_1[3]."'"; ?>,
									 <?php echo "'".$NombreTop5_1[4]."'"; ?>],
							datasets: [{
								label: '# of Votes',
								data: [<?php echo $Top5_1[0]; ?>, <?php echo $Top5_1[1]; ?>,
									 <?php echo $Top5_1[2]; ?>, <?php echo $Top5_1[3]; ?>,
									 <?php echo $Top5_1[4]; ?>],
								backgroundColor: [
									'rgba(255, 99, 132, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(255, 206, 86, 0.2)',
									'rgba(75, 192, 192, 0.2)',
									'rgba(255, 159, 64, 0.2)'
								],
								borderColor: [
									'rgba(255,99,132,1)',
									'rgba(54, 162, 235, 1)',
									'rgba(255, 206, 86, 1)',
									'rgba(75, 192, 192, 1)',
									'rgba(255, 159, 64, 1)'
								],
								borderWidth: 1
							}]
						},
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero:true
									}
								}]
							},
							title: {
								display: true,
								text: 'Top 5 de existencia de productos'
							}
						}
					});
					// Cuarta gráfica
					var ctx = document.getElementById("ContenedorChart4").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
							datasets: [{
								label: '# of Votes',
								data: [12, 19, 3, 5, 2, 3],
								backgroundColor: [
									'rgba(255, 99, 132, 0.2)',
									'rgba(54, 162, 235, 0.2)',
									'rgba(255, 206, 86, 0.2)',
									'rgba(75, 192, 192, 0.2)',
									'rgba(153, 102, 255, 0.2)',
									'rgba(255, 159, 64, 0.2)'
								],
								borderColor: [
									'rgba(255,99,132,1)',
									'rgba(54, 162, 235, 1)',
									'rgba(255, 206, 86, 1)',
									'rgba(75, 192, 192, 1)',
									'rgba(153, 102, 255, 1)',
									'rgba(255, 159, 64, 1)'
								],
								borderWidth: 1
							}]
						},
						options: {
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero:true
									}
								}]
							},
							title: {
								display: true,
								text: 'Otros'
							}
						}
					});
				</script>
			</body>
	<?php
		// De lo contrario lo redirigimos al inicio de sesión
			} 
			else{
				echo "usuario no valido";
				header("location:Login.php");
			}
		?>
</html>
