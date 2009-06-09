<?php

/**
 * Subclass for performing query and update operations on the 'npperfil' table.
 *
 *
 *
 * @package lib.model
 */
class NpperfilPeer extends BaseNpperfilPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NpperfilPeer::CODPERFIL => 'Código', NpperfilPeer::DESPERFIL => 'Descripción'),);


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







	public static function getDesperfil($codrazon)
	{
      return Herramientas::getX('CODPERFIL','Npperfil','Desperfil',str_pad($codrazon,4,0,STR_PAD_LEFT));
	}
}
