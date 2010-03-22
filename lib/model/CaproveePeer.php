<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'caprovee'.
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
class CaproveePeer extends BaseCaproveePeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (CaproveePeer::RIFPRO => 'Rif', CaproveePeer::NOMPRO => 'Descripción', CaproveePeer::CODPRO => 'Codigo'),);


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

  public static function getNompro($codigo)
	{
    	return eregi_replace("[\n|\r|\n\r]", "", Herramientas::getXx('Caprovee',array('rifpro','estpro'),array($codigo,'A'),'Nompro'));
	}
  public static function getNompro_vacio($codigo)
	{
    	return eregi_replace("[\n|\r|\n\r]", "", Herramientas::getX_vacio('rifpro','Caprovee','Nompro',$codigo));
	}

  public static function getProvee($codprovee)
	{
    	//return Herramientas::getX('CODPRO','Caprovee','Nompro',$codprovee);
    	return Herramientas::getXx('Caprovee',array('rifpro','estpro'),array($codprovee,'A'),'Nompro');
	}
  public static function getCod_provee($codprovee)
	{
    	return Herramientas::getX('rifpro','Caprovee','codpro',$codprovee);
	}
  public static function getCodpro($codprovee)
	{
    	$c = new Criteria();
    	$c->add(CaproveePeer::CODPRO,$codprovee);
    	$obj = CaproveePeer::doSelectOne($c);
		if ($obj)
    	  return $obj->getCodpro();
    	else
    	  return '-1';
	}
  public static function getRifpro($rifprovee)
	{
    	$c = new Criteria();
    	$c->add(CaproveePeer::RIFPRO,$rifprovee);
    	$obj = CaproveePeer::doSelectOne($c);
		if ($obj)
    	  return $obj->getRifpro();
    	else
    	  return '-1';
	}

}

