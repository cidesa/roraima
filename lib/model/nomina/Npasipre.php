<?php

/**
 * Subclass for representing a row from the 'npasipre' table.
 *
 *
 *
 * @package lib.model
 */
class Npasipre extends BaseNpasipre
{
  public function getNomcon()
  {
  	  return Herramientas::getX('codtipcon','Nptipcon','Destipcon',self::getCodcon());
  }

}
