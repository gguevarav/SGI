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
			$this->Cell(60);
			$this->Write(5, 'Reporte de Productos');
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
		}
	}
	
	$Consulta = "SELECT * FROM producto;";
	$Resultado = $mysqli->query($Consulta);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(20, 6, utf8_decode('Código'), 1, 0, 'C', 1);
	$pdf->Cell(45, 6, utf8_decode('Nombre'), 1, 0, 'C', 1);
	$pdf->Cell(40, 6, utf8_decode('Marca'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('Modelo'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('Línea'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('UM'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('Color'), 1, 1, 'C', 1);
	
	$pdf->SetFont('Arial', '', 10);

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
		
		$pdf->Cell(20, 6, utf8_decode($row['NumeroInvenProd']), 1, 0, 'C');
		$pdf->Cell(45, 6, utf8_decode($row['NombreProducto']), 1, 0, 'C');
		$pdf->Cell(40, 6, utf8_decode($NombreMarca), 1, 0, 'C');
		$pdf->Cell(20, 6, utf8_decode($row['ModeloProducto']), 1, 0, 'C');
		$pdf->Cell(20, 6, utf8_decode($NombreLinea), 1, 0, 'C');
		$pdf->Cell(20, 6, utf8_decode($NombreUm), 1, 0, 'C');
		$pdf->Cell(20, 6, utf8_decode($row['ColorProducto']), 1, 1, 'C');
	}
	
	$pdf->Output();
?>