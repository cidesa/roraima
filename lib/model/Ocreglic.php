<?php

/**
 * Subclass for representing a row from the 'ocreglic' table.
 *
 *
 *
 * @package lib.model
 */
class Ocreglic extends BaseOcreglic
{
  protected $objhistorial=array();

  public function getDesobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','desobr',self::getCodobr());
  }

  public function getNomext()
  {
    return Herramientas::getX('CODFIN','Fortipfin','nomext',self::getCodfin());
  }

    public function getDesclacomp()
  {
    return Herramientas::getX('codclacomp','Occlacomp','desclacomp',self::getCodclacomp());
  }
}
