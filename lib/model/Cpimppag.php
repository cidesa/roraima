<?php

/**
 * Subclass for representing a row from the 'cpimppag' table.
 *
 *
 *
 * @package lib.model
 */
class Cpimppag extends BaseCpimppag
{
  protected $descodpre;

  public function getDescodpre()
  {
	return CpdeftitPeer::getNompre(self::getCodpre());
  }
}
