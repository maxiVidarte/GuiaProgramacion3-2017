<?php
    /**
     * 
     */
    include "Persona.php";
    class Empleado extends Persona
    {
        protected $_legajo;
        protected $_pathFoto;        
        protected $_sueldo;
        
        function Empleado($nombre, $apellido, $dni, $sexo, $legajo, $sueldo)
        {
            parent::Persona($nombre,$apellido,$dni,$sexo);
            $this->_legajo = $legajo;
            $this->_sueldo = $sueldo;
        }
        public function getLegajo()
        {
            return $this->_legajo;
        }
        public function getPathFoto()
        {
            return $this->_pathFoto;
        }
        public function getSueldo()
        {
            return $this->_sueldo;
        }
        public function Hablar($idioma)
        {
            $string = "El empleado habla ".$idioma; 
            return $string;
        }
        public function setPathFoto($foto)
        {
            $this->_pathFoto = $foto;            
        }
        public function ToString()
        {
            $ra = parent::ToString();
            return $ra."-".$this->getLegajo()."-".$this->getSueldo();
        }

    }
?>