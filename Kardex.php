<?php
	include_once 'Seguridad/conexion.php';
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('imagenes/logo.png',5 , 5, 30);
			$this->Image('imagenes/LogoPrincipal.png',170 , 5, 30);
			$this->SetFont('Arial', 'B', 15);
			$this->Cell(35);
			$this->Write(5, utf8_decode('Estación de bomberos voluntarios de la 73 Cia'));
			$this->Ln();
			$this->Ln();
			$this->Cell(75);
			$this->Write(5, utf8_decode('Morales Izabal'));
			$this->Ln();
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(80);
			$this->Write(5, 'Kardex');
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
		}
	}
	
	$VerProducto = "SELECT * FROM kardex";
	$Resultado = $mysqli->query($VerProducto);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(5, 6, utf8_decode('#'), 1, 0, 'C', 1);
	$pdf->Cell(13, 6, utf8_decode('Código'), 1, 0, 'C', 1);
	$pdf->Cell(45, 6, utf8_decode('Artículo'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('Marca'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('UM'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('Modelo'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('Linea'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('Color'), 1, 0, 'C', 1);
	$pdf->Cell(25, 6, utf8_decode('Debe'), 1, 0, 'C', 1);
	$pdf->Cell(25, 6, utf8_decode('Haber'), 1, 1, 'C', 1);
	
	$pdf->SetFont('Arial', '', 10);
	// Contador para que nos de un correlativo por línea
	$Contador = 1;
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
		
		$pdf->Cell(10, 6, utf8_decode($Contador), 1, 0, 'C');
		$pdf->Cell(13, 6, utf8_decode($FilaResultadoProducto['NumeroInvenProd']), 1, 0, 'C');
		$pdf->Cell(40, 6, utf8_decode($FilaResultadoProducto['NombreProducto']), 1, 0, 'C');
		$pdf->Cell(20, 6, utf8_decode($NombreMarca), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($NombreUnidadMedida), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($FilaResultadoProducto['ModeloProducto']), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($NombreLinea), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($FilaResultadoProducto['ColorProducto']), 1, 0, 'C');
		$pdf->Cell(25, 6, utf8_decode(' - '.$row['DebeKardex']), 1, 0, 'C');
		$pdf->Cell(25, 6, utf8_decode($row['HaberKardex']), 1, 1, 'C');
		$Contador++;
	}
	
	// Mostraremos las personas de la junta de oficiales
	// Primero la consutla para ver todos los oficiales
	$ConsultaJunta = "SELECT * FROM juntaoficiales;";
	// Ejecutamos la consulta
	$ResultadoJunta = $mysqli->query($ConsultaJunta);
	// Si al ejecutar la consulta el valor es nulo entonces no hay junta directiva registrada
	if($Resultado->fetch_assoc() != NULL){
		$FilaResultadoVerJunta = $ResultadoJunta->fetch_assoc();
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
		
		// Mostramos la información comprendida en la tabla
		$pdf->SetFont('Arial', 'I', 8);
		$pdf->Ln(30);
		$pdf->Write(5, utf8_decode('                                    f:________________________________                                              f:________________________________'));
		$pdf->Ln();
		$pdf->Write(5, utf8_decode('                                               '.$NommbreDirector.'                                                           '.$NommbreJefe));
		$pdf->Ln();
		$pdf->Write(5, utf8_decode('                                                      Director de Cía.                                                                                     Jefe de Cía.'));
		$pdf->Ln(30	);
		$pdf->Write(5, utf8_decode('                                    f:________________________________                                              f:________________________________'));
		$pdf->Ln();
		$pdf->Write(5, utf8_decode('                                               '.$NommbreSecretario.'                                                          '.$NommbreTesorero));
		$pdf->Ln();
		$pdf->Write(5, utf8_decode('                                                      Secretario de Cía.                                                                                  Tesorero de Cía.'));
	}else{
		// Mostramos nada más los campos para hacer la firma
		$pdf->SetFont('Arial', 'I', 8);
		$pdf->Ln(30);
		$pdf->Write(5, utf8_decode('                                    f:________________________________                                              f:________________________________'));
		$pdf->Ln();
		$pdf->Write(5, utf8_decode('                                                      Director de Cía.                                                                                     Jefe de Cía.'));
		$pdf->Ln(30	);
		$pdf->Write(5, utf8_decode('                                    f:________________________________                                              f:________________________________'));
		$pdf->Ln();
		$pdf->Write(5, utf8_decode('                                                      Secretario de Cía.                                                                                  Tesorero de Cía.'));
	}
	$pdf->Output();
?>