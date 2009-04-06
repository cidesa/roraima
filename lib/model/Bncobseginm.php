<?php

/**
 * Subclass for representing a row from the 'bncobseginm' table.
 *
 *
 *
 * @package lib.model
 */
class Bncobseginm extends BaseBncobseginm
{
  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCodcob());
  }
}
