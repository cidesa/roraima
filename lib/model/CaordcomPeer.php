<?php

/**
 * Subclass for performing query and update operations on the 'caordcom' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CaordcomPeer extends BaseCaordcomPeer
{
   public static function getDato($ordcom, $nomdat)
   {
   	return Herramientas::getX('ORDCOM','Caordcom',$nomdat,$ordcom); 	
   }
 
	const COLUMNS = 'columns';
	
	public static $columsname = array (
	//self::COLUMNS => array (CaordcomPeer::ORDCOM => 'Código', CaordcomPeer::FECORD => 'Fecha', CaordcomPeer::CODPRO => 'Cod. Prov.', CaproveePeer::NOMPRO => 'Nombre Prov.', CaconpagPeer::DESCONPAG => 'Con. Pago', CaforentPeer::DESFORENT => 'Forma Entrega'),);
	self::COLUMNS => array (CaordcomPeer::ORDCOM => 'Código', CaordcomPeer::FECORD => 'Fecha', CaordcomPeer::DESORD => 'Descripción'),);
	
	
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
	
}
