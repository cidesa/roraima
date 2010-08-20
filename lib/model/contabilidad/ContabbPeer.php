<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'contabb'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: ContabbPeer.php 32405 2009-09-01 21:27:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ContabbPeer extends BaseContabbPeer
{

	    const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (ContabbPeer::CODCTA => 'Código', ContabbPeer::DESCTA => 'Proveedor'),);


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

  public static function getDescta($cod)
  {
      return Herramientas::getX('CODCTA','Contabb','descta',$cod);
  }

  public static function getCargab($cod)
  {
      return Herramientas::getX('CODCTA','Contabb','cargab',$cod);
  }

}
