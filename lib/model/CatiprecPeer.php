<?php

/**
 * Subclass for performing query and update operations on the 'catiprec' table.
 *
 *
 *
 * @package lib.model
 */
class CatiprecPeer extends BaseCatiprecPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CatiprecPeer::CODTIPREC => 'Código', CatiprecPeer::DESTIPREC => 'Descripción',CatiprecPeer::ID => 'ID', ),);


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

   public static function getDestip($codtip)
	{
    	return Herramientas::getX('CODTIPREC','Catiprec','Destiprec',str_pad($codtip,4,'0',STR_PAD_LEFT));
	}

   public static function getDestip_vacio($codtip)
	{
    	return Herramientas::getX_vacio('CODTIPREC','Catiprec','Destiprec',str_pad($codtip,4,'0',STR_PAD_LEFT));
	}
}
