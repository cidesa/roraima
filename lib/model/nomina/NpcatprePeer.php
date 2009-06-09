<?php

/**
 * Subclass for performing query and update operations on the 'npcatpre' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpcatprePeer extends BaseNpcatprePeer
{
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (NpcatprePeer::CODCAT => 'Código', NpcatprePeer::NOMCAT => 'Descripción', ),);
	
	
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
	
	public static function getCategoria($codigo)
	{
		return Herramientas::getX('CODCAT','Npcatpre','Nomcat',$codigo);
	}
	
	
}
