<?php
/*Obtenga la fecha actual del servidor(funcion date) y luego imprimirla dentro 
de la pagina con distintos formatos(seleccione los formatos que mas le guste).
Ademas indicar que estacion del año es. Utilizar una estructura selectiva multiple.
*/
echo "Eliga una opcion : "."</br>"."1- Formato (dia/mes/año) "."</br>"."2- Formato (dia.mes.año)"."</br>"."3- Formato (dia-mes-año)"."</br>";
$opcion = 2;
$mes=date ("m");
$dia= date ("d");

switch ($opcion) {
    case '1':
             echo "Eligio la opcion 1"."</br>"."hoy es: ".date("d/m/y")."</br>";
        break;
    case '2': 
             echo "Eligio la opcion 2"."</br>"."hoy es: ".date("d.m.y")."</br>";
        break;
    case '3':
             echo "Eligio la opcion 1"."</br>"."hoy es: ".date("d-m-y")."</br>";
        break;
}
switch (true) 
{
    case (($mes=="12" and $dia>"21") or($mes<="02" and $mes>="01") or ($mes=="03" and $dia<="21")):
            echo "Es verano";
        break;
    case (($mes=="03" and $dia>="21") or($mes<="05" and $mes>="04") or ($mes=="06" and $dia<="21")):
            echo "Es otoño";
        break;
    case (($mes=="06" and $dia>="21") or($mes<="08" and $mes>="07") or ($mes=="09" and $dia<="21")):
            echo "Es invierno";
        break;
    case (($mes=="09" and $dia>="21") or($mes<="11" and $mes>="10") or ($mes=="12" and $dia<="21")):
            echo "Es Primavera";
        break;
}
 ?>