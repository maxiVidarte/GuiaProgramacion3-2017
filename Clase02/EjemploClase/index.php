<?php
include("funciones.php");
include("calculadora.php");
//require "funciones.php";
//require"noexiste.php";
//require"funciones.php";
$resultado= sumar(1,5);
echo $resultado."</br>";
$resultado1 = Calculadora::sumar(3,5);
echo $resultado1;
 ?>
