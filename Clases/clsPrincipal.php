<?php
	// Primero hacemos la consulta en la tabla de persona
	include_once "Seguridad/conexion.php";
	class SesionValida{
		// Función para ver si ya inició sesión
		public function is_session_started(){
			// Chequear que no esté ejecutándole
			// desde la línea de comandos:
			if(php_sapi_name() !== 'cli'){
				if(version_compare(phpversion(), '5.4.0', '>=')){
					return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
				}
				else{
					return session_id === '' ? FALSE : TRUE;
				}
			}
			return FALSE;
		}	
	}
	class Principal{
		// Con esta función validaremos si un registro aún no existe en la base de datos
		public function ExisteItem($Campo, $Tabla,$Registro){
			//Primero preparamos la consulta
			$Consulta = "SELECT".$Campo." FROM ".$Tabla." WHERE ".$Campo."='".$Registro."';";
			// Ejecutamos la consulta
			$Resultado = $mysqli->query($Consulta);
			// Obtenemos la línea del resultado de la consulta
			$row = mysqli_fetch_array($Resultado);
			// Retornamos el campo que nos interesa de la línea
			return $row[$Campo];
		}
	}
?>
