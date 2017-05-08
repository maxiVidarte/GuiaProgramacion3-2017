<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>listado de usuarios</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
    <a class="btn btn-info" href="index.html">Menu principal</a>
    <div class="CajaInicio animated bounceInRight">
        <h1>Listado</h1>
    
    <?php
    $myfile = fopen("archivos/Usuario.txt", "r");
    echo  "<table class='table'>
		<thead>
			<tr>
				<th>  NOMBRE </th>
				<th>  EMAIL     </th>
				<th>  EDAD      </th>
			</tr> 
		</thead>";
	 	
    while(($bufer = fgets($myfile,9999)) != false) {
    $array = explode("-",$bufer);
    echo "<tr>
					<td>".$array[0]."</td>
					<td>".$array[1]."</td>
					<td>".$array[2]."</td>
					<td><input style='color:black' type='button' name='borrar' value='borrar'></td>
				</tr>";
        }
    echo "</table>";
    fclose($myfile);
    ?>
    </div>
</body>
</html>
