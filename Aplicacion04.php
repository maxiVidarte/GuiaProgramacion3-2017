<?php 
/*Escribir un programa que use la variable $operador que pueda almacenar los 
simbolos matematicos: '+','-','/','*'; y definir dos variables enteras $op1 y 
$op2. De acuerdo al simbolo que tenga la variable $operador, debera realizarse
la operacion indicada y mostrarse el resultado por pantalla.*/

$operador="/";
$op1=2;
$op2=0;

switch (true) {
    case ($operador =="+"): 
        echo $op1+$op2;
        break;
    case ($operador =="-"): 
        echo $op1-$op2;
        break;
    case ($operador =="/"): 
        if($op2==0)
            echo "Error. No se puede dividir por 0";
        else
            echo $op1/$op2;
        break;
    case ($operador =="*"): 
        echo $op1*$op2;
        break;
    default:
        # code...
        break;
}








?>