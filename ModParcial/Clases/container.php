<?php
require_once "AccesoDatos.php";
class conteiner
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
    private $numero;
	private $descripcion;
    private $pais;
	private $foto;
//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
    public function GetNumero()
    {
        return $this->numero;
    }
	public function GetDescripcion()
	{
		return $this->descripcion;
	}
	public function GetPais()
	{
		return $this->pais;
	}
	public function GetFoto()
	{
		return $this->foto;
	}
    public function SetNumero($valor)
    {
        $this->numero= $valor;
    }
	public function SetDescripcion($valor)
	{
		$this->descripcion = $valor;
	}
	public function SetPais($valor)
	{
		$this->pais = $valor;
	}
	public function SetFoto($valor)
	{
		$this->foto = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($numero=NULL,$descripcion=NULL, $pais=NULL, $foto=NULL)
	{
		if($numero !== NULL && $descripcion !== NULL && $pais !== NULL && $foto !== NULL){
			$this->numero = $numero;
            $this->descripcion = $nombre;
			$this->pais = $correo;
			$this->foto = $edad;
		}
	}
    public static function TraerTodosLosConteinerBD()
	{
		$arrayRetorno = array();
		
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT numero,descripcion,pais,foto FROM `conteiner`');
		$consulta->Execute();
		 while ($fila = $consulta->fetchObject("conteiner")) 
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 return $arrayRetorno;
	}
	public static function TraerTodosLosConteinerBD2($pais)
	{
		$arrayRetorno = array();
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT * FROM `conteiner` WHERE pais = '."'".$pais."'");
		$consulta->Execute();
		 while ($fila = $consulta->fetchObject("conteiner")) 
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 return $arrayRetorno;

	}

}