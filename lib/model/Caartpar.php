<?php

/**
 * Subclass for representing a row from the 'caartpar' table.
 *
 *
 *
 * @package lib.model
 */
class Caartpar extends BaseCaartpar
{
  public function getNompar()
  {
    return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
  }
}
