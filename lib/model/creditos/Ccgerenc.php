<?php

/**
 * Subclass for representing a row from the 'ccgerenc' table.
 *
 *
 *
 * @package lib.model
 */
class Ccgerenc extends BaseCcgerenc
{
   public function __toString(){
    return $this->getNomger();
  }

}
?>