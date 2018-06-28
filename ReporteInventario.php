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
			$this->CellFitSpace(35);
			$this->Write(5, utf8_decode('Estación de bomberos voluntarios de la 73 Cia'));
			$this->Ln();
			$this->Ln();
			$this->CellFitSpace(75);
			$this->Write(5, utf8_decode('Morales Izabal'));
			$this->Ln();
			$this->Ln();
			$this->SetFont('Arial', 'B', 20);
			$this->CellFitSpace(60);
			$this->Write(5, 'Reporte de Inventario');
			$this->Ln(10);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', 'I', 8);
			$this->CellFitSpace(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
		}
		//***** Aquí comienza código para ajustar texto *************
		//***********************************************************
		function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
		{
			//Get string width
			if($txt != 0){
				$str_width=$this->GetStringWidth($txt);
			}else{
				$str_width = 1;
			}
	 
			//Calculate ratio to fit cell
			if($w==0)
				$w = $this->w-$this->rMargin-$this->x;
			$ratio = ($w-$this->cMargin*2)/$str_width;
	 
			$fit = ($ratio < 1 || ($ratio > 1 && $force));
			if ($fit)
			{
				if ($scale)
				{
					//Calculate horizontal scaling
					$horiz_scale=$ratio*100.0;
					//Set horizontal scaling
					$this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
				}
				else
				{
					//Calculate character spacing in points
					$char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
					//Set character spacing
					$this->_out(sprintf('BT %.2F Tc ET',$char_space));
				}
				//Override user alignment (since text will fill up cell)
				$align='';
			}
	 
			//Pass on to Cell method
			$this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
	 
			//Reset character spacing/horizontal scaling
			if ($fit)
				$this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
		}
	 
		function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
		{
			$this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
		}
	 
		//Patch to also work with CJK double-byte text
		function MBGetStringLength($s)
		{
			if($this->CurrentFont['type']=='Type0')
			{
				$len = 0;
				$nbbytes = strlen($s);
				for ($i = 0; $i < $nbbytes; $i++)
				{
					if (ord($s[$i])<128)
						$len++;
					else
					{
						$len++;
						$i++;
					}
				}
				return $len;
			}
			else
				return strlen($s);
		}
		//************** Fin del código para ajustar texto *****************
		//******************************************************************
	}
	
	$VerProducto = "SELECT * FROM producto";
	$Resultado = $mysqli->query($VerProducto);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->CellFitSpace(5, 6, utf8_decode('#'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(13, 6, utf8_decode('Código'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(30, 6, utf8_decode('Artículo'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(20, 6, utf8_decode('Marca'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(15, 6, utf8_decode('UM'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(15, 6, utf8_decode('Modelo'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(15, 6, utf8_decode('Linea'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(15, 6, utf8_decode('Color'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(25, 6, utf8_decode('Precio'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(18, 6, utf8_decode('Cantidad'), 1, 0, 'C', 1);
	$pdf->CellFitSpace(25, 6, utf8_decode('Total neto'), 1, 1, 'C', 1);
	
	$pdf->SetFont('Arial', '', 8);

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
		
		$pdf->CellFitSpace(5, 7, utf8_decode($row['idProducto']), 1, 0, 'C');
		$pdf->CellFitSpace(13, 7, utf8_decode($row['NumeroInvenProd']), 1, 0, 'C');
		$pdf->CellFitSpace(30, 7, utf8_decode($row['NombreProducto']), 1, 0, 'C');
		$pdf->CellFitSpace(20, 7, utf8_decode($NombreMarca), 1, 0, 'C');
		$pdf->CellFitSpace(15, 7, utf8_decode($NombreUnidadMedida), 1, 0, 'C');
		$pdf->CellFitSpace(15, 7, utf8_decode($row['ModeloProducto']), 1, 0, 'C');
		$pdf->CellFitSpace(15, 7, utf8_decode($NombreLinea), 1, 0, 'C');
		$pdf->CellFitSpace(15, 7, utf8_decode($row['ColorProducto']), 1, 0, 'C');
		$pdf->CellFitSpace(25, 7, utf8_decode('Q. '.$row['PrecioProducto']), 1, 0, 'C');
		$pdf->CellFitSpace(18, 7, utf8_decode($CantidadInventario), 1, 0, 'C');
		$pdf->CellFitSpace(25, 7, utf8_decode('Q. '.$row['PrecioProducto'] * $CantidadInventario), 1, 1, 'C');
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