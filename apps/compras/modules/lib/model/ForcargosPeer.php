<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'forcargos'.
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
class ForcargosPeer extends BaseForcargosPeer
{
		const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (ForcargosPeer::CODCAR => 'Código', ForcargosPeer::NOMCAR => 'Descripción del Cargo', ForcargosPeer::SUECAR => 'Sueldo', ForcargosPeer::COMCAR => 'Compensación', ),);


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

 public static function getNomcar($codigo)
  {
	return Herramientas::getX('codcar','Forcargos','nomcar',$codigo);
  }

}
