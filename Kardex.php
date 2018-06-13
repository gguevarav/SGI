<?php
	include_once 'Seguridad/conexion.php';
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('imagenes/logo.png',5 , 5, 30);
			$this->SetFont('Arial', 'B', 15);
			$this->Cell(25);
			$this->Write(5, utf8_decode('Estación de bomberos voluntarios de la 73 Cia'));
			$this->Ln();
			$this->Ln();
			$this->Cell(30);
			$this->Write(5, utf8_decode('Morales Izabal'));
			$this->Ln();
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->Cell(60);
			$this->Write(5, 'Reporte de Inventario');
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
		}
	}
	
	$VerProducto = "SELECT * FROM producto";
	$Resultado = $mysqli->query($VerProducto);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(5, 6, utf8_decode('#'), 1, 0, 'C', 1);
	$pdf->Cell(13, 6, utf8_decode('Código'), 1, 0, 'C', 1);
	$pdf->Cell(30, 6, utf8_decode('Artículo'), 1, 0, 'C', 1);
	$pdf->Cell(20, 6, utf8_decode('Marca'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('UM'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('Modelo'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('Linea'), 1, 0, 'C', 1);
	$pdf->Cell(15, 6, utf8_decode('Color'), 1, 0, 'C', 1);
	$pdf->Cell(25, 6, utf8_decode('Precio'), 1, 0, 'C', 1);
	$pdf->Cell(18, 6, utf8_decode('Cantidad'), 1, 0, 'C', 1);
	$pdf->Cell(25, 6, utf8_decode('Total neto'), 1, 1, 'C', 1);
	
	$pdf->SetFont('Arial', '', 10);

	while($row = $Resultado->fetch_assoc())
	{			
			$VerNombreMarca = "SELECT NombreMarca FROM marca WHERE idMarca=".$row['idMarca'].";";
			// Hacemos la consulta
			$ResultadoVerMarca = $mysqli->query($VerNombreMarca);
			$FilaResultado = $ResultadoVerMarca->fetch_assoc();
			$NombreMarca = $FilaResultado['NombreMarca'];

			$VerNombreMedida = "SELECT NombreUnidadMedida FROM unidadmedida WHERE idUnidadMedida=".$row['idUnidadMedida'].";";
			// Hacemos la consulta
			$ResultadoVerMedida = $mysqli->query($VerNombreMedida);
			$FilaResultado = $ResultadoVerMedida->fetch_assoc();
			$NombreUnidadMedida = $FilaResultado['NombreUnidadMedida'];

			$VerNombreLinea = "SELECT NombreLineaProducto FROM lineaproducto WHERE idLinea=".$row['idLinea'].";";
			// Hacemos la consulta
			$ResultadoVerLinea = $mysqli->query($VerNombreLinea);
			$FilaResultado = $ResultadoVerLinea->fetch_assoc();
			$NombreLinea = $FilaResultado['NombreLineaProducto'];
			
			// Primero haremos la consulta
			$VerInventario = "SELECT * FROM inventario WHERE idProducto='".$row['idProducto']."'";
			// Ejecutamos la consulta
			$ResultadoConsultaInventario = $mysqli->query($VerInventario);
			// Guardamos la consulta en un array
			$ResultadoInventario = $ResultadoConsultaInventario->fetch_assoc();
			// Cantidad en el inventario
			$CantidadInventario = $ResultadoInventario['CantidadInventario'];
		
		$pdf->Cell(5, 6, utf8_decode($row['idProducto']), 1, 0, 'C');
		$pdf->Cell(13, 6, utf8_decode($row['NumeroInvenProd']), 1, 0, 'C');
		$pdf->Cell(30, 6, utf8_decode($row['NombreProducto']), 1, 0, 'C');
		$pdf->Cell(20, 6, utf8_decode($NombreMarca), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($NombreUnidadMedida), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($row['ModeloProducto']), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($NombreLinea), 1, 0, 'C');
		$pdf->Cell(15, 6, utf8_decode($row['ColorProducto']), 1, 0, 'C');
		$pdf->Cell(25, 6, utf8_decode('Q. '.$row['PrecioProducto']), 1, 0, 'C');
		$pdf->Cell(18, 6, utf8_decode($CantidadInventario), 1, 0, 'C');
		$pdf->Cell(25, 6, utf8_decode('Q. '.$row['PrecioProducto'] * $CantidadInventario), 1, 1, 'C');
	}
	
	$pdf->Output();
?>