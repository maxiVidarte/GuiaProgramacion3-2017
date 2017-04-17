<?php
include "Empleado.php";

if(isset($_POST["guardar"]))
//validar que el archivo es una imagen
echo $_FILES['archivo']['name']."</br>";
//validar solo las extensiones jpg, bmp, gif, png o jpeg2
echo $_FILES['archivo']['type']."</br>";
//validar que el tamaño sea menor a 1MB(1024.000)
echo $_FILES['archivo']['size']."</br>";
//validar que no exista un archivo con el mismo nombre en el repositorio final (./fotog)



$empleado= new Empleado($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]);
//$empleado->setPathFoto($_POST["archivo"]);
$path = "empleados.txt";
    if(isset($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]))
    {
        if(file_exists($path))
        {
            $miArchivo = fopen($path,"a");
            fwrite($miArchivo,$empleado->ToString()."\r\n");
            echo '<a href="mostrar.php">Mostrar</a>';
        }
        else
        {
            $miArchivo = fopen($path,"w");
            fwrite($miArchivo,$empleado->ToString()."\r\n");
        }
    }
    else
    {
        echo "</br>"."<a href='index.html'>Error</a>";

    }
?>