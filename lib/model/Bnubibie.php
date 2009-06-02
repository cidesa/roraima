<?php

/**
 * Subclass for representing a row from the 'bnubibie' table.
 *
 *
 *
 * @package lib.model
 */
class Bnubibie extends BaseBnubibie
{

  public function getDesubiadm()
  {
  	 return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCodubiadm());
  }
}
