<?php
	require_once __DIR__ . '/vendor/autoload.php';
	include_once 'Seguridad/conexion.php';
	if (isset($_POST['VerDetalle'])) {
		$idHojaRespons = $_POST['VerDetalle'];
		$mpdf = new \Mpdf\Mpdf();
		
		// Información de la hoja de responsabilidad|
		$InformacionHojaResponsabilidad = "SELECT * FROM hojaresponsabilidad WHERE idHojaResponsabilidad=".$idHojaRespons.";";
		$resultado1 = $mysqli->query($InformacionHojaResponsabilidad);
		// Contenido de la hoja de responsabilidad
		$VerHojasResponsabilidad = "SELECT idDetalleProdHojasRespons, idProducto, CantidadDetalleProdHojasRespons FROM detalleprodhojasrespons WHERE idHojaResponsabilidad=".$idHojaRespons.";";
		// Hacemos la consulta
		$resultado = $mysqli->query($VerHojasResponsabilidad);
		
		$stylesheet = file_get_contents('css/bootstrap.css');
		
		$mpdf -> WriteHTML($stylesheet,1);
		
		// Nombre de persona quien entrega y recibe **************************
		$NombrePersonaRecibe = "";
		$NombrePersonaEntrega = "";
		//********************************************************************
		
		// ******************** Encabezado del documento *********************
		$mpdf -> WriteHTML('
		<html>
			<body>
				<div class="container">
					<div class="container-fluid">
						<div class="text-center">
							<table class="table">
								<tbody>
									<tr>
										<td><img src="imagenes/Logo.png" height="100" width="100"></td>
										<td>
											<table class="table">
												<tbody>
													<tr>
														<td><h2>Estación de bomberos voluntarios de la 73 Cia</h2></td>
													</tr>
													<tr>
														<td><h4>Morales Izabal</h4></td>
													</tr>
													<tr>
														<td><h3>Hoja de responsabilidad</h3></td>
													</tr>
												</tbody>
											</table>
										</td>
										<td><img src="imagenes/LogoPrincipal.png" height="100" width="100"></td>
									</tr>
								</tbody>
							</table>');
		
		// ***************** Fecha y responsable del equipo/herramienta *******************
		while ($row = mysqli_fetch_array($resultado1)){						
			$VerNombrePersona = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$row['idPersonaEntrega'].";";
			// Hacemos la consulta
			$ResultadoVerPersona = $mysqli->query($VerNombrePersona);
			$FilaResultado = $ResultadoVerPersona->fetch_assoc();
			$NombrePersonaEntrega = $FilaResultado['NombrePersona'] . " " . $FilaResultado['ApellidoPersona'];
			
			$VerNombrePersona = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$row['idPersonaRecibe'].";";
			// Hacemos la consulta
			$ResultadoVerPersona = $mysqli->query($VerNombrePersona);
			$FilaResultado = $ResultadoVerPersona->fetch_assoc();
			$NombrePersonaRecibe = $FilaResultado['NombrePersona'] . " " . $FilaResultado['ApellidoPersona'];
			$mpdf -> WriteHTML('
								<table class="table">
									<thead>
										<tr>
											<th>Fecha entregado</th>
											<th>Responsable</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												'.$row['FechaHoraHojaRespons'].'
											</td>
											<td>
												'.$NombrePersonaRecibe.'
											</td>
										</tr>
									</tbody>
								</table>
								<br>');
		}
		
		// ******************* Listado de productos ****************************
		$mpdf -> WriteHTML('										
							<div class="panel panel-primary">
								<div class="table-responsive">          
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>#</th>
												<th>Artículo</th>
												<th>Cantidad</th>
											</tr>
										</thead>
										<tbody>');
											$Numero = 1;
											while($row = mysqli_fetch_array($resultado))
											{
												$VerNombreProducto = "SELECT NombreProducto FROM producto WHERE idProducto=".$row['idProducto'].";";
												// Hacemos la consulta
												$ResultadoVerProducto = $mysqli->query($VerNombreProducto);
												$FilaResultado = $ResultadoVerProducto->fetch_assoc();
												$NombreProducto = $FilaResultado['NombreProducto'];
												$mpdf -> WriteHTML('
															<tr>
															<td>'.$Numero.'</td>
															<td>'.$NombreProducto.'</td>
															<td>'.$row['CantidadDetalleProdHojasRespons'].'</td>
															</tr>');
												$Numero++;
											}
								$mpdf -> WriteHTML('
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
		</html>');
		// ******************** Firmas de responsable de herramienta y quien recibe ******************
		$mpdf -> WriteHTML('
							<br>
							<br>
							<br>
							<br>
							<br>
							<table class="table">
								<tbody>
									<tr>
										<td>
												f:________________________________
											<br>
													'.$NombrePersonaRecibe.'
											<br>
														  Recibido por.
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
										</td>
										<td>
												f:________________________________
											<br>
													'.$NombrePersonaEntrega.'
											<br>
														   Entregado por.
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
										</td>
									</tr>
								</tbody>
							</table>');
		
		$mpdf -> Output('HojaResponsabilidad.pdf','I');
		exit;
	}
?>