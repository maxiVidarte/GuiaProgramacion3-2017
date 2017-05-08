<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">

    <title>UsuarioCarga</title>
</head>
<body>
     <a class="btn btn-info" href="index.html">Volver</a>
     <div class="container">
        <div class="page-header">
             <h1>Nuevo Usuario</h1>
        </div>     
     <div class="CajaInicio animated bounceInRight">
         <h1>Alta de usuario</h1>
        <form action="VerificarUsuario.php" enctype="multipart/form-data" method="POST" id="FormIngreso">
          <input type="text" name="nombre" placeholder="Ingrese nombre" ></br>
          <input type="email" name="email" placeholder="Ingrese email"></br>
          <input type="text" name="edad" placeholder="Ingrese edad"></br>
          <input type="text" name="password" placeholder="Ingrese contraseña">
          <input style="color:black" type="submit" name= "guardar" value="guardar">
        </form>
        </div>
    </div>
</body>
</html>