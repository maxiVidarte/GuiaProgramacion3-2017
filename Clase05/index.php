<?php 
//primero hay que hacer la conexion con la base de datos
//mysqli_connect(servidor,usuario,password,nombre de la base de datos)
$conexion = mysqli_connect("localhost","root","","ejemplouno");
$id=7;
$textoConsulta = "select * from tablauno where id =".$id;
//Cargo la consulta que quiero hacer
//mysqli_query(la conexion, la consulta)
$consulta = mysqli_query($conexion, $textoConsulta);
//var_dump($consulta);
$filas = mysqli_fetch_object($consulta);
var_dump($filas);
?>