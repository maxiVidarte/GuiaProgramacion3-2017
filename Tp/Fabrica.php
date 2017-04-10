<?php 
    /**
     * 
     */
    include "Empleado.php";
    class Fabrica
    {
        private $_empleados;
        private $_razonSocial; 
        function Fabrica($razonSocial)
        {
            $this->_empleados= array();
            $this->_razonSocial = $razonSocial;
        }
        public function AgregarEmpleado($persona)
        {
            array_push($this->_empleados,$persona);
            $this->EliminarEmpleadosRepetidos();
        }
        public function CalcularSueldos()
        {
            $Sueldos= 0;
            foreach ($this->_empleados as $key) {
                $Sueldos +=  $key->getSueldo();
            }
            return $Sueldos;
        }
        public function EliminarEmpleado($persona)
        {
            $indice= array_search($persona,$this->_empleados);
            if(false != $indice)
            {
                unset($this->_empleados[$indice]);
                $arrayNuevo = array_values($this->_empleados);
                $this->_empleados = $arrayNuevo;

            }
        }
        private function EliminarEmpleadosRepetidos()
        {
           $array = array_unique($this->_empleados, SORT_REGULAR);
           $this->_empleados = $array;
        }
        public function ToString()
        {
            $string= "Razon Social: ".$this->_razonSocial;
            foreach ($this->_empleados as $key) {
                $string = $string." - ".$key->ToString();
            }
           return $string;
        }
    }
    
?>