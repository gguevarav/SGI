<!--
	Sistema de Gestión de Inventarios
	Miércoles, 28 de Marzo del 2018
	9:30 PM
	Gemis Daniel Guevara Villeda
	-
	UMG - Morales Izabal
	-
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="imagenes/icono.ico">
        <title>Estación de Bomberos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- vinculo a bootstrap -->
			<link rel="stylesheet" href="css/bootstrap.css">
			<!-- Temas-->
			<link rel="stylesheet" href="css/bootstrap-theme.min.css">
			<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->
			<link rel="stylesheet" type="text/css" href="css/estilo.css">
		</head>
        <body>
    		<!-- Contenedor del ícono del Usuario -->
    		<div id="Contenedor">
    			<div class="IconoInicio">
    				<div class="row TextoInicioP">
    					<div class="col-xs-7 TextoInicio">
    					<h2 class="text-center">Inicie sesión</h2>
    					</div>
    					<!-- Contenedor del ícono del Usuario -->
    					<div class="col-xs-4">
    					<!-- Icono de usuario -->
    					<span class="glyphicon glyphicon-user"></span>
    					</div>
    				</div>
    			</div>

    			<div class="form-group">
    				<form name="FormEntrar" action="login.php" method="post">
    					<div class="input-group input-group-lg">
    						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
    						<input type="text" class="form-control" name="usuario" placeholder="Usuario" id="Usuario" aria-describedby="sizing-addon1" required>
    					</div>
    					<br>
    					<div class="input-group input-group-lg">
    						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
    						<input type="password" name="password" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
    					</div>
    					<br>
    					<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" name="enviar" type="submit">Entrar</button>
    					<!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
    				</form>
    			</div>
    		</div>
    		<?php
    			include_once "Seguridad/conexion.php";
    			if (isset($_POST['enviar'])) {
					if ($_POST['usuario'] == '' or $_POST['password'] == '') {
						?>
						<div class="form-group">
							<form name="Alerta">
								<div class="container">
									<div class="row text-center">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-10 col-xs-offset-1">
													<div class="alert alert-warning">Los campos no pueden ir vacíos</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<?php
						//echo "<script languaje='javascript'>
						//	alert('Los campos no pueden ir vacios');
						//	</script>";
					}
					else {
						// Guardamos el nombre del usuario un una variable
						$Usuario= $_POST["usuario"];
						// Encriptamos la contraseña a MD5 para seguridad y lo guardamos en una variable
						$password = md5($_POST['password']);

						// Consulta SQL, seleccionamos todos los datos de la tabla y obtenemos solo
						// la fila que tiene el usario especificado
						$query = "SELECT * FROM usuario WHERE NombreUsuario='".$Usuario."'";
						if(!$resultado = $mysqli->query($query)){
							echo "Error: La ejecución de la consulta falló debido a: \n";
							echo "Query: " . $query . "\n";
							echo "Errno: " . $mysqli->errno . "\n";
							echo "Error: " . $mysqli->error . "\n";
							exit;
						}
						else{
							if ($resultado->num_rows == 0) {
							?>
							<div class="form-group">
								<form name="Alerta">
									<div class="container">
										<div class="row text-center">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-10 col-xs-offset-1">
														<div class="alert alert-danger">Usuario no registrado</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<?php
							//echo "Usuario no registrado";
							exit;
							}
							else{
								$ResultadoConsulta = $resultado->fetch_assoc();
								if($ResultadoConsulta['NOmbreUsuario'] = $Usuario){
									if($ResultadoConsulta['ContraseniaUsuario'] == $password){
										$idPersona = $ResultadoConsulta['idPersona'];
										$query = "SELECT * FROM persona WHERE idPersona='".$idPersona."'";
										if(!$resultado = $mysqli->query($query)){
											echo "Error: La ejecución de la consulta falló debido a: \n";
											echo "Query: " . $query . "\n";
											echo "Errno: " . $mysqli->errno . "\n";
											echo "Error: " . $mysqli->error . "\n";
											exit;
										}
										else{
											$ResultadoConsultaPersona = $resultado->fetch_assoc();
											session_start();
											$_SESSION['NombreUsuario'] = $ResultadoConsultaPersona['NombrePersona'] . " " . $ResultadoConsultaPersona['ApellidoPersona'];
											$_SESSION['Usuario'] = $ResultadoConsulta['NombreUsuario'];
											$_SESSION['ContrasenaUsuario'] = $password;
											$_SESSION['idUsuario'] = $ResultadoConsulta['idUsuario'];
											$_SESSION['PrivilegioUsuario'] = $ResultadoConsulta['PrivilegioUsuario'];
											header("location:index.php");
										}
									}
									else{
										?>
										<div class="form-group">
											<form name="Alerta">
												<div class="container">
													<div class="row text-center">
														<div class="container-fluid">
															<div class="row">
																<div class="col-xs-10 col-xs-offset-1">
																	<div class="alert alert-warning">Contraseña erronea</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
										<?php
										//echo "Contraseña Erronea";
									}
								}
								else{
									?>
									<div class="form-group">
											<form name="Alerta">
												<div class="container">
													<div class="row text-center">
														<div class="container-fluid">
															<div class="row">
																<div class="col-xs-10 col-xs-offset-1">
																	<div class="alert alert-danger">Usuario erroneo</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									<?php
								}
							}
						}
					}
				}
    		?>
        </body>
</html>
