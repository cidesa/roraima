<?php

/**
 * Subclass for performing query and update operations on the 'careqart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CareqartPeer extends BaseCareqartPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CareqartPeer::REQART => 'Código', CareqartPeer::DESREQ => 'Descripción', ),);
	
	
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
	
   public static function getRequision($reqart)
	{
    	return Herramientas::getX('REQART','Careqart','Desreq',str_pad($reqart, 6 , '0','STR_PAD_LEFT'));		
	}
}
