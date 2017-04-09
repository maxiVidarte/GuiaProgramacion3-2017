<?php
    /**
     * 
     */
    include "Persona.php";
    class Empleado extends Persona
    {
        protected $_legajo;
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
        public function getSueldo()
        {
            return $this->_sueldo;
        }
        public function Hablar($idioma)
        {
            $string = "El empleado habla ".$idioma; 
            return $string;
        }
        public function ToString()
        {
            $ra = parent::ToString();
            return $ra." - "."Legajo: ".$this->getLegajo()." - "."Sueldo: ".$this->getSueldo()."</br>";
        }

    }
    




?>