<?php

/**
 * Subclass for representing a row from the 'cctippro' table.
 *
 *
 *
 * @package lib.model
 */
class Cctippro extends BaseCctippro
{
   public function __toString(){
    return $this->getNomtippro();
  }

}
