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
    }/*
    $ruta = "tucarpeta/"; // Indicar ruta
$filehandle = opendir($ruta); // Abrir archivos
while ($file = readdir($filehandle)) {
        if ($file != "." && $file != "..") {
                $tamanyo = GetImageSize($ruta . $file);
                echo "<p><img src='$ruta$file' $tamanyo[3]><br></p>\n";
        } 
} 
closedir($filehandle); // Fin lectura archivos
}*/
fclose($gestor);
?>