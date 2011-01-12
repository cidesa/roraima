<?php

/**
 * Subclass for representing a row from the 'cctipcue' table.
 *
 *
 *
 * @package lib.model
 */
class Cctipcue extends BaseCctipcue
{
  public function __toString(){
    return $this->getNomtipcue();
  }
}
