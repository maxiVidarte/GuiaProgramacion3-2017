<?php 
/*generar una aplicacion que permita cargar 10 numeros impares en un array.
Luego imprimir(utilizando un for)cada uno en una linea distinta(recordar que el
salto de linea en PHP es la etiquera </br>).Repetir la impresion de los numeros
utilizando las estructuras while y foreach.*/

$numeros;
for ($i=0; $i <10 ; $i++) 
{
    $numero= rand(1,100);
    while (($numero % 2 )==0)        
    {
         $numero = rand(1,100);
    }

$numeros[$i]= $numero;
}
for ($i=0; $i <10 ; $i++) { 
    echo $numeros[$i]."</br>";
}
echo "</br>";
foreach ($numeros as $num) {
    echo $num."</br>";
}


?>