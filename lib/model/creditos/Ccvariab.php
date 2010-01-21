<?php

/**
 * Subclass for representing a row from the 'ccvariab' table.
 *
 *
 *
 * @package lib.model
 */
class Ccvariab extends BaseCcvariab
{
  public function __toString(){
    return $this->abrevi."-".$this->getNomvar();
  }

}
