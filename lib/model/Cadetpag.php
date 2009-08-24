<?php

/**
 * Subclass for representing a row from the 'cadetpag' table.
 *
 *
 *
 * @package lib.model
 */
class Cadetpag extends BaseCadetpag
{
  public function getNompre()
  {
  return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }
}
