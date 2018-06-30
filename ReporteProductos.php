<?php
	require_once __DIR__ . '/vendor/autoload.php';
	include_once 'Seguridad/conexion.php';
	$mpdf = new \Mpdf\Mpdf();
	
	$VerProducto = "SELECT * FROM producto";
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
													<td><h3>Reporte de Productos</h3></td>
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
											<th>Nombre</th>´
											<th>Marca</th>´
											<th>Modelo</th>´
											<th>Línea</th>
											<th>UM</th>
											<th>Color</th>
										</tr>
									</thead>
									<tbody>');
							$Numero = 0;
							while($row = $Resultado->fetch_assoc())
							{			
								// Primero obtendremos el nombre de la línea
								$VerNombreLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE idLinea=".$row['idLinea'].";";
								// Hacemos la consulta
								$ResultadoVerLinea = $mysqli->query($VerNombreLinea);
								$FilaResultadoLinea = $ResultadoVerLinea->fetch_assoc();
								$NombreLinea = $FilaResultadoLinea['NombreLineaProducto'];
								
								// Segundo obtendremos el nombre de la Marca
								$VerNombreMarca = "SELECT NombreMarca FROM marca WHERE idMarca=".$row['idMarca'].";";
								// Hacemos la consulta
								$ResultadoVerMarca = $mysqli->query($VerNombreMarca);
								$FilaResultadoMarca = $ResultadoVerMarca->fetch_assoc();
								$NombreMarca = $FilaResultadoMarca['NombreMarca'];
								
								// Segundo obtendremos el nombre de la Marca
								$VerNombreUm = "SELECT NombreUnidadMedida FROM unidadmedida WHERE idUnidadMedida=".$row['idUnidadMedida'].";";
								// Hacemos la consulta
								$ResultadoVerUm = $mysqli->query($VerNombreUm);
								$FilaResultadoUm = $ResultadoVerUm->fetch_assoc();
								$NombreUm = $FilaResultadoUm['NombreUnidadMedida'];
								$mpdf -> WriteHTML('
											<tr>
												<td>'.$Numero.'</td>
												<td>'.$row['NumeroInvenProd'].'</td>
												<td>'.$row['NombreProducto'].'</td>
												<td>'.$NombreMarca.'</td>
												<td>'.$row['ModeloProducto'].'</td>
												<td>'.$NombreLinea.'</td>
												<td>'.$NombreUm.'</td>
												<td>'.$row['ColorProducto'].'</td>
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

	$mpdf -> Output('ReporteProductos.pdf','I');
	exit;
?>