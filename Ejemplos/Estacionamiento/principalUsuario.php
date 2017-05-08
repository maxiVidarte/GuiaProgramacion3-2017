<button type="button" id="botonSalir" onclick="Mostrar('login')">Salir</button>
<div class="card">
  	<h1>Administración de vehículos</h1><br>
  	<button type="button" id="botonIngresar" onclick="IngresarVehiculo()">Ingresar vehículo</button>
  	<button type="button" id="botonHistorial" onclick="Mostrar('historial')">Ver el historial</button>
  	<table class="table">
		<thead>
		<tr>
			<th>Patente</th>
			<th>Ingreso</th>
			<th></th>
		</tr> 
		</thead>
		<tbody id="cuerpoTabla">
			<script>CompletarTabla('tablaPrincipal');</script>
		</tbody>
	</table>
</div>