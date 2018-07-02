<?php
	require_once __DIR__ . '/vendor/autoload.php';
	include_once 'Seguridad/conexion.php';
	$mpdf = new \Mpdf\Mpdf();
	
	$VerProducto = "SELECT * FROM kardex";
	$Resultado = $mysqli->query($VerProducto);
	
	$stylesheet = file_get_contents('css/bootstrap.css');
	
	$mpdf -> WriteHTML($stylesheet,1);
	
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
													<td><h3>Kardex</h3></td>
												</tr>
											</tbody>
										</table>
									</td>
									<td><img src="imagenes/LogoPrincipal.png" height="100" width="100"></td>
								</tr>
							</tbody>
						</table>');
					$mpdf -> WriteHTML('
						<div class="panel panel-primary">
							<div class="table-responsive">          
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>#</th>
											<th>Código</th>´
											<th>Artículo</th>´
											<th>Marca</th>´
											<th>UM</th>´
											<th>Modelo</th>
											<th>Linea</th>
											<th>Color</th>
											<th>Debe</th>
											<th>Haber</th>
										</tr>
									</thead>
									<tbody>');
							$Numero = 1;
							while($row = $Resultado->fetch_assoc())
							{			
								$ObtenerProducto = "SELECT * FROM producto WHERE idProducto=".$row['idProducto'].";";
								// Hacemos la consulta
								$ResultadoProducto = $mysqli->query($ObtenerProducto);
								$FilaResultadoProducto = $ResultadoProducto->fetch_assoc();
								// Consulta para ver el nombre de la marca
								$VerNombreMarca = "SELECT NombreMarca FROM marca WHERE idMarca=".$FilaResultadoProducto['idMarca'].";";
								// Hacemos la consulta
								$ResultadoVerMarca = $mysqli->query($VerNombreMarca);
								$FilaResultado = $ResultadoVerMarca->fetch_assoc();
								$NombreMarca = $FilaResultado['NombreMarca'];

								$VerNombreMedida = "SELECT NombreUnidadMedida FROM unidadmedida WHERE idUnidadMedida=".$FilaResultadoProducto['idUnidadMedida'].";";
								// Hacemos la consulta
								$ResultadoVerMedida = $mysqli->query($VerNombreMedida);
								$FilaResultado = $ResultadoVerMedida->fetch_assoc();
								$NombreUnidadMedida = $FilaResultado['NombreUnidadMedida'];

								$VerNombreLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE idLinea=".$FilaResultadoProducto['idLinea'].";";
								// Hacemos la consulta
								$ResultadoVerLinea = $mysqli->query($VerNombreLinea);
								$FilaResultado = $ResultadoVerLinea->fetch_assoc();
								$NombreLinea = $FilaResultado['NombreLineaProducto'];
								$mpdf -> WriteHTML('
											<tr>
												<td>'.$Numero.'</td>
												<td>'.$FilaResultadoProducto['NumeroInvenProd'].'</td>
												<td>'.$FilaResultadoProducto['NombreProducto'].'</td>
												<td>'.$NombreMarca.'</td>
												<td>'.$NombreUnidadMedida.'</td>
												<td>'.$FilaResultadoProducto['ModeloProducto'].'</td>
												<td>'.$NombreLinea.'</td>
												<td>'.$FilaResultadoProducto['ColorProducto'].'</td>
												<td>'.' - '.$row['DebeKardex'].'</td>
												<td>'.$row['HaberKardex'].'</td>
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
	
	// Mostraremos las personas de la junta de oficiales
	// Primero la consutla para ver todos los oficiales
	$ConsultaJunta = "SELECT * FROM juntaoficiales;";
	// Ejecutamos la consulta
	$ResultadoJunta = $mysqli->query($ConsultaJunta);
	// Si al ejecutar la consulta el valor es nulo entonces no hay junta directiva registrada
	if(($FilaResultadoVerJunta = $ResultadoJunta->fetch_assoc()) != null){
		$Director = $FilaResultadoVerJunta['DirectorJuntaOficiales'];
		$Jefe =  $FilaResultadoVerJunta['JefeJuntaOficiales'];
		$Secretario  =  $FilaResultadoVerJunta['SecretarioJuntaOficiales'];
		$Tesorero  =  $FilaResultadoVerJunta['TesoreroJuntaOficiales'];
		
		// Consulta para ver el nomnbre de la persona que queremos mostrar
		$ConsultaVerNombreDirector = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$Director.";";
		$ConsultaVerNombreJefe = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$Jefe.";";
		$ConsultaVerNombreSecretario = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$Secretario.";";
		$ConsultaVerNombreTesorero = "SELECT NombrePersona, ApellidoPersona FROM persona WHERE idPersona=".$Tesorero.";";
		
		// Ejecutamos la consulta para ver el nombre de cada 
		// Director
		$ResultadoVerNombreDirector = $mysqli->query($ConsultaVerNombreDirector);
		$FilaResultadoNombreDirector = $ResultadoVerNombreDirector->fetch_assoc();
		$NommbreDirector = $FilaResultadoNombreDirector['NombrePersona'] . " " . $FilaResultadoNombreDirector['ApellidoPersona'];
		// Jefe
		$ResultadoVerNombreJefe = $mysqli->query($ConsultaVerNombreJefe);
		$FilaResultadoNombreJefe = $ResultadoVerNombreJefe->fetch_assoc();
		$NommbreJefe = $FilaResultadoNombreJefe['NombrePersona'] . " " . $FilaResultadoNombreJefe['ApellidoPersona'];
		// Secretario
		$ResultadoVerNombreSecretario = $mysqli->query($ConsultaVerNombreSecretario);
		$FilaResultadoNombreSecretario = $ResultadoVerNombreSecretario->fetch_assoc();
		$NommbreSecretario = $FilaResultadoNombreSecretario['NombrePersona'] . " " . $FilaResultadoNombreSecretario['ApellidoPersona'];
		// Tesorero
		$ResultadoVerNombreTesorero = $mysqli->query($ConsultaVerNombreTesorero);
		$FilaResultadoNombreTesorero = $ResultadoVerNombreTesorero->fetch_assoc();
		$NommbreTesorero = $FilaResultadoNombreTesorero['NombrePersona'] . " " . $FilaResultadoNombreTesorero['ApellidoPersona'];
		
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
													'.$NommbreDirector.'
											<br>
														Director de Cía.
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
													'.$NommbreJefe.'
											<br>
														Jefe de Cía.
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
										</td>
									</tr>
									<tr>
										<td>
												f:________________________________
											<br>
													'.$NommbreSecretario.'
											<br>
														Secretario de Cía.
										</td>
										<td>
												f:________________________________
											<br>
													'.$NommbreTesorero.'
											<br>
														Tesorero de Cía.
										</td>
									</tr>
								</tbody>
							</table>');
	}else{
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
														Director de Cía.
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
														Jefe de Cía.
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
										</td>
									</tr>
									<tr>
										<td>
												f:________________________________
											<br>
														Secretario de Cía.
										</td>
										<td>
												f:________________________________
											<br>
														Tesorero de Cía.
										</td>
									</tr>
								</tbody>
							</table>');
	}
	
	$mpdf -> Output('ReporteProductos.pdf','I');
	exit;
?>