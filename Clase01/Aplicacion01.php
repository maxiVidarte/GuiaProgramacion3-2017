<?php
/*Confeccionar un programa que sume todos los numeros enteros desde 1 mientras 
la suma no supere los 1000.Mostrar los numero sumados y al finalizar el proceso
indicar cuantos numeros se sumaron*/
$suma = 1;
$contador=0;
echo "Los numeros sumados son: "."</br>";
while($suma < 1000)
{
    $contador++;
    $suma +=$contador;
}
if ($suma>1000)
{
    $suma-=$contador;
    $contador--;
}
for ($i=1; $i <=$contador ; $i++) 
{ 
    if($contador == $i)
    echo $i;
    else
    echo $i." - ";
}
echo "</br>"."Los numeros sumador son".$contador;
echo "</br>"."La suma es: ".$suma;



?>