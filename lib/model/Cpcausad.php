<?php

/**
 * Subclass for representing a row from the 'cpcausad' table.
 *
 *
 *
 * @package lib.model
 */
class Cpcausad extends BaseCpcausad
{
  public function getRefmov()
  {
    return self::getRefcau();
  }
}
