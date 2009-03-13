<?php

/**
 * Subclass for performing query and update operations on the 'cpprecom' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CpprecomPeer extends BaseCpprecomPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CpprecomPeer::REFPRC => 'Referencia', CpprecomPeer::FECPRC => 'Fecha', CpprecomPeer::DESPRC => 'Descripción', CpprecomPeer::TIPPRC => 'Tipo'),);
	
	
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
	
  public static function getDato($referencia, $nomdat)
  {
   	return Herramientas::getX('REFPRC','Cpprecom',$nomdat,$referencia); 	
  }
  
  public static function getDato2($referencia, $nomdat)
  {
   	return Herramientas::getX('TIPPRC','Cpdocprc',$nomdat,$referencia); 	
  }
}
