<?php 
    include "Fabrica.php";

    $Emp1 = new Empleado("maximiliano", "vidarte",33286799,'m',100197,151);
    $Emp2 = new Empleado("cintia","rifici",33289633,'f',100198,100);
    $Fab1 = new Fabrica("La Serenisima");
    $Fab1->AgregarEmpleado($Emp1);
    $Fab1->AgregarEmpleado($Emp2);
    
    var_dump($Fab1);
    
?>