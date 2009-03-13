<?php

/**
 * Subclass for performing query and update operations on the 'fordefparing' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FordefparingPeer extends BaseFordefparingPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (FordefparingPeer::CODPARING => 'Código', FordefparingPeer::NOMPARING => 'Descripción', ),);
	
	
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
	
	public static function getDesparing($paring)
	{
    	return Herramientas::getX('CODPARING','Fordefparing','Nomparing',$paring);		
	}
	
}
