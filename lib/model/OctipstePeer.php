<?php

/**
 * Subclass for performing query and update operations on the 'octipste' table.
 *
 *
 *
 * @package lib.model
 */
class OctipstePeer extends BaseOctipstePeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (OctipstePeer::CODSTE => 'Código', OctipstePeer::DESSTE => 'Proveedor', ),);


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
