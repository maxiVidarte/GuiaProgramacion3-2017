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
      return "Color: ".$this->_color."    "."Perimetro: ".$this->_perimetro."   "."Superficie: ".$this->_superficie."</br>";
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
        return $this->$_color;

    }
   public function ToString()
    {
       $res=  parent::ToString();
         return $res."Lado 1: ".$this->_ladoUno."  "."Lado 2: ".$this->_ladoDos;
    }
}


 

?>