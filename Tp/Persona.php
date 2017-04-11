<?php   
/**
 * Clase padre 
 */
abstract class Persona
{
    private $_apellido;
    private $_dni;
    private $_nombre;
    private $_sexo;
    
    function Persona($nombre,$apellido,$dni,$sexo)
    {
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_dni = $dni;
        $this->_sexo = $sexo;
    }
    public function getApellido()
    {
        return $this->_apellido;
    }
    public function getDni()
    {
        return $this->_dni;
    }
    public function getNombre()
    {
        return $this->_nombre;
    }
    public function getSexo()
    {
        return $this->_sexo;
    }
    abstract public function hablar($idioma);
    public function ToString()
    {
        return "Apellido:".$this->getApellido()."-"."Nombre:".$this->getNombre()."-"."Dni:".$this->getDni()."-"."Sexo:".$this->getSexo();
    }
}


?>