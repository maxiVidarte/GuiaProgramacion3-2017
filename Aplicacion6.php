
<?php
//todo en php es un array
//  var_dump se usa para ver  el contenido de  un  archivo
    //1)
    $array = array(5,33,1,6,20);
    //2)
    var_dump($array);

    $array2= array();
    echo "<br>"."parte2"."<br>";
    for ($i=0; $i <5 ; $i++) { 
    $array2[$i] = rand(0,10);
    }
    for ($i=0; $i < 5; $i++) { 
    echo $array2[$i]." ";
    }
    $array3= array();
    for ($i=0; $i < 5; $i++) { 
        array_push($array3,rand(0,10));
    }
    echo "<br>"."parte 3"."<br>";
    var_dump($array3);
    
  
  

?>