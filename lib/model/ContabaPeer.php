<?php

/**
 * Subclass for performing query and update operations on the 'contaba' table.
 *
 *
 *
 * @package lib.model
 */
class ContabaPeer extends BaseContabaPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (ContabaPeer::CODEMP => 'Código', ContabaPeer::DESCTA => 'Proveedor', ContabaPeer::ID => 'Id'),);


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
