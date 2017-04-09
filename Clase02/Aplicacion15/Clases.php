<?php 
/**
 * 
 */
abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;
    function FiguraGeometrica()
    {
    }
    protected abstract function  CalcularDatos();
    public abstract function Dibujar();

    public function GetColor()
    {
        return $_color;
    }
    public function SetColor(String $color)
    {
        $_color = $color;
    }
    public function ToString()
    {
      return "Color: ".$this->GetColor()."</br>"."Perimetro: ".$this->_perimetro."</br>"."Superficie: ".$this->_superficie."</br>";
    }
}

/**
 * 
 */
class Rectangulo extends FiguraGeometrica
{
    private $_ladoDos;
    private $_ladoUno;
    function Rectangulo($l1,$l2)
    {   
        $this->_ladoDos = $l2;
        $this->_ladoUno = $l1;
        $this->CalcularDatos();
    }
    protected function CalcularDatos()
    {
        $this->_perimetro = $this->_ladoDos*2+$this->_ladoUno*2;
        $this->_superficie = $this->_ladoDos*$this->_ladoUno;
    }
    public function Dibujar()
    {
        $string="";
        $aux1=$this->_ladoDos;
        for ($j=$aux1; $j >0 ; $j--) 
        {  
            $aux2 =$this->_ladoUno;
            for ($i=$aux2; $i > 0 ; $i--) 
            { 
               $string= "<font color='red'>*</font>".$string;
            }
            $string= "</br>".$string;
        }   
        return $string;

    }
    public function ToString()
    {
        $res=  parent::ToString();
        return $this->Dibujar()."</br>".$res."Lado 1: ".$this->_ladoUno."  "."Lado 2: ".$this->_ladoDos;
    }
}


 

?>