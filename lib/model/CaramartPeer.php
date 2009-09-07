<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caramart'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class CaramartPeer extends BaseCaramartPeer
{
  const COLUMNS = 'columns';
	
	public static $columsname = array (
	self::COLUMNS => array (CaramartPeer::RAMART => 'Código', CaramartPeer::NOMRAM => 'Descripción', CaramartPeer::ID => 'Id'),);
	
	
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
	  return Herramientas::getX('RAMART','Caramart','Nomram',str_pad($codram, 6 , '0','STR_PAD_LEFT'));		
	}
	
}
