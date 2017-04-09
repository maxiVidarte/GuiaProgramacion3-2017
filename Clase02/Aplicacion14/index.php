<?php 
include("Funciones.php");
$miNumero = rand(1,100);

if(esPar($miNumero))
echo "El numero ".$miNumero." es par";
else
echo "El numero ".$miNumero." es impar";
?>