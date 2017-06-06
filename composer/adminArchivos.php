<?php//sacado del tp 
include "clases/Empleado.php";

$arrayExt = array("jpg","bmp","gif","png","jpeg");
    if(isset($_POST["guardar"]))
    {
        if($_FILES["archivo"]["size"]< 1024000)
        {
            foreach ($arrayExt as $key) 
            {
            if("image/".$key ==$_FILES['archivo']['type'])
                {
                    $destino = "fotos/".$_POST["dni"]."-".$_POST["apellido"].".".trim($_FILES["archivo"]["type"],"image/");
                    move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino);
                    
                }
            }
    $empleado= new Empleado($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]);
    $empleado->setPathFoto($destino);
    $path = "empleados.txt";
            if(isset($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["sexo"],$_POST["legajo"],$_POST["sueldo"]))
            {
                if(file_exists($path))
                {
                $miArchivo = fopen($path,"a");
                fwrite($miArchivo,$empleado->ToString()."\r\n");
                echo '<a href="mostrar.php">Mostrar</a>';
                }
                else
                {
                $miArchivo = fopen($path,"w");
                fwrite($miArchivo,$empleado->ToString()."\r\n");
                }
            }
            else
            {
                echo "</br>"."<a href='index.html'>Error</a>";
            }
        }
        else
        {
            echo "la imagen es muy grande "."</br>"."<a href='index.html'>Error</a>";
        }
    }
?>


