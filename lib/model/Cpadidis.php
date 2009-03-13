<?php

/**
 * Subclass for representing a row from the 'cpadidis' table.
 *
 *
 *
 * @package lib.model
 */
class Cpadidis extends BaseCpadidis
{
  public function getRefmov()
  {
    return self::getRefadi();
  }
}
