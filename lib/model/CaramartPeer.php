<?php

/**
 * Subclass for performing query and update operations on the 'caramart' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CaramartPeer extends BaseCaramartPeer
{
  const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CaramartPeer::RAMART => 'Código', CaramartPeer::NOMRAM => 'Descripción'),);
	
	
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
	
	public static function getDesramo($codram)
	{
		$c = new Criteria();
		$c->add(CaramartPeer::RAMART,str_pad($codram, 6 , '0','STR_PAD_LEFT'));
		$des = CaramartPeer::doSelectone($c);
		if ($des){
			return $des->getNomram();
		}else{
			return '<!Nombre no encontrado!>';
		}
	}

}
