<?php

/**
 * Subclass for representing a row from the 'tsbloqban' table.
 *
 *
 *
 * @package lib.model
 */
class Tsbloqban extends BaseTsbloqban
{
  public function getNomcue()
  {
    return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
  }
}
