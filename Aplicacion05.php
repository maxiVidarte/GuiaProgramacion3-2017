<?php 
/*Realizar un programa que en base al valor numerico de una variable $num, pueda
mostrarse en pantalla, el nombre del numero que tenga dentro escrito con palabras,
para los numeros entre el 20 y el 60.
por ejemplo, si $num = 43 debe mostrarse por pantalla "cuarenta y tres".*/

for ($i=20; $i <=60 ; $i++) { 
    

  if($i >= 20 and $i <=60)
  {
    $num1 = $i;
    switch ($num1) 
    {
        case ($num1>=20 and $num1 <=29) :
            if($num1==20)
            {
            echo "Veinte"."</br>";
            }
            else
            {
            $num1-=20;
            echo "Veinti";            
            }
        break;
        case ($num1>=30 and $num1 <=39) :
            if($num1==30)
            {
            echo "Treinta"."</br>";
            }
            else
            {
            echo "Treinta y ";
            $num1-=30;
            }
        break;
        case ($num1>=40 and $num1 <=49) :
            if($num1==40)
            {
            echo "Cuarenta"."</br>";
            }
            else
            {
                echo "Cuarenta y ";
            $num1-=40;
            }
        break;
        case ($num1>=50 and $num1 <=59) :
            if($num1==50)
            {
            echo "Cincuenta"."</br>";
            }
            else
            {
                echo "Cincuenta y ";
            $num1-=50;
            }
            break;
        case '60':
            echo "Sesenta";
            break;
    }
    switch ($num1) {
        case 1:
          echo "uno"."</br>";
           break;
     case 2:
              echo "dos"."</br>";
          break;
    case 3:
        echo "tres"."</br>";
        break;
    case 4:
        echo "cuatro"."</br>";
        break;
    case 5:
        echo "cinco"."</br>";
        break;
    case 6:
        echo "seis"."</br>";
        break;
    case 7:
        echo "siete"."</br>";
        break;
    case 8:
        echo "ocho"."</br>";
        break;
    case 9:
        echo "nueve"."</br>";
        break;
}
}
}





?>