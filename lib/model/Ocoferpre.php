<?php

/**
 * Subclass for representing a row from the 'ocoferpre' table.
 *
 *
 *
 * @package lib.model
 */
class Ocoferpre extends BaseOcoferpre
{
  protected $objpartidas=array();
  //protected $montot;
  protected $canval;
  protected $canfin;

  public function getNompro()
  {
    return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }

  public function getDesobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','desobr',self::getCodobr());
  }

  public function getDespar()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
  }

   public function getCoduni()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','coduni',self::getCodpar());
  }
}
