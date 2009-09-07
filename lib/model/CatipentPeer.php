<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'catipent'.
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
class CatipentPeer extends BaseCatipentPeer
{

  const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CatipentPeer::CODTIPENT => 'Código', CatipentPeer::DESTIPENT => 'Descripción'),);


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


	public static function getNomtip($codigo)
	{
		return  Herramientas::getX('CODTIPENT','Catipent','Destipent',str_pad($codigo,3,'0',STR_PAD_LEFT));
	}

}
