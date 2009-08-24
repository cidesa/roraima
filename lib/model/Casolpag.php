<?php

/**
 * Subclass for representing a row from the 'casolpag' table.
 *
 *
 *
 * @package lib.model
 */
class Casolpag extends BaseCasolpag
{
  protected $objeto=array();
  protected $mascarapre = "";
  protected $lonpre = 0;

  public function getNomext()
  {
  return Herramientas::getX('TIPCOM','Cpdoccom','Nomext',self::getTipcom());
  }

  public function getNomben()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

}
