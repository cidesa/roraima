<?php

/**
 * Subclass for representing a row from the 'cptrasla' table.
 *
 *
 *
 * @package lib.model
 */
class Cptrasla extends BaseCptrasla
{
  public function getRefmov()
  {
    return self::getReftra();
  }
}
