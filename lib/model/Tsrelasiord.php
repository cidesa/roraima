<?php

/**
 * Subclass for representing a row from the 'tsrelasiord' table.
 *
 *
 *
 * @package lib.model
 */
class Tsrelasiord extends BaseTsrelasiord
{
  protected $obj=array();
  protected $mascaracta = "";
  protected $loncta = 0;

  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtagasxpag());
  }

  public function getDescta2()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtaordxpag());
  }
}
