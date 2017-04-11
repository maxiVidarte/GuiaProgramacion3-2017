<?php 
$gestor = fopen("empleados.txt","r");
$string;
$i=0;
if($gestor)
while (($bufer = fgets($gestor,9999)) != false)
{
    $string=$string.$bufer;
}
if(!feof($gestor))
{   
    echo "Error";
}
$myArray= explode(" ",$string);
var_dump($myArray);
fclose($gestor);
?>