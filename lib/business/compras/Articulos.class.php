<?php

class Articulos
{
//Almregart	
	public static function Grabar_Articulo($articulo,$grid)
	{	
			// Se graba el Artículo		
			$articulo->save();
			
			// Se graban los almacenes del articulo
			self::Grabar_ArticulosAlmacen($articulo,$grid);
			
	}
	
	public static function Grabar_ArticulosAlmacen($articulo,$grid)
	{
		$codart=$articulo->getCodart();
		$x=$grid[0];		
			$j=0;	
			while ($j<count($x))
			{
				$x[$j]->setCodart($codart);
				$codubi=$x[$j]->getCodubi();
				$x[$j]->setCodubi(str_pad($codubi, 20 , ' '));
								
				$x[$j]->save();
			$j++;			
			}
			$z=$grid[1];		  
			$j=0;
			if ($z[$j])	
			{
			while ($j<count($z))
			{											
				$z[$j]->delete();				
			$j++;
			}
			
			}
			
	} 
			
	public static function salvarAlmregart($articulo,$grid)
		{
			self::Grabar_Articulo($articulo,$grid);			
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
	  	  		return 1;
	  	  	} else return -1;	
	  	  }else return -1;
	  	    	
	}
}

