<?php

/**
 * Subclass for performing query and update operations on the 'facliente' table.
 *
 *
 *
 * @package lib.model
 */
class FaclientePeer extends BaseFaclientePeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (FaclientePeer::RIFPRO => 'Rif', FaclientePeer::NOMPRO => 'Descripción', FaclientePeer::CODPRO => 'Codigo'),);


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
    	return Herramientas::getX('rifpro','Facliente','Nompro',$codigo);
	}
  public static function getNompro_vacio($codigo)
	{
    	return Herramientas::getX_vacio('rifpro','Facliente','Nompro',$codigo);
	}

  public static function getProvee($codprovee)
	{
    	return Herramientas::getX('CODPRO','Facliente','Nompro',$codprovee);
	}
  public static function getCod_provee($codprovee)
	{
    	return Herramientas::getX('rifpro','Facliente','codpro',$codprovee);
	}
  public static function getCodpro($codprovee)
	{
    	$c = new Criteria();
    	$c->add(FaclientePeer::CODPRO,$codprovee);
    	$obj = FaclientePeer::doSelectOne($c);
		if ($obj)
    	  return $obj->getCodpro();
    	else
    	  return '-1';
	}
  public static function getRifpro($rifprovee)
	{
    	$c = new Criteria();
    	$c->add(FaclientePeer::RIFPRO,$rifprovee);
    	$obj = FaclientePeer::doSelectOne($c);
		if ($obj)
    	  return $obj->getRifpro();
    	else
    	  return '-1';
	}

}
