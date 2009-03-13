<?php

/**
 * Subclass for performing query and update operations on the 'bnubibie' table.
 *
 *
 *
 * @package lib.model
 */
class BnubibiePeer extends BaseBnubibiePeer
{
	public static function getDesubicacion($codubi)
	{
    	return Herramientas::getX('CODUBI','Bnubibie','Desubi',trim($codubi));
	}

	public static function getNomubi($codubi)
	{
    	return Herramientas::getX('CODUBI','Bnubibie','Dirubi',trim($codubi));
	}

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (BnubibiePeer::CODUBI => 'Código', BnubibiePeer::DESUBI => 'Descripción', BnubibiePeer::DIRUBI=> 'Dirección', BnubibiePeer::ID=> 'Id', ),);


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
