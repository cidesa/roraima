<?php

/**
 * Subclass for representing a row from the 'carecpro' table.
 *
 *
 *
 * @package lib.model
 */
class Carecpro extends BaseCarecpro
{
  public function getDesrec()
  {
  return Herramientas::getX('CODREC','Carecaud','Desrec',self::getCodrec());
  }
}
