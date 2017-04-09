<?php 
include("Clases.php");
$objeto = new Rectangulo(6,4);
$objeto->SetColor("red");
echo $objeto->ToString();

$objeto1 = new Triangulo(6,3);
$objeto1->SetColor("blue");
echo $objeto1->ToString();
?>