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

}

