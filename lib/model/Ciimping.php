<?php

/**
 * Subclass for representing a row from the 'ciimping' table.
 *
 *
 *
 * @package lib.model
 */
class Ciimping extends BaseCiimping
{
  public function getDestiprub()
  {
    return Herramientas::getX('codtiprub','citiprub','destiprub',self::getCodtiprub());
  }
}
