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
			self::validarCodart($articulo);
		
	    }
	public static function validarCodart($articulo)
	{
	//$error = False;
	
  	$codart=($articulo['codart']);  		
  	Herramientas::FormarCodigoPadre($codart,&$nivelcodigo,&$ultimo);  	  		
  	  if (!(Herramientas::buscar_codigo_padre($ultimo))){
  	  	If ($nivelcodigo <> 1){
  	  		return 1;
  	  		//$this->getRequest()->setError('caregart{codart}','El Nivel Anterior No Existe'); 
  	  		//$error = TRUE;  	  		
  	  	} 
  	  	return -1; 	  	
  	  }  	
   /*if($error)
      {
        return false;
      }*/
	}
}

