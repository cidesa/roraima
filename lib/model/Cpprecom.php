<?php

/**
 * Subclass for representing a row from the 'cpprecom' table.
 *
 *
 *
 * @package lib.model
 */
class Cpprecom extends BaseCpprecom
{

  public function getRefmov()
  {
    return self::getRefprc();
  }
}
