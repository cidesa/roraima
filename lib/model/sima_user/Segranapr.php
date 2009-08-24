<?php

/**
 * Subclass for representing a row from the 'segranapr' table.
 *
 *
 *
 * @package lib.model.sima_user
 */
class Segranapr extends BaseSegranapr
{
  public function getDesniv(){

    return Herramientas::getX('CODNIV','Segnivapr','Desniv',self::getCodniv());
  }
}
