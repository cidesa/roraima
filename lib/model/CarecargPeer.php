<?php

/**
 * Subclass for performing query and update operations on the 'carecarg' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CarecargPeer extends BaseCarecargPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CarecargPeer::CODRGO => 'Código', CarecargPeer::NOMRGO => 'Descripción', CarecargPeer::MONRGO => 'Monto Recargo',CarecargPeer::TIPRGO => 'Tipo Recargo',CarecargPeer::CODPRE => 'Cod. Presupuestario'),);
	
	
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
    	return Herramientas::getX('CODRGO','Carecarg','NOMRGO',str_pad($codigo,4,0,STR_PAD_LEFT));		
	}	
	
	public static function getDato($codigo, $nomdat)
  {
   	return Herramientas::getX('CODRGO','Carecarg',$nomdat,str_pad($codigo,4,0,STR_PAD_LEFT)); 	
  }	
}
