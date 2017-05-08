<?php
require_once "AccesoDatos.php";
class Usuario
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $nombre;
	private $correo;
	private $edad;
	private $clave;
//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetCorreo()
	{
		return $this->correo;
	}
	public function GetEdad()
	{
		return $this->edad;
	}
	public function GetClave()
	{
		return $this->clave;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetCorreo($valor)
	{
		$this->correo = $valor;
	}
	public function SetEdad($valor)
	{
		$this->edad = $valor;
	}
	public function SetClave($valor)
	{
		$this->clave = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($nombre=NULL, $correo=NULL, $edad=NULL,$clave=NULL)
	{
		if($nombre !== NULL && $correo !== NULL && $edad !== NULL && $clave !== NULL){
			$this->nombre = $nombre;
			$this->correo = $correo;
			$this->edad = $edad;
			$this->clave = $clave;
		}
	}
//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->nombre." - ".$this->correo." - ".$this->edad." - ".$this->clave."\r\n";
	}
//--------------------------------------------------------------------------------//
//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		
		$ar = fopen("archivos/usuarios.txt", "a");
	
		$cant = fwrite($ar, $obj->ToString());
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		
		fclose($ar);
		
		return $resultado;
	}
	public static function TraerTodosLosUsuarios()
	{
		$ListaDeProductosLeidos = array();
		
		$archivo=fopen("archivos/usuarios.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$usuarios = explode(" - ", $archAux);
			$usuarios[0] = trim($usuarios[0]);
			if($usuarios[0] != ""){
				$ListaDeUsuariosLeidos[] = new Usuario($usuarios[0], $usuarios[1],$usuarios[2],$usuarios[3]);
			}
		}
		fclose($archivo);
		return $ListaDeUsuariosLeidos;
		
	}
	
//--------------------------------------------------------------------------------//
}