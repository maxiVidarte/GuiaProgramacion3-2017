<?php 
/*Realizar las lineas de codigo necesarias para generar un array asociativo 
$lapicera, que contenga como elementos: 'color', 'marca', 'trazo' y 'precio'. 
Crear, cargar y mostrar tres lapiceras. */

$lapicera = array(
    array("color "=>"azul","marca"=>"bic","trazo"=>"grueso", "precio"=>"5"),
    array("color "=>"rojo","marca"=>"sharp","trazo"=>"fino","precio"=>"10"),
    array("color "=>"verde","marca"=>"bic","trazo"=>"fino","precio"=>"5"));
var_dump($lapicera);
foreach ($lapicera as $key)
 {
     echo "</br>";
    foreach ($key as $indice => $value2) {
    echo $indice." - ".$value2."</br>";
    }
    
}


?>