<?php
require_once ("clases/AccesoDatos.php");
if(isset($_POST["guardarBD"])) 
{
    $objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
   
   try{
    $consulta = $objetoAcceso->RetornarConsulta("INSERT INTO conteiner (numero,descripcion,pais,foto)"
                                                    . "VALUES(:num,:descrip, :pais, :path)");
        
        $consulta->bindValue(':num', $_POST["numero1"], PDO::PARAM_INT);
        $consulta->bindValue(':descrip', $_POST["descripcion1"], PDO::PARAM_STR);
        $consulta->bindValue(':pais', $_POST["pais1"], PDO::PARAM_STR);
        $consulta->bindValue(':path',$_FILES["archivo"]["name"], PDO::PARAM_STR);
        $consulta->Execute();
        $name = $_FILES["archivo"]["name"];
        $archivoTmp = $_FILES["archivo"]["tmp_name"];
        copy($archivoTmp,"archivos"."/".$name);
         echo '<script type="text/javascript">alert("Se agrego 1 container");</script>';
         echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017/ModParcial/filtradoConteiner.php" />';  
        }
    catch(PDOException $e)
    {
        print "Error al subirlo<br>".$e->getMessage();
    }
}
?>
