<?php

/**
 * Subclass for representing a row from the 'cctitulo' table.
 *
 *
 *
 * @package lib.model
 */
class Cctitulo extends BaseCctitulo
{
  public function __toString(){
    return $this->getPregunta();
  }


}
