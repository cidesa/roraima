<?php

/**
 * Subclass for performing query and update operations on the 'fordefsta' table.
 *
 * 
 *
 * @package lib.model
 */ 
class FordefstaPeer extends BaseFordefstaPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (FordefstaPeer::CODSTA => 'Código', FordefstaPeer::DESSTA => 'Descripción'),);
	
	
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
	
  public static function getEstatus($codigo)
  {
  	return Herramientas::getX('CODSTA','Fordefsta','Dessta',str_pad($codigo,2,0,STR_PAD_LEFT));
  }		
}
