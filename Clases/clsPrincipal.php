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
	class RandomTable{

    public $IDr = 0 ;
    //Función que crea y devuelve un objeto de conexión a la base de datos y chequea el estado de la misma. 
    function conectarBD(){ 
            $server = "localhost";
            $usuario = "root";
            $pass = "";
            $BD = "bdbomberos";
            //variable que guarda la conexión de la base de datos
            $conexion = mysqli_connect($server, $usuario, $pass, $BD); 
            //Comprobamos si la conexión ha tenido exito
            if(!$conexion){ 
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>'; 
            } 
            //devolvemos el objeto de conexión para usarlo en las consultas  
            return $conexion; 
    }  
    /*Desconectar la conexion a la base de datos*/
    function desconectarBD($conexion){
            //Cierra la conexión y guarda el estado de la operación en una variable
            $close = mysqli_close($conexion); 
            //Comprobamos si se ha cerrado la conexión correctamente
            if(!$close){  
               echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>'; 
            }    
            //devuelve el estado del cierre de conexión
            return $close;         
    }

    //Devuelve un array multidimensional con el resultado de la consulta
    function getArraySQL($sql){
        //Creamos la conexión
        $conexion = $this->conectarBD();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die();

        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
            $rawdata[$i] = $row;
            $i++;
        }
        //Cerramos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos rawdata
        return $rawdata;
    }
    //inserta en la base de datos un nuevo registro en la tabla usuarios
    function insertRandom(){
    	//Generamos un número entero aleatorio entre 0 y 100
    	$ran = rand(0, 100);
        //creamos la conexión
        $conexion = $this->conectarBD();
        //Escribimos la sentencia sql necesaria respetando los tipos de datos
        $sql = "insert into random (valor) 
        values (".$ran.")";
        //hacemos la consulta y la comprobamos 
        $consulta = mysqli_query($conexion,$sql);
        if(!$consulta){
            echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
        }
        //Desconectamos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos el resultado de la consulta (true o false)
        return $consulta;
    }
    function getAllInfo(){
        //Creamos la consulta
        $sql = "SELECT * FROM random;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
}
?>
