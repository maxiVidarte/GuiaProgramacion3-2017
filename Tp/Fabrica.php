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
            //probar como meter los sueldos
            foreach ($this->_empleados as $key => $value) {
                echo $key;
            }
        }
        public function EliminarEmpleado($persona)
        {
            unset($_empleados->persona);
        }
        private function EliminarEmpleadosRepetidos()
        {
            var_dump(array_unique($this->_empleados));
        }
        public function ToString()
        {
            $string = "Razon social: ".$this->_razonSocial;
            foreach ($this->_empleados as $key => $value) {
                $String = $string.$value->ToString();
            }
            return $string;
        }
    }
    
?>