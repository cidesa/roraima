<?php

class Articulos
{
//Almregart	
	public static function Grabar_Articulo($articulo)
		{			
			$articulo->save();
		}
			
	public static function salvarAlmregart($articulo)
		{
			self::Grabar_Articulo($articulo);			
		}
//
	public static function validarAlmregart($articulo)
		{
			return self::validarCodart($articulo);
		
	    }
	public static function validarCodart($articulo)
	{

	  	$codart=$articulo->getCodart();  

	  	Herramientas::FormarCodigoPadre($codart,&$nivelcodigo,&$ultimo);  	  		
	  	  if (!(Herramientas::buscar_codigo_padre($ultimo))){
	  	  	If ($nivelcodigo == 0){
	  	  		return 11;
	  	  	} else return -1;	
	  	  }else return -1;
	  	    	
	}
}

