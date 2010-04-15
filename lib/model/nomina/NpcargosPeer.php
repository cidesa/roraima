<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npcargos'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class NpcargosPeer extends BaseNpcargosPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NpcargosPeer::CODCAR => 'Código', NpcargosPeer::NOMCAR => 'Descripción del Cargo', NpcargosPeer::SUECAR => 'Sueldo', NpcargosPeer::COMCAR => 'Compensación', ),);


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
	return Herramientas::getX('codcar','Npcargos','nomcar',$codigo);
  }



}
