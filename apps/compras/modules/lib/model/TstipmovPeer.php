<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'tstipmov'.
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
class TstipmovPeer extends BaseTstipmovPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (TstipmovPeer::CODTIP => 'Código', TstipmovPeer::DESTIP => 'Descripción', TstipmovPeer::DEBCRE => 'Abreviatura', TstipmovPeer::ID => 'Id'),);


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
	
  public static function getMovimiento($tipo)
  {
	return Herramientas::getX('CODTIP','Tstipmov','Destip',strtoupper($tipo));	  
  }	
	public static function getDestip($codigo)
	{
    	return Herramientas::getX('CodTip','Tstipmov','Destip',strtoupper($codigo));		
	} 
	
	public static function getDebcre($codigo)
	{
    	return Herramientas::getX('CodTip','Tstipmov','Debcre',strtoupper($codigo));		
	}  
}
