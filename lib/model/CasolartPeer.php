<?php

/**
 * Subclass for performing query and update operations on the 'casolart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CasolartPeer extends BaseCasolartPeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CasolartPeer::REQART => 'Referencia', CasolartPeer::DESREQ => 'Descripción', CasolartPeer::FECREQ => 'Fecha', CasolartPeer::ID => 'Id'),);
	
	
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
	
	static public function getDesreq($cod)
	{
	  return Herramientas::getX('REQART','Casolart','desreq',str_pad($cod,8,'0',STR_PAD_LEFT));
	}		
}
