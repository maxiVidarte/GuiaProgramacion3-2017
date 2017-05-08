<?PHP
    require "clases/usuario.php";
            $usuario = new Usuario($_POST["nombre"] ,$_POST["correo"],$_POST["edad"],$_POST["clave"]);
            $array = Usuario::TraerTodosLosUsuarios();
            $i=0;
            $existeUsuario = 0;
            
            foreach ($array as $key ) {
            if($_POST["correo"] == $key->GetCorreo() ||
                $_POST["nombre"] == $key->GetNombre())
            {
                $existeUsuario = 1;
                break;
            }   
            $i++;
            }
            if($existeUsuario == 1)
            {
                echo '<script type="text/javascript">alert("Ese usuario ya esta ingresado")</script>';
                echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017\ModParcial/CrearArchivo.html" />';
            }
            else{   
            if (!file_exists("archivos/usuarios.txt"))
                {
                    
                    echo'<script type="text/javascript">alert('.$usuario.')</script>';
                    $archivoUsuarios= fopen("archivos/usuarios.txt","w");
                    fwrite($archivoUsuarios, $usuario->ToString());
                    echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017\ModParcial/CrearArchivo.html" />';
                }
            else 
                {
                    $archivoUsuarios= fopen("archivos/usuarios.txt","a");
                    fwrite($archivoUsuarios, $usuario->ToString()."\n");
                    echo '<meta http-equiv="refresh" content="0; url=http://localhost/GuiaProgramacion3-2017\ModParcial/CrearArchivo.html" />';
                }
            }
           // $name = $_FILES["archivo"]["name"];
            //$archivoTmp = $_FILES["archivo"]["tmp_name"];
            //copy($archivoTmp,"archivos"."/".$name);
        
?>