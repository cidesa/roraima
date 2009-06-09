<?php

/**
 * Subclass for performing query and update operations on the 'nptipaportes' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NptipaportesPeer extends BaseNptipaportesPeer
{
const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (NptipaportesPeer::CODTIPAPO => 'Código', NptipaportesPeer::DESTIPAPO => 'Descripción'));
	
	
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
	
public static function getDestip($codigo)
  {
	return Herramientas::getX('CODTIPAPO','Nptipaportes','Destipapo',str_pad($codigo,4,'0',STR_PAD_LEFT));	  
  }
}
