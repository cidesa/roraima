<?php

/**
 * Subclass for representing a row from the 'fafecped' table.
 *
 *
 *
 * @package lib.model
 */
class Fafecped extends BaseFafecped
{
	protected $objFecPed = array();

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
}
