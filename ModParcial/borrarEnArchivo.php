<?PHP
require_once("clases/usuario.php");
try
{
    $loencontro=false;
    if(isset($_POST["botonEliminarA"]))
    {
        $arrayArchivo = Usuario::TraerTodosLosUsuarios();
        $i = 0;
        foreach ($arrayArchivo as $us)
        {
            if($_POST["correo3"] == $us->GetCorreo())
            {
               
            $loencontro=true;
            break;
            }
         
        $i++;
        }
        $archivo = "archivos/usuarios.txt";
        $abrir = fopen($archivo, 'w');
        unset($arrayArchivo[$i]);
        $reindex=array_values($arrayArchivo);
        $arrayArchivo=$reindex;
        foreach ($arrayArchivo as $key) {
            
            fwrite($abrir,$key->ToString());
            
        }
        
        fclose($abrir);
     
        if($loencontro)
        {
            //creo el mensaje y la redireccion si encontró el archivo
        echo '<script type="text/javascript">alert("Se borro 1 usuario");</script>';
        echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017/ModParcial/Listado.php" />';
        }
        // else {
        //        //creo lo contrario al if
        //         echo '<script type="text/javascript">alert("No se encontró el articulo");</script>';
        //         echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/ProgramacionIII/Clase06(Carpeta_abm)/BajaenArchivo.php" />';
                
        // }
    }
}
    catch (PDOException $e)
    {
        echo $e->getMessage();
        require "verificarUsuario.php";
    }
?>