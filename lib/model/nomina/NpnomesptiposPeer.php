<?php

/**
 * Subclass for performing query and update operations on the 'npnomesptipos' table.
 *
 *
 *
 * @package lib.model
 */
class NpnomesptiposPeer extends BaseNpnomesptiposPeer
{

public static function getDesnomesp($codigo)
  {
	return Herramientas::getX('CODNOMESP','Npnomesptipos','desnomesp',strtoupper($codigo));
  }

public static function getFecnomdes($codigo)
  {
	return Herramientas::getX('CODNOMESP','Npnomesptipos','Fecnomdes',strtoupper($codigo));
  }

public static function getFecnomhas($codigo)
  {
	return Herramientas::getX('CODNOMESP','Npnomesptipos','fecnomhas',strtoupper($codigo));
  }




}
