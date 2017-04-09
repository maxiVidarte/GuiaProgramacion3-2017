<?php 
    include "Empleado.php";


    $Emp1 = new Empleado("maximiliano", "vidarte",33286799,'m',100197,151);
    $Emp2 = new Empleado("cintia","rifici",33289633,'f',100198,100);
    echo $Emp1->ToString();
    echo $Emp2->ToString();
?>