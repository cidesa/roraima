<?php

/**
 * Subclass for performing query and update operations on the 'camotfal' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CamotfalPeer extends BaseCamotfalPeer
{
   public static function getMotivo($codfal)
	{
    	return Herramientas::getX('CODFAL','Camotfal','Desfal',$codfal);		
	}
	
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CamotfalPeer::CODFAL => 'Código', CamotfalPeer::DESFAL => 'Descripción', ),);
	
	
	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}
	
	
	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));
			
		}
		return $columnas;
	}
	
}
