<?php 
include "Funcion.php";

$mi_palabra = array("H","O","L","A");
$palabraInv =   Invertir($mi_palabra);

foreach ($palabraInv as $key => $value) {
    echo $value;
}


?>