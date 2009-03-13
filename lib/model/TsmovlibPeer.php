<?php

/**
 * Subclass for performing query and update operations on the 'tsmovlib' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TsmovlibPeer extends BaseTsmovlibPeer
{
   const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (TsmovlibPeer::REFLIB => 'Referencia', TsmovlibPeer::FECLIB => 'Fecha'),);
	
	
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
	
  public static function getNumero($tipo)
  {
	return Herramientas::getX('REFLIB','Tsmovlib','Feclib',$tipo);	  
  }	
}
