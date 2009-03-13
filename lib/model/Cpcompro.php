<?php

/**
 * Subclass for representing a row from the 'cpcompro' table.
 *
 *
 *
 * @package lib.model
 */
class Cpcompro extends BaseCpcompro
{
	protected $obj = array();
	protected $check = "";

  public function getRefmov()
  {
    return self::getRefcom();
  }
}
