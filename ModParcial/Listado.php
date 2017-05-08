<?php
	require_once('clases/usuario.php');
?>
<html>
<head>
	<title>LISTADO en Archivo</title>

	<meta charset="UTF-8">
		
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body style="background-color:cadetblue;">
	<a class="btn btn-info"  href="index.html">Menu Principal</a>

	<div class="container">
		<div class="page-header">
			<h1>LISTADO de Usuarios en Archivo</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>Listado de Usuarios</h1>

<?php 
$ArrayDeProductos = Usuario::TraerTodosLosUsuarios();
echo "<table class='table'>
		<thead>
			<tr>
				<th>  NOMBRE </th>
				<th>  MAIL     </th>
				<th>  EDAD       </th>
				<th>  CLAVE     </th>
                <th>  ACCION    </th>
			</tr> 
		</thead>";   	
	foreach ($ArrayDeProductos as $us){
		echo " 	<tr>
					<td>".$us->GetNombre()."</td>
					<td>".$us->GetCorreo()."</td>
                    <td>".$us->GetEdad()."</td>
                    <td>".$us->GetClave()."</td>
                    <td>
                               
								<form method=post name=eliminar1  action=borrarenArchivo.php>
								<input type=submit name=botonEliminarA class=MiBotonUTN value=Eliminar />
								<input type=hidden name=correo3 value=".$us->GetCorreo()." />
								</form>
                   
					</td>   
				</tr>";
                
	}	
echo "</table>";		
?>
		</div>
	</div>
</body>
</html>