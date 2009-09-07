<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cadefalm'.
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
class CadefalmPeer extends BaseCadefalmPeer
{
	public static function getDesalmacen($codalm)
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',str_pad($codalm,6,'0',STR_PAD_LEFT));
	}

	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CadefalmPeer::CODALM => 'Código', CadefalmPeer::NOMALM => 'Descripción'),);


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


	public static function getNomcat($val){

	  return Herramientas::getX('codcat','NPCatPre','nomcat',$val);

	}

}
