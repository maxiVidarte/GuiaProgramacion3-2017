<?php
/*Dadas tres variables numericas de tipò entero $a, $b y $c realizar una aplicacion
que muestre contenido de aquella variable que contenga el valor que se encuentre en el medio 
de las tres variable. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
ej1: 
$a=6;
$b=9;
$c=8;
se muestra 8;

ej2: 
$a=5;
$b=1;
$c=5;
Muestra un mensaje "No hay valor medio"
*/

$a= 5;
$b =5;
$c= 6;
if(($c<$a and $c>$b)or($c<$b and $c>$a))
{
echo "el numero medio es: ".$c;
}
else if(($a<$c and $a>$b)or($a<$b and $a>$c))
{
    echo "el numero medio es: ".$a;
}
elseif (($b<$a and $b>$c)or($b<$c and $b>$a)) 
{
    echo "el numero medio es: ".$b;
}
else {
    echo "No hay valor medio";
}





 ?>