<?php

/**
 * Subclass for performing query and update operations on the 'caprovee' table.
 *
 *
 *
 * @package lib.model
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
    	return htmlspecialchars(Herramientas::getX('rifpro','Caprovee','Nompro',$codigo));
	}
  public static function getNompro_vacio($codigo)
	{
    	return htmlspecialchars(Herramientas::getX_vacio('rifpro','Caprovee','Nompro',$codigo));
	}

  public static function getProvee($codprovee)
	{
    	return Herramientas::getX('CODPRO','Caprovee','Nompro',$codprovee);
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

