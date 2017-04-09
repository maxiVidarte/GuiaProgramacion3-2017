<?php 
    function esPar($num)
    {
        if($num%2==0)
        return true;
        else
        return false;
    }
    function esImpar($num)
    {   
        return !esPar($num);
    }
?>