<?php

/**
 * Subclass for representing a row from the 'cpsoltrasla' table.
 *
 *
 *
 * @package lib.model
 */
class Cpsoltrasla extends BaseCpsoltrasla
{
  public function getRefmov()
  {
    return self::getReftra();
  }
}
