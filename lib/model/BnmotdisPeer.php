<?php

/**
 * Subclass for performing query and update operations on the 'bnmotdis' table.
 *
 *
 *
 * @package lib.model
 */
class BnmotdisPeer extends BaseBnmotdisPeer
{

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (BnmotdisPeer::CODMOT => 'Código', BnmotdisPeer::DESMOT => 'Descripción'),);



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

	public static function getDesmot($codmot)
	{
	  return Herramientas::getX_vacio('codmot','Bnmotdis','desmot',$codmot);
	}

}
