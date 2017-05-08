function Test(quien){
	if(quien == 'usuario'){
		$('#email').val('a');
		$('#password').val('a');
	}
	else{
		$('#email').val('z');
		$('#password').val('z');
	}
}
function RealizarModificacion(){
	var foto = $('#foto').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var admin = $('input[name=tipo]:checked').val();
	
	/*if(foto == ""){
		$('#mensajeError').html('Debe seleccionar una foto');
		return;
	}*/
	if(email == ""){
		$('#mensajeError').html('Debe ingresar el email');
		return;
	}
	if(password == ""){
		$('#mensajeError').html('Debe ingresar la contraseña');
		return;
	}
	if(admin == undefined){
		$('#mensajeError').html('Debe seleccionar el tipo');
		return;
	}

	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'realizarModificacionUsuario', 'email' : email, 'password' : password, 'admin' : admin}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al modificar el usuario.');
		}
	);
}

function ModificarUsuario(email, password, admin){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'modificarUsuario', 'email' : email, 'password' : password, 'admin' : admin}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al modificar persona.');
		}
	);	
}

function RealizarModificacionUsuario(){
	var foto = $('#foto').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var admin = $('input[name=tipo]:checked').val();
	
	/*if(foto == ""){
		$('#mensajeError').html('Debe seleccionar una foto');
		return;
	}*/
	if(email == ""){
		$('#mensajeError').html('Debe ingresar el email');
		return;
	}
	if(password == ""){
		$('#mensajeError').html('Debe ingresar la contraseña');
		return;
	}
	if(admin == undefined){
		$('#mensajeError').html('Debe seleccionar el tipo');
		return;
	}

	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'modificarUsuario', 'email' : email, 'password' : password, 'admin' : admin}
	}).then(
		function(data){
			if (data == 'resultadoDuplicado') {
				$('#mensajeError').html('La persona ya existe en la base de datos');
				return;
			}
			else{
				$('#contenedor').html(data);
			}
		},
		function(){
			alert('Ups algo salió mal al dar de alta el usuario.');
		}
	);
}

function DarAlta(){
	var foto = $('#foto').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var admin = $('input[name=tipo]:checked').val();
	
	/*if(foto == ""){
		$('#mensajeError').html('Debe seleccionar una foto');
		return;
	}*/
	if(email == ""){
		$('#mensajeError').html('Debe ingresar el email');
		return;
	}
	if(password == ""){
		$('#mensajeError').html('Debe ingresar la contraseña');
		return;
	}
	if(admin == undefined){
		$('#mensajeError').html('Debe seleccionar el tipo');
		return;
	}

	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'darAlta', 'email' : email, 'password' : password, 'admin' : admin}
	}).then(
		function(data){
			if (data == 'resultadoDuplicado') {
				$('#mensajeError').html('La persona ya existe en la base de datos');
				return;
			}
			else{
				$('#contenedor').html(data);
			}
		},
		function(){
			alert('Ups algo salió mal al dar de alta el usuario.');
		}
	);
}

function BajaUsuario(email){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'bajaUsuario', 'email': email}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al dar de baja al usuario.');
		}
	);
}

function IniciarPagina(){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'iniciar'}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al iniciar la página.');
		}
	);
}

function Ingresar(){
	var patente = $('#patente').val();
	if(patente == ""){
		$('#mensajeError').html('Debe ingresar la patente');
		return;
	}
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'ingresar', 'patente' : patente}
	}).then(
		function(data){
			if (data == 'resultadoDuplicado') {
				$('#mensajeError').html('El vehículo ya existe en la base de datos');
				return;
			}
			else{
				$('#contenedor').html(data);
			}
		},
		function(){
			alert('Ups algo salió mal al ingresar el vehículo.');
		}
	);
}

function IngresarVehiculo(){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'ingresoVehiculo'}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al mostrar ingresoVehiculo.');
		}
	);
}

function Egresar(patente, costo){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'egresar', 'patente' : patente, 'costo' : costo}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al egresar el vehículo.');
		}
	);
}

function EgresarVehiculo(patente){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'egresoVehiculo', 'patente' : patente}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al mostrar egresoVehiculo.');
		}
	);
}

function Mostrar(queMostrar){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : queMostrar}
	}).then(
		function(data){
			$('#contenedor').html(data);
		},
		function(){
			alert('Ups algo salió mal al mostrar' + queMostrar);
		}
	);
}

function CompletarTabla(queTabla){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : queTabla}
	}).then(
		function(data){
			$('#cuerpoTabla').html(data);
		},
		function(){
			alert('Ups algo salió mal al completar la tabla' + queTabla);
		}
	);
}

function SetearCookie(){
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'cookie'}
	}).then(
		function(data){
			data = JSON.parse(data);
			if (data.email != false) {
				$('#email').val(data.email);
			}
		},
		function(){
			alert('Ups algo salió mal al setear cookie.');
		}
	);
}
function LogIn()
{
	var email = $('#email').val();
	var password = $('#password').val();
	var recordarme = $('#recordarme').prop('checked');
	console.log(recordarme);
	//Validar que los campos no estén vacíos
	if(email == ''){
		$('#mensajeError').html('Debe ingresar el correo');
		return;
	}
	if(password == ''){
		$('#mensajeError').html('Debe ingresar la contraseña');
		return;
	}
	$.ajax({
		url : 'nexo.php',
		method : 'POST',
		data : {'accion' : 'loguear', 'emailIngresado' : email, 'passwordIngresado' : password, 'recordar' : recordarme}
	}).then(
		function(data){
			if (data != 'desconocido') {
				$('#contenedor').html(data);
			}
			else{
				$('#mensajeError').html('La combinación de usuario/contraseña no se encuentra en la base de datos.');
			}
		},
		function(){
			alert('Ups algo salió mal en el login.');
		}

	);
}