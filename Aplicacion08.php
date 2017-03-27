<?php 
/*Imprima los valores del vector asociativo siguiente usando la estructura de 
control foreach: $v[1]=90;$v[30]=7;$v['e']=99;$v['hola']='mundo';*/
$v[1]=90;
$v[30]=7;
$v['e']=99;
$v['hola']='mundo';

foreach ($v as $i => $i_value) {
    echo "Indice = ".$i.", valor= ".$i_value."</br>";
}

?>