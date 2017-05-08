<?php require_once("Clases/container.php");
?>
<html>
<head>
	<title>LISTADO en DB</title>

	<meta charset="UTF-8">
		
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body style="background-color:cadetblue;">
    <a class="btn btn-info" href="index.html">Menu Principal</a>

	<div class="container">
		<div class="page-header">
			<h1>LISTADO de Conteiners en BaseDatos</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>Listado de Conteiners</h1>

<?php 
	$ArrayDeProductos = conteiner::TraerTodosLosConteinerBD(); 

	echo "<table class='table'>
			<thead>
				<tr>
					<th>  NUMERO      </th>
					<th>  DESCRIPCION </th>
					<th>  PAIS     </th>
					<th>  FOTO       </th>
					<th>  ACCION     </th>
				</tr> 
			</thead>"; 
	foreach ($ArrayDeProductos as $contei){
		echo " 	<tr>
					<td>".$contei->GetNumero()."</td>
					<td>".$contei->GetDescripcion()."</td>
					<td>".$contei->GetPais()."</td>
					<td><img src='archivos/".$contei->GetFoto()."' width='100px' height='100px'/></td>
					   <td>
                                
								<form method=post name=eliminar1  action=BorrarenBD.php>
								<input type=submit name=botonEliminar1 class=MiBotonUTN value=Eliminar />
								<input type=hidden name=numero1 value=".$contei->GetNumero()." />
								</form>
                   
					</td>
				</tr>";
	}	
echo "</table>";		
?>
<form method="POST" name="buscar" action="" class="MiBotonUTN">
<input type="search" name="buscador" style="color:black" placeholder="ingrese el pais" value="Todos">
	<input class="btn" style="background-color:black" type="submit" name="buscar" value="buscar">
</form>
		</div>
	</div>
</body>
</html>