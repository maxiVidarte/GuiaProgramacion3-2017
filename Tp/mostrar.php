<?php 
include("Empleado.php");
$gestor = fopen("empleados.txt","r");
if($gestor)
{
    while (($bufer = fgets($gestor,9999)) != false)
    {
       $array = explode("-",$bufer);
       $Emp = new Empleado($array[0], $array[1], $array[2], $array[3], $array[4], $array[5]);
       echo $Emp->ToString()."</br>";
    }
}
fclose($gestor);
?>