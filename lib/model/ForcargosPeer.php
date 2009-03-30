<?php

/**
 * Subclass for performing query and update operations on the 'forcargos' table.
 *
 * 
 *
 * @package lib.model
 */ 
class ForcargosPeer extends BaseForcargosPeer
{
		const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (ForcargosPeer::CODCAR => 'Código', ForcargosPeer::NOMCAR => 'Descripción del Cargo', ForcargosPeer::SUECAR => 'Sueldo', ForcargosPeer::COMCAR => 'Compensación', ),);


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

 public static function getNomcar($codigo)
  {
	return Herramientas::getX('codcar','Forcargos','nomcar',$codigo);
  }

}
