<?php

/**
 * Subclass for performing query and update operations on the 'caprovee' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CaproveePeer extends BaseCaproveePeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CaproveePeer::CODPRO => 'Código', CaproveePeer::NOMPRO => 'Proveedor', CaproveePeer::RIFPRO => 'Rif', CaproveePeer::NITPRO => 'Nit', CaproveePeer::DIRPRO => 'Proveedor', CaproveePeer::ID =>  'Id', ),);
	
	
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
