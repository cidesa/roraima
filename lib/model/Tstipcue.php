<?php

/**
 * Subclass for representing a row from the 'tstipcue' table.
 *
 *
 *
 * @package lib.model
 */
class Tstipcue extends BaseTstipcue
{
  public $destipcta='';

  public function getDestipcta()
  {
  	return self::getDestip();
  }
}
