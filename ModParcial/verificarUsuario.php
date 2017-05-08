<?PHP
    require_once "clases/usuario.php";
    $arrayArchivo = Usuario::TraerTodosLosUsuarios();
    $i=0;
    $existeUsuario = 0;
    foreach ($arrayArchivo as $key ) {
        if($_POST["correo2"] == $key->GetCorreo() ||
            $_POST["clave2"] == $key->GetClave())
        {
            $existeUsuario = 1;
            break;
        }   
        $i++;
    }
    if($existeUsuario == 1)
    {
        echo '<script type="text/javascript">alert("Se encontro el usuario")</script>';
        echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017/ModParcial/Listado.php" />';
    }
    else
    {
        echo '<script type="text/javascript">alert("No se encontro el usuario")</script>';
        echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017/ModParcial/ChequearUsuario.html" />';
    }
?>