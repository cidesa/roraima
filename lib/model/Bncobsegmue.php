<?php

/**
 * Subclass for representing a row from the 'bncobsegmue' table.
 *
 *
 *
 * @package lib.model
 */
class Bncobsegmue extends BaseBncobsegmue
{

  public function getDescob()
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',self::getCodcob());
  }
}
