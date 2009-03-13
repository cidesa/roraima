<?php

/**
 * Subclass for performing query and update operations on the 'catippro' table.
 *
 *
 *
 * @package lib.model
 */
class CatipproPeer extends BaseCatipproPeer
{

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CatipproPeer::CODPRO => 'Código', CatipproPeer::DESPRO => 'Descripción', ),);


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


   public static function getDespro($cod)
	{
    	return Herramientas::getX('codpro','Catippro','despro',str_pad($cod,4,'0',STR_PAD_LEFT));
	}

}
