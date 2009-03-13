<?php

/**
 * Subclass for performing query and update operations on the 'cpdocpag' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CpdocpagPeer extends BaseCpdocpagPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CpdocpagPeer::TIPPAG => 'Tipo', CpdocpagPeer::NOMEXT => 'Descripción', CpdocpagPeer::REFIER => 'Refiere', CpdocpagPeer::AFEPRC => 'Afe. Precom.', CpdocpagPeer::AFECOM => 'Afe. Comp', CpdocpagPeer::AFECAU => 'Afe. Cau.', CpdocpagPeer::AFEPAG => 'Afe. Pag.', CpdocpagPeer::AFEDIS => 'Afe. Dis.'),);

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
	

	public static function getNomext($codigo)
	{
    	return Herramientas::getX('Tippag','Cpdocpag','Nomext',$codigo);		
	}  

}
