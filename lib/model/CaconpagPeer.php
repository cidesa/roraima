<?php

/**
 * Subclass for performing query and update operations on the 'caconpag' table.
 *
 *
 *
 * @package lib.model
 */
class CaconpagPeer extends BaseCaconpagPeer
{
	public static function getDesconpag($codigo)
	{
		return Herramientas::getX('codconpag','Caconpag','desconpag',str_pad($codigo,4,0,STR_PAD_LEFT));
	}

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CaconpagPeer::CODCONPAG => 'Código', CaconpagPeer::DESCONPAG => 'Descripción'),);


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
