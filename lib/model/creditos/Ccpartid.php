<?php

/**
 * Subclass for representing a row from the 'ccpartid' table.
 *
 *
 *
 * @package lib.model
 */
class Ccpartid extends BaseCcpartid
{
  protected $div=false;

    public function __toString(){
      return $this->getNompar();
  }

}
