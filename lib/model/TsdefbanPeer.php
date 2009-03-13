<?php

/**
 * Subclass for performing query and update operations on the 'tsdefban' table.
 *
 *
 *
 * @package lib.model
 */
class TsdefbanPeer extends BaseTsdefbanPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (TsdefbanPeer::NUMCUE => 'Código', TsdefbanPeer::NOMCUE => 'Descripción', TsdefbanPeer::CODCTA => 'Cuenta', TsdefbanPeer::ID => 'Id'),);


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

	public static function getNomcue($codigo)
	{
    	return Herramientas::getX('numcue','tsdefban','Nomcue',$codigo);
	}

	public static function getNumche($codigo)
	{
    	return Herramientas::getX('numcue','tsdefban','Numche',$codigo);
	}

	public static function getCta_cont($codigo)
	{
    	return Herramientas::getX('numcue','tsdefban','codcta',$codigo);
	}
}
