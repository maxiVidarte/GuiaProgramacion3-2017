<?php
$alta = isset($_POST["guardar"]) ? TRUE : FALSE;

if($alta)
{
    $usuario =$_POST["nombre"]."-".$_POST["email"]."-".$_POST["edad"]."-".$_POST["password"];

    $arch = fopen("archivos/Usuario.txt","a");
    
    $cant = fwrite($arch,$usuario."\n");
    include("mensaje.php");
}
?>
