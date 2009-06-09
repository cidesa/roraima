<?php

/**
 * Subclass for performing query and update operations on the 'nptipgas' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NptipgasPeer extends BaseNptipgasPeer
{

const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (NptipgasPeer::CODTIPGAS => 'Código', NptipgasPeer::DESTIPGAS => 'Descripción',),);
	
	
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

  public static function getDestipgas($codigo)
  {
	return Herramientas::getX('CODTIPGAS','Nptipgas','DESTIPGAS',strtoupper($codigo));	  
  }
  
}
