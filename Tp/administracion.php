<?php
include "Empleado.php";

if(isset($_POST["guardar"]))
$empleado= new Empleado($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]);
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