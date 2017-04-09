<?php 
/**
 * la clase figura geometrica es la clase padre del ejercicio
 */
abstract class FiguraGeometrica
{
    protected $_color;//="yellow";
    protected $_perimetro;
    protected $_superficie;
    function FiguraGeometrica()
    {
    }
    protected abstract function  CalcularDatos();
    public abstract function Dibujar();

    public function GetColor()
    {
        return $this->_color;
    }
    public function SetColor(String $color)
    {
        $this->_color = $color;
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
    //private $Colo; 
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
    public function SetColor($color1)
    {
        $this->_color=$color1;

    }
    public function Dibujar()
    {
        $color=$this->GetColor();
        $string="";
        $aux1=$this->_ladoDos;
        for ($j=$aux1; $j >0 ; $j--) 
        {  
            $aux2 =$this->_ladoUno;
            for ($i=$aux2; $i > 0 ; $i--) 
            { 
               $string= "<font color='$color'>*</font>".$string;
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
/**
 * 
 */
class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;
    function Triangulo($b,$h)
    {
        $this->_altura = $h;
        $this->_base = $b;
        $this->CalcularDatos();
    }
    protected function CalcularDatos()
    {
        $this->_perimetro = $this->_base *3;
        $this->_superficie = ($this->_base*$this->_altura)/2;
    }
    public function SetColor($color1)
    {
        $this->_color=$color1;

    }
    public function Dibujar()
    {
        $color=$this->GetColor();
        $string="";
        $aux1=$this->_altura;
        for ($j=$aux1; $j >0 ; $j--) 
        {
           $aux2 =$this->_base;
            for ($i=1; $i <=$j ; $i++) 
            { 
               $string= "<font color='$color'>*</font>".$string;
           }
            $string= "</br>".$string;
        }   
        return $string;
    }
    public function ToString()
    {
        $res=  parent::ToString();
        return $this->Dibujar()."</br>".$res."Base: ".$this->_base."  "."Altura: ".$this->_altura;
    }
}


 

?>