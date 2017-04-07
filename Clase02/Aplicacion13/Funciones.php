<?php
function InvertirPalabra($palabra,$max)
{
    $listado = array("Recuperatorio","Parcial","Programacion");
    if(strlen($palabra)<$max)
    {
        echo "La palabra es valida";
    }
    else {
        echo "La palabra es invalida";
    }
    $aux=0;
    foreach($listado as $key => $value) 
    {
        if ($value==$palabra) 
        {
            $aux = 1;
        }
    }
    return $aux;


}
 ?>