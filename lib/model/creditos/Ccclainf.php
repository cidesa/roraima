<?php

/**
 * Subclass for representing a row from the 'ccclainf' table.
 *
 *
 *
 * @package lib.model
 */
class Ccclainf extends BaseCcclainf
{

  public function __toString(){
    return $this->getNominf();
  }

}
