<?php
require_once "clases/AccesoDatos.php";
$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
$consulta = $objetoAcceso->RetornarConsulta('DELETE FROM conteiner WHERE numero=:id');
try
{
    if(isset($_POST["botonEliminar1"]))
    {
        $consulta->bindvalue(':id',$_POST["numero1"], PDO::PARAM_INT);
        $consulta->execute();
        if ($consulta->rowCount() == 0)
            {
                echo "<li>El elemento no existe.</li><br>";
            }
        else {
            echo '<script type="text/javascript">alert("Se elimino 1 articulo");</script>';
        }
   
         echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017/ModParcial/filtradoConteiner.php" />';  
    }
    else {
        $consulta->bindvalue(':id',$_POST["numero1"], PDO::PARAM_INT);
        $consulta->execute();
        if ($consulta->rowCount() == 0)
            {
                echo "<li>El elemento no existe.</li><br>";
            }
        else
            {
                echo "Se elimino: ". $consulta->rowCount()." Objeto/s.<br>"."<br>";
            }
          echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017/ModParcial/filtradoConteiner.php" />';  
        }
        
    
}
catch (PDOException $e)
    {
        echo $e->getMessage();
        require "bajaenBD.php";
    }
    ?>