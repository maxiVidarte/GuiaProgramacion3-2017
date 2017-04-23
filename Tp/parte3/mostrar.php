<?php 
include("Empleado.php");
$gestor = fopen("empleados.txt","r");
if($gestor)
{
    while (($bufer = fgets($gestor,9999)) != false)
    {
       $array = explode("-",$bufer);
       $Emp = new Empleado($array[0], $array[1], $array[2], $array[3], $array[4], $array[5]);
       $Emp->setPathFoto($array[6]."-".$array[7]);
        echo "Nombre:".$array[0]."</br>";       
        echo "Apellido:".$array[1]."</br>";
        echo "Dni:".$array[2]."</br>";
        echo "Sexo:".$array[3]."</br>";
        echo "Legajo:".$array[4]."</br>";
        echo "Sueldo:".$array[5]."</br>";
       echo "<p><img src=".$Emp->getPathFoto()." align=middle></p>";
    }
}
    
fclose($gestor);
?>