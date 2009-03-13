<?php

/**
 * Subclass for performing query and update operations on the 'farecarg' table.
 *
 *
 *
 * @package lib.model
 */
class FarecargPeer extends BaseFarecargPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (FarecargPeer::CODRGO => 'Código', FarecargPeer::NOMRGO => 'Descripción', FarecargPeer::MONRGO => 'Monto Recargo',FarecargPeer::TIPRGO => 'Tipo Recargo',FarecargPeer::CODPRE => 'Cod. Presupuestario'),);


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
	public static function getRecargo($codigo)
	{
    	return Herramientas::getX('CODRGO','Farecarg','NOMRGO',str_pad($codigo,4,0,STR_PAD_LEFT));
	}

	public static function getDato($codigo, $nomdat)
  {
   	return Herramientas::getX('CODRGO','Farecarg',$nomdat,str_pad($codigo,4,0,STR_PAD_LEFT));
  }

}
