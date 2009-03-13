<?php

/**
 * Subclass for performing query and update operations on the 'cadefubi' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CadefubiPeer extends BaseCadefubiPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CadefubiPeer::CODUBI => 'Código', CadefubiPeer::NOMUBI => 'Descripción'),);
	
	
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
	
	
	public static function getDesubicacion($codubi)
	{
    	return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$codubi);		
	}
}
