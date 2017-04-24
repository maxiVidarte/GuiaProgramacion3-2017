<?php 
$conexion = mysqli_connect("localhost","root","","UTN");
$textoConsulta = "select * from envios";
$consulta = mysqli_query($conexion,$textoConsulta);
$filas = mysqli_fetch_object($consulta);
var_dump($filas);
?>