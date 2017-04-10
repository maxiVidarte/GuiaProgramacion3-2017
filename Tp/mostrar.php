<?php 
$gestor = fopen("empleados.txt","r");
if($gestor)
while (($bufer = fgets($gestor,4096)) != false)
{
    echo $bufer;
}
if(!feof($gestor))
{   
    echo "Error";
}
fclose($gestor);
?>