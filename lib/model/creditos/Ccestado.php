<?php

/**
 * Subclass for representing a row from the 'ccestado' table.
 *
 *
 *
 * @package lib.model
 */
class Ccestado extends BaseCcestado
{
  public function __toString(){
    return $this->getNomest();
  }

}
