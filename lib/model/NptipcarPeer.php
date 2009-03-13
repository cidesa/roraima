<?php

/**
 * Subclass for performing query and update operations on the 'nptipcar' table.
 *
 *
 *
 * @package lib.model
 */
class NptipcarPeer extends BaseNptipcarPeer
{

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NptipcarPeer::CODTIPCAR => 'Código', NptipcarPeer::DESTIPCAR => 'Descripción', ),);


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

 public static function getNomtip($codigo)
  {
	return Herramientas::getX('codtipcar','Nptipcar','destipcar',$codigo);
  }


}
