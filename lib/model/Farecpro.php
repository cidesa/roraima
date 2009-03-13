<?php

/**
 * Subclass for representing a row from the 'farecpro' table.
 *
 *
 *
 * @package lib.model
 */
class Farecpro extends BaseFarecpro
{
  public function getDesrec()
  {
  return Herramientas::getX('CODREC','Carecaud','Desrec',self::getCodrec());
  }
}
