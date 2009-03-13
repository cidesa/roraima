<?php

/**
 * Subclass for representing a row from the 'tsdefchequera' table.
 *
 *
 *
 * @package lib.model
 */
class Tsdefchequera extends BaseTsdefchequera
{
	protected $canche="";

    public function afterHydrate()
    {
      $this->canche=self::getNumchehas()-self::getNumchedes();
	}
}
