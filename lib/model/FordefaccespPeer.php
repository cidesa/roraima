<?php

/**
 * Subclass for performing query and update operations on the 'fordefaccesp' table.
 *
 *
 *
 * @package lib.model
 */
class FordefaccespPeer extends BaseFordefaccespPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (FordefaccespPeer::CODACCESP => 'Código', FordefaccespPeer::DESACCESP => 'Acción Específica'),);
	
	
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
	
  public static function getAccion($codigo)
  {
  	return Herramientas::getX('CODACCESP','Fordefaccesp','Desaccesp',$codigo);
  }	
	
}
