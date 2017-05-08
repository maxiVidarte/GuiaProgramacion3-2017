<?php
session_start();
//CREACIÓN DE LA CONEXIÓN CON EL SERVIDOR
/*$servername = 'mysql.hostinger.es';
$username = 'u636713032_root';
$password = 'garbarino';
$dbname = 'u636713032_estac';*/
//LOCAL
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'estacionamiento';
try{
	$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo 'Conexion fallida: ' . $e->getMessage();
}
//COMPROBACIÓN DE LOGUEO
function ComprobarLogueo($conexion){
	$consulta = $conexion->prepare('SELECT session FROM usuarios WHERE session =' . $_SESSION['session']);
	$consulta->execute();
	$resultado = $consulta->fetch(PDO::FETCH_NUM);
	if ($resultado[0] == $_SESSION['session']) {
		return true;
	}
	else{
		return false;
	}
}
//SWITCH PRINCIPAL
switch ($_POST['accion']){
	case 'cookie':
		//Devuelve el valor de la cookie si existe
		if (isset($_COOKIE['email'])){
			echo '{"email" :"' . $_COOKIE['email'] . '"}';
		}
		else{
			echo '{"email" : false}';
		}
		break;
	case 'loguear':
		//VERIFICA COMBINACION EMAIL PASSWORD
		$consulta = $conexion->prepare('SELECT admin FROM usuarios WHERE email = :email AND password = :password');
		$consulta->bindParam(':email', $_POST['emailIngresado']);
		$consulta->bindParam(':password', $_POST['passwordIngresado']);
	    $consulta->execute();
	    if ($consulta->rowCount() == 1){
			$_SESSION['session'] = rand(0, 50000);
			$consulta2 = $conexion->prepare('UPDATE usuarios SET session = :session WHERE email = :email AND password = :password');
			$consulta2->bindParam(':session', $_SESSION['session']);
			$consulta2->bindParam(':email', $_POST['emailIngresado']);
			$consulta2->bindParam(':password', $_POST['passwordIngresado']);
		    $consulta2->execute();
	    	if ($consulta->fetch()['admin'] == 1) {
	    		//PAGINA DE ADMIN**********************************************************
	    		include('principalAdmin.html');
	    	}
	    	else{
	    		include('principalUsuario.html');
	    	}
	    }
	    else{
	    	//La combinación de usuario/contraseña no se encuentra en la base de datos.
	    	echo 'desconocido';
	    }
	    //CREACION DE COOKIE
		if ($_POST['recordar'] == 'true') {
			setcookie('email', $_POST['emailIngresado'], time() + (86400 * 30), "/"); // 86400 = 1 day
		}
		break;
	case 'principalUsuario':
		if (ComprobarLogueo($conexion)) {
			include('principalUsuario.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'login':
		session_unset();
		session_destroy();
		include('login.html');
		break;
	case 'tablaPrincipal':
		$consulta = $conexion->prepare('SELECT patente, ingreso FROM vehiculos WHERE presente = 1');
	    $consulta->execute();
		$contenido = $consulta->fetchAll(PDO::FETCH_NUM);
		$respuesta = '';
		for ($fila=0; $fila < count($contenido); $fila++) { 
			$respuesta .= '<tr>';
			for ($columna=0; $columna < count($contenido[$fila]); $columna++) { 
				$respuesta .= '<td>' . $contenido[$fila][$columna] . '</td>';
			}
			$respuesta .= '<td><button type="button" onclick="EgresarVehiculo(\'' . $contenido[$fila][0] . '\')">Egresar vehículo</button></td></tr>';
		}
		echo $respuesta;
		break;
	case 'tablaHistorial':
		$consulta = $conexion->prepare('SELECT patente, costo FROM vehiculos WHERE presente = 0');
	    $consulta->execute();
		$contenido = $consulta->fetchAll(PDO::FETCH_NUM);
		$respuesta = '';
		for ($fila=0; $fila < count($contenido); $fila++) { 
			$respuesta .= '<tr>';
			for ($columna=0; $columna < count($contenido[$fila]); $columna++) { 
				$respuesta .= '<td>' . $contenido[$fila][$columna] . '</td>';
			}
			$respuesta .= '</tr>';
		}
		echo $respuesta;
		break;
	case 'historial':
		if (ComprobarLogueo($conexion)) {
			include('historial.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'egresoVehiculo':
		if (ComprobarLogueo($conexion)) {
			$consulta = $conexion->prepare('SELECT patente, ingreso FROM vehiculos WHERE patente = :patente');
			$consulta->bindParam(':patente', $_POST['patente']);
		    $consulta->execute();
		    $contenido = $consulta->fetch(PDO::FETCH_ASSOC);
		    
		    $ingreso = $contenido['ingreso'];
			$ahora = date("Y-m-d H:i:s"); 			 
			$costo = (strtotime($ahora) - strtotime($ingreso)) / 3600 * 50;//la hora (3600 segundos) sale 50 pesos
			echo
			'<button type="button" id="botonSalir" onclick="Mostrar(\'login\')">Salir</button>
			<form class="card">
			    <h1>Egresar vehículo</h1><br>
			    <p>Patente</p>
			    <input type="text" id="patente" value="' . $contenido['patente'] . '" disabled/>
			    <p>Ingreso</p>
			    <input type="text" id="ingreso" value="' . $ingreso . '" disabled/>
			    <p>Egreso</p>
			    <input type="text" id="egreso" value="' . $ahora . '" disabled/>
			    <p>Costo</p>
			    <input type="text" id="costo" value="$' . $costo . '" disabled/><br><br>
			    <input type="button" value="Egresar" onclick="Egresar(\'' . $contenido['patente'] . '\', \'' . $costo . '\'); Mostrar(\'principalUsuario\');"/><br>
			    <input type="button" value="Cancelar" onclick="Mostrar(\'principalUsuario\');"/>
			</form>';
		}
		else{
			include('login.html');
		}
		break;
	case 'egresar':
		if (ComprobarLogueo($conexion)) {
			$consulta = $conexion->prepare('UPDATE vehiculos SET presente = 0, costo = :costo WHERE patente = :patente');
			$consulta->bindParam(':costo', $_POST['costo']);
			$consulta->bindParam(':patente', $_POST['patente']);
		    $consulta->execute();
			include('principalUsuario.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'ingresoVehiculo':
		if (ComprobarLogueo($conexion)) {
			include('ingresoVehiculo.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'ingresar':
		if (ComprobarLogueo($conexion)) {
			//VERFICACIÓN CONTRA PATENTES DUPLICADAS
			$presente = 1;
	    	$consulta = $conexion->prepare('SELECT * FROM vehiculos WHERE patente = :patente AND presente = :presente');
			$consulta->bindParam(':patente', $_POST['patente']);
			$consulta->bindParam(':presente', $presente);
		    $consulta->execute();
			$resultado = $consulta->fetch();
			if ($resultado != '') {
				echo 'resultadoDuplicado';
				break;
			}
			//INGRESO DE VEHICULO
			$ahora = date("Y-m-d H:i:s");
			$consulta = $conexion->prepare('INSERT INTO vehiculos (patente, presente, ingreso) VALUES (:patente, 1, :ingreso)');
			$consulta->bindParam(':patente', $_POST['patente']);
			$consulta->bindParam(':ingreso', $ahora);
		    $consulta->execute();
			include('principalUsuario.html');
		}
		else{
			include('login.html');
		}
		break;
	
	case 'iniciar':
		include('login.html');
		break;
	case 'tablaPrincipalAdmin':
		$consulta = $conexion->prepare('SELECT email, password, admin FROM usuarios');
	    $consulta->execute();
		$contenido = $consulta->fetchAll(PDO::FETCH_ASSOC);
		$respuesta = '';
		for ($fila=0; $fila < count($contenido); $fila++) {
			$admin = '';
			if($contenido[$fila]['admin'] == '1'){
				$admin = 'Admin';
			}
			else{
				$admin = 'Usuario';
			}
			$respuesta .= 
			'<tr>
				<td>FOTO</td>
				<td>' . $contenido[$fila]['email'] . '</td>
				<td>' . $contenido[$fila]['password'] . '</td>
				<td>' . $admin . '</td>
				<td><button type="button" onclick="BajaUsuario(\'' . $contenido[$fila]['email'] . '\')">Baja</button></td>
				<td><button type="button" onclick="ModificarUsuario(\'' . $contenido[$fila]['email'] . '\', \'' . $contenido[$fila]['password'] . '\', \'' . $contenido[$fila]['admin'] . '\')">Modificar</button></td>
			</tr>';
		}
		echo $respuesta;
		break;
	case 'bajaUsuario':
	    if (ComprobarLogueo($conexion)) {
			$consulta = $conexion->prepare('DELETE FROM usuarios WHERE email = :email');
			$consulta->bindParam(':email', $_POST['email']);
	    	$consulta->execute();
			include('principalAdmin.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'altaUsuario':
	    if (ComprobarLogueo($conexion)) {
			include('altaUsuario.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'darAlta':
	    if (ComprobarLogueo($conexion)) {
	    	//VERFICACIÓN CONTRA PERSONAS DUPLICADAS
	    	$consulta = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email');
			$consulta->bindParam(':email', $_POST['email']);
		    $consulta->execute();
			$resultado = $consulta->fetch();
			if ($resultado != '') {
				echo 'resultadoDuplicado';
				break;
			}
		    //ALTA DE PERSONA
	    	$consulta = $conexion->prepare('INSERT INTO usuarios (email, password, admin) VALUES (:email, :password, :admin)');
			$consulta->bindParam(':email', $_POST['email']);
			$consulta->bindParam(':password', $_POST['password']);
			$consulta->bindParam(':admin', $_POST['admin']);
		    $consulta->execute();
			include('principalAdmin.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'principalAdmin':
	    if (ComprobarLogueo($conexion)) {
			include('principalAdmin.html');
		}
		else{
			include('login.html');
		}
		break;
	case 'modificarUsuario':
	    if (ComprobarLogueo($conexion)) {
	    	$respuesta =
	    		'<button type="button" id="botonSalir" onclick="Mostrar(\'login\')">Salir</button>
				<form class="card cardAdmin">
				    <h1>Modificar persona</h1><br>
				    <input type="file" id="foto"/><br><br>
				    <input type="text" id="email" value="' . $_POST['email'] . '" disabled/>
				    <input type="text" id="password" value="' . $_POST['password'] . '" /><br>';
				    if ($_POST['admin']) {
				    	$respuesta .= 
					    	'<input type="radio" name="tipo" id="admin" value="1" checked="checked"> Admin
					    	<input type="radio" name="tipo" id="usuario" value="0"> Usuario';
				    }
				    else{
				    	$respuesta .=
					    	'<input type="radio" name="tipo" id="admin" value="1"> Admin
					    	<input type="radio" name="tipo" id="usuario" value="0" checked="checked"> Usuario';
				    }
				  	$respuesta .= 
				  	'<br><br>
				    <input type="button" value="Modificar" onclick="RealizarModificacion();"/><br>
				    <input type="button" value="Cancelar" onclick="Mostrar(\'principalAdmin\');"/>
				    <p id="mensajeError"></p>
				</form>';
			echo $respuesta;
		}
		else{
			include('login.html');
		}
		break;
	case 'realizarModificacionUsuario':
	    if (ComprobarLogueo($conexion)) {
	    	//MODIFICACIÓN DE USUARIO
	    	$consulta = $conexion->prepare('UPDATE usuarios SET password = :password, admin = :admin WHERE email = :email');
			$consulta->bindParam(':email', $_POST['email']);
			$consulta->bindParam(':password', $_POST['password']);
			$consulta->bindParam(':admin', $_POST['admin']);
		    $consulta->execute();
			include('principalAdmin.html');
		}
		else{
			include('login.html');
		}
		break;
}