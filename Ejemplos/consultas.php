<?php
class consultas{

    public function insertarProducto($arg_nombre,$arg_descripcion,$arg_categoria,$arg_precio){
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "insert into Productos (nombre, descripcion, categoria, precio) values(:nombre,:descripcion,:categoria,:precio)";
        $statement = $conexio->prepare($sql);
        $statement->bindParam(':nombre',$arg_nombre);
        $statement->bindParam(':descripcion',$arg_descripcion);
        $statement->bindParam(':categoria',$arg_categoria);
        $statement->bindParam(':precio',$arg_precio);
        if(!$statement){
            return "error al crear el registro";
        }
        else{
            $statement->execute();
            return "registro creado correctamente";
        }
    }
    public function cargarProductos(){
        $rows = null;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $sql = "select * from productos";
        $statement = $conexion->prepare($sql);
        $statement->execute();
        while ($result = $statement->fetch())
        {
            $rows[]= $result;
        }
        return $rows;
    }
}

?>
